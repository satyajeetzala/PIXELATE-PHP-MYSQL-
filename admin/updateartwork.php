<?php include 'sidebar.php';?>
<?php require 'conn.php'; ?>

<br>
<br>
<br>
<br>
 <!-- Handle form submission for updating record -->
 <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id'];
    $name = $_POST['name'];
  

    // Process image upload
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

    $sql = "UPDATE products SET name='$name', imgsrc='$imgsrc' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Record with id $id updated successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Retrieve data for pre-filled form
if (isset($_GET['id'])) {
    $idToUpdate = $_GET['id'];
    $sql = "SELECT id,name,imgsrc,price FROM products WHERE id=$idToUpdate";
    $result = $conn->query($sql);
    $rowToUpdate = $result->fetch_assoc();
}
?>

<!DOCTYPE html>


<div class="container col-lg-4" style="background-color:rgba(49, 7, 60, 0.511);border-radius:17px;">
<br>
     <h2 class="mt-1">Edit Artwork</h2>
    
    <form method="POST" enctype="multipart/form-data">
        <input type="hcat_idden" class="form-control " name="id" value="<?php echo $rowToUpdate['id']; ?>" disabled>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control " name="name" value="<?php echo $rowToUpdate['name']; ?>" required>
        </div>
        <BR>
        <div class="form-group">
            <label for="imgsrc">Artwork:</label>
            <input type="file" class="form-control-file " name="imgsrc" id="imgsrc">
        </div>
        <br>
        <button type="submit"  style="background-color:rgba(49, 7, 60, 0.511);border-color:#000;" class="btn btn-primary" >Update</button>
    </form>
    <br>
</div>



<!-- <div class="container mt-5 mb-5">
  <h2>Update Category</h2>
    <form>
      <div class="form-group">
        <label for="CategoryupdateName">Categoryupdate Name:</label>
        <input type="text" class="form-control" cat_id="CategoryupdateName" placeholder="Enter Categoryupdate name">
        <label for="Categoryupdatecat_id">Categoryupdate cat_id:</label>
        <input type="text" class="form-control" cat_id="Categoryupdatecat_id" placeholder="Enter Categoryupdate cat_id">
        <label for="CategoryupdateFILE">File:</label>
        <input type="FILE" class="form-control" cat_id="CategoryupdateFILE" placeholder="FILE">
      </div>
      <button type="button" class="btn btn-primary" cat_id="updateCategoryupdateBtn">Update Categoryupdate</button>
    </form>
</div> -->
<br>
<br>


<?php include 'footer.php';?>
