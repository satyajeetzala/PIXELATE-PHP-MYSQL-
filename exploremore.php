<?php include 'header.php';?>
<?php require 'conn.php'; ?>

<br>
<br>


<?php
$sql = "SELECT cat_id, cat_name,thumb FROM categories ORDER BY cat_id DESC";
$result = $conn->query($sql);
?>

<br>

<br>
<div class="container mt-5">
  <div class="row">
    <div class="col-12 text-center">
      <h1>All Categories</h1>
    </div>
  </div>
</div>
<br>
<div class="container animationsmate">
    
    <div class="row">
        <?php
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-md-4">';
            echo '<div class="product-card">';
            // echo '<a href="moreproducts.php?cat_name="' . $row['cat_name'] . '">';
            echo '<a href="moreproducts.php?cat_name=' . $row['cat_name'] . '">';
            echo '<img src="admin/categories/' . $row['thumb'] . '" class="img-fluid" alt="' . $row['cat_name'] . '"></a>';
            echo '<p><b>&nbsp;&nbsp;' . $row['cat_name'] . '</b></p>';
            // echo '<p><b>Price: $' . $row['price'] . '</b></p>';
            // // echo '<p>' . $row['description'] . '</p>';
            // echo '<button class="btn btn-primary" style="margin-top:-0.5rem;">Buy</button>';
            echo '</div>';
            echo '</div>';
           
        }
        ?>
    </div>
</div>

<br>
<br>



<?php include 'footer.php'; ?>