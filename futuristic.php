<?php include 'header.php';?>
<?php require 'conn.php'; ?>


<?php
$sql = "SELECT id, name, imgsrc, price, description FROM products";
$result = $conn->query($sql);
?>

<br>
<br>
<div class="container mt-5">
  <div class="row">
    <div class="col-12 text-center">
      <h1>F U T U R I S T I C</h1>
    </div>
  </div>
</div>
<br>
<div class="container">
    
    <div class="row">
        <?php
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-md-4">';
            echo '<div class="product-card">';
            echo '<a href="buy.php" style="text-decoration:none;"><img src="admin/' . $row['imgsrc'] . '" class="img-fluid" alt="' . $row['name'] . '"></a>';
            echo '<p>' . $row['name'] . '</p>';
            echo '<p><b>Price: $' . $row['price'] . '</b></p>';
            // echo '<p>' . $row['description'] . '</p>';
            echo '<a href="buy.php" style="text-decoration:none;"><button class="btn btn-primary" style="margin-top:-0.5rem;">Buy</button></a>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>


<!-- 
<div class="container mt-5">
  <div class="row">
    <div class="col-md-12" style="margin: 5%;">
      <h1 class="text-center" style="margin-TOP: 15%;" >N A T U R E</h1>
    </div>
  </div>
</div>

<section class="section">
  <div class="container">
    
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
      

      <div class="col">
        <div class="card card-square">
          <img src="images/logo (2).png" class="card-img-top" alt="Image 1">
          <div class="card-body">
            <h5 class="card-title">Image 1</h5>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card card-square">
          <img src="images/image-2.jpg" class="card-img-top" alt="Image 2">
          <div class="card-body">
            <h5 class="card-title">Image 2</h5>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card card-square">
          <img src="images/image-3.jpg" class="card-img-top" alt="Image 3">
          <div class="card-body">
            <h5 class="card-title">Image 3</h5>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card card-square">
          <img src="images/image-3.jpg" class="card-img-top" alt="Image 3">
          <div class="card-body">
            <h5 class="card-title">Image 3</h5>
          </div>
        </div>
      </div>  -->
      <!-- Add more cards here -->
    </div>
  </div>
</section>
			
<?php require 'footer.php'; ?>