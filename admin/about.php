<?php include 'header.php';?>
<?php require 'conn.php'; ?>

<style>
    .about-section {
      padding: 50px 0;
      background-color: #0000;
    }
    .about-content {
      text-align: center;
    }
    .about-title {
      font-size: 30px;
      margin-bottom: 20px;
    }
    .about-text {
      font-size: 18px;
      color: #555;
      margin-bottom: 30px;
    }
    .objective {
      text-align: center;
    }
    .objective-title {
      font-size: 24px;
      margin-bottom: 20px;
    }
    .objective-text {
      font-size: 16px;
      color: #555;
      margin-bottom: 30px;
    }
    .address {
      text-align: center;
    }
    .address-title {
      font-size: 24px;
      margin-bottom: 20px;
    }
    .address-text {
      font-size: 16px;
      color: #555;
    }
  </style>
</head>
<body>
<br>
<br>
<br>
<section class="about-section">
  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-12">
        <div class="about-content">
          <h2 class="about-title">About Us</h2>
          <p class="about-text">Welcome to Digital Art Hub! We are a passionate community of digital artists, creators, and enthusiasts who come together to celebrate the beauty and innovation of digital art.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="objective">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="objective-content">
          <h2 class="objective-title">Our Objective</h2>
          <p class="objective-text">Our mission is to provide a platform for artists to showcase their incredible digital creations, connect with fellow artists, and inspire others to explore the limitless possibilities of digital art.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="address">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="address-content">
          <h2 class="address-title">Visit Us</h2>
          <p class="address-text">Digital Art Hub<br>
            123 Creative Street<br>
            Artville, AR 12345<br>
            Email: info@pixelate.com<br>
            Phone: 9925465352</p>
        </div>
      </div>
    </div>
  </div>
</section>


<?php require 'footer.php'; ?>