<?php include 'sidebar.php';?>
<?php require 'conn.php'; ?>


<?php 
// Fetch categories for the drop-down options
$sqlCategories = "SELECT cat_name FROM categories";
$resultCategories = $conn->query($sqlCategories);

// Initialize an array to store category options
$categoryOptions = array();
while ($rowCategory = $resultCategories->fetch_assoc()) {
    $categoryOptions[] = $rowCategory['cat_name'];
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["submit"])) 
{
    $cat_name = $_POST['cat_name'];
    $name = $_POST['name'];
    $price=$_POST['price'];
    $description=$_POST['description'];
    
    $imgsrc = ""; // Placeholder for the file name

    // Handle file upload if imgsrc is set and there's no error
    if (isset($_FILES["imgsrc"]) && $_FILES["imgsrc"]["error"] === 0) {
        $imgFileName = basename($_FILES["imgsrc"]["name"]);
        $imgsrc = "products/" . $imgFileName;
        $imgFilePath = __DIR__ . "/" . $imgsrc;

        if (move_uploaded_file($_FILES["imgsrc"]["tmp_name"], $imgFilePath)) {
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "File uploaded successfully.";
        } else {
            echo "Error uploading file.";
        }
      }
      
    // Insert data into "productss" table
    $sql = "INSERT INTO products (cat_name,imgsrc,name,price,description) VALUES ('$cat_name', '$imgsrc','$name','$price','$description')";
    if ($conn->query($sql) === TRUE) {
        echo "<br>";
        echo "<br>";
        echo "Data inserted successfully.";
    } else {
        echo '"Error: " . $sql . "<br>" . $conn->error';
    }

 }

?>

















<br>
<br>

<div class="container mt-5 col-lg-4" style="background-color:rgba(49, 7, 60, 0.511);border-radius:17px;">
<br>
  <h2>Add Artwork</h2>
    <form method="post"  enctype="multipart/form-data">
      <div class="form-group">
        <label for="name">Artwork Name:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter ARTWORK name">
        
        <div class="form-group">
          <label for="cat_name">Category:</label>
          <select class="form-control" id="cat_name" name="cat_name">
            <option value="">Tap to Select</option>
              <?php foreach ($categoryOptions as $category) { ?>
                  <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
              <?php } ?>
          </select>
        </div>

        <label for="imgsrc">File:</label>
        <input type="FILE" class="form-control" id="imgsrc" name="imgsrc" placeholder="FILE">
      </div>
      <label for="name">Artwork Price:</label>
        <input type="text" class="form-control" id="name" name="price" placeholder="Enter ARTWORK price">
        <label for="ss">Artwork Description:</label>
        <input type="text" class="form-control" id="ss" name="description" placeholder="Enter ARTWORK description">
        <br>
      <button style="background-color:rgba(49, 7, 60, 0.511);border-color:#000;" type="submit" name="submit" class="btn btn-primary" value="Add ARTWORK" id="addARTWORKBtn">Add ARTWORK</button>
                <br>
                <br>
    </form>
</div>




