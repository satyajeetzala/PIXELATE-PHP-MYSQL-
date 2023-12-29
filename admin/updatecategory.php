<?php include 'sidebar.php';?>
<?php require 'conn.php'; ?>

<br>
<br>
<br>
<br>
 <!-- Handle form submission for updating record -->
 <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cat_id = $_GET['cat_id'];
    $catName = $_POST['cat_name'];

    // Process image upload
    $targetDir = "categories/";
    $thumb = $_FILES["thumb"]["name"];
    $targetFile = $targetDir . basename($thumb);
    move_uploaded_file($_FILES["thumb"]["tmp_name"], $targetFile);

    $sql = "UPDATE categories SET cat_name='$catName', thumb='$thumb' WHERE cat_id=$cat_id";
    if ($conn->query($sql) === TRUE) {
        echo "Record with cat_id $cat_id updated successfully.";
    } else {
        echo '"Error updating record: " . $conn->error';
    }
}

// Retrieve data for pre-filled form
if (isset($_GET['cat_id'])) {
    $cat_idToUpdate = $_GET['cat_id'];
    $sql = "SELECT cat_id, cat_name, thumb FROM categories WHERE cat_id=$cat_idToUpdate";
    $result = $conn->query($sql);
    $rowToUpdate = $result->fetch_assoc();
}
?>

<!DOCTYPE html>


<div class="container col-lg-4" style="background-color:rgba(49, 7, 60, 0.511);border-radius:17px;">
<br>
    <h2>Edit Category</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="hcat_idden" name="cat_id" value="<?php echo $rowToUpdate['cat_id']; ?>" disabled>
        <div class="form-group">
            <label for="cat_name">Category Name:</label>
            <input type="text" class="form-control" name="cat_name" value="<?php echo $rowToUpdate['cat_name']; ?>" required>
        </div>
        <BR>
        <div class="form-group">
            <label for="thumb">Thumbnail:</label>
            <input type="file" class="form-control-file" name="thumb" accept="image/*">
        </div>
        <button style="background-color:rgba(49, 7, 60, 0.511);border-color:#000;" type="submit" class="btn btn-primary">Update</button>
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


