<?php include 'header.php';?>
<?php require 'conn.php'; ?>


<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_email'])) {
    header('Location: login.php'); // Redirect to login page
    exit;
}
?>

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

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form Overlay</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .registration-section {
      position: relative;
      overflow: hidden;
      background: url('aditya.jpg') no-repeat center center fixed;
      background-size: cover;
      height: 100vh;
    }
    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7);
      backdrop-filter: blur(5px);
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .registration-container {
      background-color: #ffffff32;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      width: 90%;
      max-width: 600px;
      display: flex;
      color: white;
    }
    .registration-image {
      flex: 1;
      padding: 20px;
      height: 100%;
      
    }
    .registration-form {
      flex: 1;
      padding: 20px;
    }
    .registration-image img {
      max-width: 100%;
      height: auto;
      border-radius: 12px;
    }
  </style>
</head>
<body>

<div class="container-fluid p-0 mt-5">
  <div class="row no-gutters">
    <div class="col-lg-12">
      <div class="registration-section">
        <div class="overlay">
          <div class="registration-container">
            <div class="registration-image">
              <img src="images/monkey.jpg" alt="Registration Image">
                    <div class="text-wrap text-center mt-5 Magneto" style="font-family:sans-serif;" ><h3>Welcome to the
                      <BR>COMMUNITY </h3>
                    </div>
            </div>
            <div class="registration-form">
              <h2>Upload Your Masterpiece</h2>
              <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name">
                </div>
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
                <div class="form-group">
                  <label for="email">Price</label>
                  <input type="text" class="form-control" name="price" id="email" placeholder="Enter your email">
                </div>
                
                <div class="form-group">
                  <label for="Textfield">Description</label>
                  <input type="text" name="description" class="form-control" id="password" placeholder="Enter your password">
                </div>
                <button type="submit" name ="submit" class="btn btn-primary">U P L O A D</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Include Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
<?php require 'footer.php'; ?>