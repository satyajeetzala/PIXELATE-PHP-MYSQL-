<?php include 'header.php';?>
<?php require 'conn.php'; ?>


<?php





if (!isset($_SESSION['user_email'])) {
    echo '<script>window.location.href = "login.php";</script>';
    exit;
}

$user_email = $_SESSION['user_email'];

$sql = "SELECT name, imgsrc, price,datentime FROM orders WHERE email = '$user_email' order by datentime DESC";
$result = $conn->query($sql);


?>
<BR>
<BR>
<BR>
<div class="container mt-5">
  <div class="row">
    
    <div class="col-12 text-center">
    <BR>
<BR>
<BR>
      <h1>My Orders</h1>
    </div>
  </div>
</div>

<div class="container mt-5">

        <div class="row">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img src="admin/<?php echo $row['imgsrc']; ?>" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                            <p class="card-text">Date: <?php echo $row['datentime']; ?>
                            <h6 class="card-text" style="color:#020203;font-color:#00000;">Price: $<?php echo $row['price']; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>





<?php include 'footer.php';?>