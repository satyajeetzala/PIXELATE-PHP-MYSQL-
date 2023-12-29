<?php include 'header.php';?>
<?php require 'conn.php'; 
$catname = $_GET['cat_name'];

?>

<br>
<br>

<div class="container mt-5">
  <div class="row">
    <div class="col-12 text-center">
      <h1><?php echo $catname; ?>  Artworks</h1>
    </div>
  </div>
</div>
<?php

$sql = "SELECT id, name,imgsrc,price FROM products where cat_name='$catname'; ";
$result = $conn->query($sql);
?>

<br>

<br>
<div class="container animationsmate">
    
    <div class="row mt-1">
        <?php
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-md-4">';
            echo '<div class="product-card">';
            echo '<img src="admin/' . $row['imgsrc'] . '" class="img-fluid" alt="' . $row['name'] . '">';
            echo '<p><b>&nbsp;&nbsp;' . $row['name'] . '</b></p>';
            echo '<p><b>&nbsp;&nbsp;Price: $' . $row['price'] . '</b></p>';
            // // echo '<p>' . $row['description'] . '</p>';
            echo '&nbsp;&nbsp;<a href="buy.php?id=' . $row['id'] . '" style="text-decoration:none;"><button class="btn btn-primary" style="margin-top:-0.5rem;margin-bottom:20px;">Buy</button></a>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>

<br>
<br>



<?php include 'footer.php'; ?>