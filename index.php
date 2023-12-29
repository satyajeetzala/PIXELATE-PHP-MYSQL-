<?php include 'header.php'; ?>
<?php include 'conn.php'; ?>

<section class="section">
  <div class="container animationsmate">
    <div class="row align-items-center">
      <div class="col-md-12 overlay-container">
        <img src="images/spider3.jpg" alt="Image 1" class="img-fluid">
        <div class="overlay-button">
          <a href="#section2" class="btn btn-primary"
            style="background-color: rgba(9, 8, 9, 0.287);border-color:black;">D I S C O V E R</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="section2">
  <div class="container animationsmate">
    <div class="row align-items-center">
      <div class="col-md-6 order-md-2">
        <img src="images/banner-04.jpg" alt="Image 2" class="img-fluid">
      </div>
      <div class="col-md-6">
        <h2>BUY AND SELL YOUR ARTWORK</h2>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corrupti neque hic, deleniti asperiores est quam.
          Nobis
          voluptatibus ipsum maxime nostrum quae? Quae maiores at vitae excepturi aut! Non, aperiam beatae?</p>
        <!-- <button><a href="#sectioncat">EXPLORE</button></a>
        <BR>
        <BR>
        <button><a href="admin/upload.php">UPLOAD</a></button> -->
        
            
        <div class="row justify-content-center">
          <div class="col-md-6 text-center">
            <p> </p>
            <a href="#sectioncat" class="text-decoration-none ">
              <button class="btn btn-md col-lg-12 text-light" style="background: rgb(47,4,66);
              background: linear-gradient(297deg, rgba(47,4,66,0.6559873949579832) 0%, rgba(41,8,99,0.6924019607843137) 76%);">EXPLORE</button>
            </a>
          </div>
          <div class="col-md-6 text-center">
            <p> </p>
            <a href="admin/upload.php" class="text-decoration-none">
                      <button class="btn btn-md col-lg-12 text-light" style="background: rgb(47,4,66);
                      background: linear-gradient(297deg, rgba(47,4,66,0.6559873949579832) 0%, rgba(41,8,99,0.6924019607843137) 76%);">UPLOAD</button>
            </a>
    </div>
</div>


      

      </div>
    </div>

  </div>
  </div>
  </div>
</section>
<br>
<br>


<!-- categories -->



<section id="sectioncat ">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1>Categories</h1>
      </div>
    </div>
  </div>


  <!-- aa nature nu che -->
  <?php
  $sql = "SELECT cat_id, cat_name,thumb FROM categories where cat_id=1";
  $result = $conn->query($sql);
  ?>



  <div class="container mt-5">

    <div class="row">
      <div class="col-lg-3 col-md-6 mb-4">
        <?php while ($row = $result->fetch_assoc()) { ?>
          <?php echo '
      <a href="moreproducts.php?cat_name=' . $row['cat_name'] . ' " style="text-decoration: none;color:#ffffff;"> 
      <div class="text-center">
        <img src="images/nature.jpg" alt="Image 1" class="img-fluid">
        <h4 class="mt-3 nolink" >N A T U R E</h4></a>
      </div>
    </div>';
        } ?>

        <?php
        $sql = "SELECT cat_id, cat_name,thumb FROM categories where cat_id=2";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
          echo '
    <div class="col-lg-3 col-md-6 mb-4">
    <a href="moreproducts.php?cat_name=' . $row['cat_name'] . ' " style="text-decoration: none;color:#ffffff;">
      <div class="text-center">
        <img src="images/futuristic.jpg" alt="Image 2" class="img-fluid">
        <h4 class="mt-3">F U T U R I S T I C</h4></a>
      </div>
    </div> ';
        } ?>

        <?php
        $sql = "SELECT cat_id, cat_name,thumb FROM categories where cat_id=3";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
          echo '
    <div class="col-lg-3 col-md-6 mb-4">
    <a href="moreproducts.php?cat_name=' . $row['cat_name'] . ' " style="text-decoration: none;color:#ffffff;">
      <div class="text-center">
        <img src="images/gamingassets.jpeg" alt="Image 3" class="img-fluid">
        <h4 class="mt-3">G A M I N G </h4></a>
      </div>
    </div>';
        } ?>
        <div class="col-lg-3 col-md-6 mb-4">
          <a href="exploremore.php" style="text-decoration: none;color:#ffffff;">
            <div class="text-center">
              <img src="images/exploremore.png" alt="Image 4" class="img-fluid">
              <h4 class="mt-3">M O R E</h4>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<br>
<br>
<br>









<!-- top cretors-->


<div class="container">
  <div class="row">
    <div class="col-12 text-center">
      <h1>Top Creators</h1>
    </div>
  </div>
</div>
<br>
<br>
<br>

<div class="container mt-5">
  <div class="row">
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="profile-card">
        <img src="images/creators/image(1).jpg" alt="Profile 1" class="profile-image">
        <h4 class="mt-3">Taesha Kai</h4>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="profile-card">
        <img src="images/creators/images (3).jpeg" alt="Profile 2" class="profile-image">
        <h4 class="mt-3">Jane Smith</h4>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="profile-card">
        <img src="images/creators/images (4).jpeg" alt="Profile 3" class="profile-image">
        <h4 class="mt-3">Alex Johnson</h4>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="profile-card">
        <img src="images/creators/images (5).jpeg" alt="Profile 4" class="profile-image">
        <h4 class="mt-3">Emily Brown</h4>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="profile-card">
        <img src="images/creators/images (6).jpeg" alt="Profile 5" class="profile-image">
        <h4 class="mt-3">Akira Yuu</h4>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="profile-card">
        <img src="images/creators/images (7).jpeg" alt="Profile 6" class="profile-image">
        <h4 class="mt-3">Stan Lee</h4>
      </div>
    </div>
  </div>
</div>

<br>
<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-12 text-center">
      <h1>What Experts have to say</h1>
    </div>
  </div>
</div>

<div class="container mt-5" style="background-color: ;border-radius:33px;">
  <div class="row">
    <div class="col-lg-6 mb-4">
      <div class="testimonial">
        <img src="images/steve.jpeg" alt="Profile 1" class="testimonial-image">
        <h4 class="mt-3">Steve Jobs</h4>
        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac magna at ligula tristique tempus."</p>
      </div>
    </div>
    <div class="col-lg-6 mb-4">
      <div class="testimonial">
        <img src="images/will.png" alt="Profile 2" class="testimonial-image">
        <h4 class="mt-3">Will Smith</h4>
        <p>"Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas."</p>
      </div>
    </div>
  </div>
</div>
<br>
<br>


<?php include 'footer.php'; ?>