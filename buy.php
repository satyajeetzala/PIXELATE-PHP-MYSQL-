<?php include 'header.php';?>

<?php

if (!isset($_SESSION['user_email'])) {
  echo '<script>window.location.href = "login.php";</script>';
    exit;
}

?>


<?php require 'conn.php'; ?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Page</title>
  <!-- Include Bootstrap CSS -->

  <style>
    .order-section {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
      padding: 50px;
      color: #FFF;
    }
    .product-image {
      flex: 1;
      padding: 20px;
      text-align: center;
    }
    .product-details {
      flex: 1;
      padding: 20px;
    }
    .product-image img {
      max-width: 100%;
      height: auto;
      border-radius: 12px;
    }
    .qr-code {
      width: 100px;
      height: 100px;
      margin-top: 20px;
    }
    .transaction-id {
      margin-top: 20px;
    }
    .buy-button {
      margin-top: 20px;
    }
    .qr-code{
      border-radius: 6px;
      margin-top: -4px;
    }
    .message {
    background-color: #FFF;
    color: #000;
    border-radius: 3px;
    padding: 10px;
    animation: fade 0.5s ease-in-out;
}

@keyframes fade {
    0% {
        opacity: 0;
        transform: translateY(-10px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}
    .success-icon {
    color: green;
}
  </style>
</head>
<body>



<?php
$id = $_GET['id'];
$sql = "SELECT id, name, imgsrc,description, price FROM products WHERE id = $id";
$result = $conn->query($sql);




if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $productName = $row['name'];
    $imgsrc = $row['imgsrc'];
    $price = $row['price'];
    $desc= $row['description'];
}
else{
  echo '<script>window.location.href = "index.php";</script>';
}
?>


<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["buy"])) {
    if (isset($_SESSION['user_email'])) {
        $user_email = $_SESSION['user_email'];
        
        // Get product details from the database based on product ID
      
            
            // Insert order details into the "orders" table
            $insertSql = "INSERT INTO orders (email, id, price, name, imgsrc,datentime) VALUES ('$user_email', $id, $price, '$productName', '$imgsrc',NOW())";

            if ($conn->query($insertSql)) {
                $yes= "&nbsp;<i class='fas fa-check-circle success-icon'></i> Order placed successfully! ";

                //to remove the product from market
                $deleteSql = "DELETE FROM products WHERE id=$id;";
                    if ($conn->query($deleteSql)) 
                    {
                        echo " ";
                    } else {
                            echo "Error deleting records: " .mysqli_error($conn);
                          }
                      }

             else {
                $no = "&nbsp;Error placing order: " . $conn->error;
            }


        
    } else {
        $login="&nbsp;User not logged in!";
    }
}
?>




<div class="container mt-5">
  <div class="row">
    <div class="col-lg-12">
      <div class="order-section">
        <div class="product-image">
          <img src="admin/<?php echo $imgsrc; ?>" alt="Product Image">
        </div>
        
        <div class="product-details">
        <form method="post">
          <h2><?php echo $productName; ?></h2>
          <p><b>Price:$ <?php echo $price; ?></b></p>
          <p>Image Quality: High</p>
          <p>Image Size: 1920x1080</p>
          <p>Description: <?php echo $desc; ?></p>
          <p><b>Payment Method</b></p>
          <p>
              <i class="fab fa-cc-paypal fa-2x"></i>&nbsp;&nbsp;
              <i class="fab fa-cc-apple-pay fa-2x"></i>&nbsp;&nbsp;
              <i class="fab fa-cc-visa fa-2x"></i>&nbsp;&nbsp;
              <i class="fab fa-cc-mastercard fa-2x"></i>&nbsp;&nbsp;
              <i class="fab fa-cc-amex fa-2x"></i>
          </p>
          <!-- <img src="images/qrcode.png" alt="QR Code" class="qr-code">
          <div class="transaction-id">
            <label for="transactionId">Transaction ID:</label>
            <input type="text" id="transactionId" class="form-control">
          </div>
           -->
          <button type="submit" value="Buy Now" name="buy" class="btn btn-primary buy-button">Buy Now</button>
            <br>
           
                
                <?php 
                if(isset($yes))
                  { 
                    echo '<div class="message mt-1">';
                    echo "<b>$yes</b><BR>";
                    echo "<B><a href='order.php'>Go to My Orders</a></B>";
                  }
                if(isset($no)){ echo $no;}
                if(isset($login)){ echo $login;}
                    ?> 
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Include Bootstrap JS -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

</body>
</html>



<?php include 'footer.php';?>