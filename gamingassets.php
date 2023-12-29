<?php include 'header.php';?>
<?php require 'conn.php'; ?>


<BR>
<div class="container mt-5">
  <div class="row">
    <div class="col-12 text-center">
      <h1>G A M I N G <BR> A S S E T S</h1>
    </div>
  </div>
</div>


<div class="container mt-5">
  <div class="row">

  
    <?php
      // Connect to your database here and fetch image data
      // Example data for demonstration purposes
      $images = array(
        array("5 (1).jpg", "Image 1"),
        array("5 (2).jpg", "Image 2"),
        array("5 (3).jpg", "Image 3"),
        array("5 (4).jpg", "Image 4"),
        array("5 (5).jpg", "Image 3"),
        // Add more images as needed
      );

      foreach ($images as $image) {
        echo '<div class="col-md-3 mb-4">
                <div class="image-container">
                
                  <img src="nature/' . $image[0] . '" alt="' . $image[1] . '">
                  
                  <div class="image-overlay">
                    <p>' . $image[1] . '</p>
                    <p ><a href="buy.php">BUY</a></p>
                  </div>
                </div>
              </div>';
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