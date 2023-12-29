<?php include 'sidebar.php';?>
<?php require 'conn.php'; ?>

<br>
<br>

<div class="container mt-5 mb-5 col-lg-4" style="background-color:rgba(49, 7, 60, 0.511);border-radius:17px;">
<br>
  <h2>Add New Category</h2>
    <form method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="cat_name">Category Name:</label>
        <input type="text" class="form-control" name="cat_name" id="cat_name" placeholder="Enter category name">
        <!-- <label for="categoryID">Category id:</label>
        <input type="text" class="form-control" id="categoryID" placeholder="Enter category id"> -->
        <br>
        <label for="thumb">Thumbnail:</label>
        <input type="FILE" class="form-control" name="thumb" id="thumb" placeholder="FILE">
      </div>
      <br>
      <!-- <input style="background-color:rgba(49, 7, 60, 0.511);" type="submit"  class="btn btn-primary" id="Submit" name="Submit" value="Add Category"></button> -->
      <button style="background-color:rgba(49, 7, 60, 0.511);border-color:#000;" type="submit" name="submit" class="btn btn-primary">Add Category</button>
    </form>
    <br>
</div>

<?php
if (isset($_POST["Submit"])) {
    // Retrieve form data
    $catName = $_POST["cat_name"];
    
    // Process image upload
    $targetDir = "categories/";
    $thumb = $_FILES["thumb"]["name"];
    $targetFile = $targetDir . basename($thumb);
    move_uploaded_file($_FILES["thumb"]["tmp_name"], $targetFile);

    // Insert data into "categories" table
    $sql = "INSERT INTO categories (cat_name, thumb) VALUES ('$catName', '$thumb')";
    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully.";
    } else {
        echo '"Error: " . $sql . "<br>" . $conn->error';
    }
}

?>


