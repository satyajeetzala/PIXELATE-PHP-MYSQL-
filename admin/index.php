
<?php require 'conn.php'; ?>




<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images/favicon/favicon.ico" type="image/x-icon">
  
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  
  <style>
    .colormate{

      background-color: rgba(0, 0, 0, 0.1);
    }

    .landscape-card {
      border: none;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      
  
    }
    .landscape-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
     /* Custom CSS for the table */
     .table-container {
            margin-top: 20px;
            
            border-radius: 55px;
        }
        .table {
            background-color: rgba(0, 0, 0,0.4); /* Light gray background */
           
            border-radius: 55px;
            color: #fff;
        }
        .table th {
            background-color: rgba(0, 0, 0,0.3); /* Dark gray header background */
            color: #fff; /* White text color */
        }
        .table th, .table td {
            border: none; /* Remove table borders */
            color: #fff;
        }
        
    
  </style>
</head>
<body>

<?php

// Query to retrieve records from a table
$sql = "SELECT * FROM categories";
$result = $conn->query($sql);

if ($result) {
    $totalRecords = mysqli_num_rows($result);
    
} else {
    echo "Query failed: " . $conn->error;
}

$sql2 = "SELECT * FROM products";
$result2 = $conn->query($sql2);

if ($result2) {
    $totalRecords2 = mysqli_num_rows($result2);
    
} else {
    echo "Query failed: " . $conn->error;
}

$sql3 = "SELECT * FROM orders";
$result3 = $conn->query($sql3);

if ($result3) {
    $totalRecords3 = mysqli_num_rows($result3);
    
} else {
    echo "Query failed: " . $conn->error;
}
 
?>


<?php include'sidebar.php' ?>

<br>
<br>
  <div class="row">
  <br>
<br>
    <div class="col-12 text-center">
    <br>
<br>
<br>
      <h1 style="color:#ffffff;">ADMIN DASHBOARD</h1>
    </div>
  </div>
</div>


    <style>
        .card {
            background: rgb(19,1,31);
background: linear-gradient(297deg, rgba(19,1,31,1) 0%, rgba(22,2,32,1) 76%);
            
            color: #fff; /* Text color */
            border-radius: 10px;
        }
        .card-icon {
            font-size: 48px;
            margin-right: 20px;
        }
        .card-number {
            font-size: 36px;
        }
    </style>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <i class="card-icon fas fa-list-ul"></i>
                        <span class="card-number"><?php echo $totalRecords; ?></span>
                    </div>
                    <h5 class="text-center">     </h5>
                    <h5 class="text-center">     </h5>
                    <h5 class="text-center">Categories</h5>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <i class="card-icon fas fa-image"></i>
                        <span class="card-number"><?php echo $totalRecords2; ?></span>
                        
                    </div>
                    <h5 class="text-center">     </h5>
                    <h5 class="text-center">     </h5>
                    <h5 class="text-center">All Artworks</h5>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <i class="card-icon fas fa-shopping-cart"></i>
                        <span class="card-number"><?php echo $totalRecords3; ?></span>
                    </div>
                    <h5 class="text-center">     </h5>
                    <h5 class="text-center">     </h5>
                    <h5 class="text-center">Orders</h5>
                </div>
            </div>
        </div>
    </div>


<div class="container table-container table-responsive"  style="background: rgb(0,0,0);
background: linear-gradient(297deg, rgba(0,0,0,1) 0%, rgba(28,3,39,1) 57%, rgba(21,1,18,1) 76%);border-radius:17px">
        <br>
        <br>
        <h2 class="text-light">Recent Orders</h2>
        <br>
        <br>
        <table class="table rounded" style="background-color:rgba(0,0,0,0.1);">
            <thead>
                <tr>
                    <th>Buyer</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody class="rounded" style="border-radius:22px;">
                <?php
                include 'conn.php';
                $sql = "SELECT * from orders order by id desc;";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()){
                    echo '<tr>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['price'] . '</td>';
                    echo '<td><img src="' . $row['imgsrc'] . '" alt="Image" class="rounded" width="100"></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>




            



          </div>


    </div>
</div>



<!-- Include Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>



<script src="sources/jquery.min.js"></script>
<script src="sources/popper.min.js"></script>
<script src="sources/bootstrap.min.js"></script>

</body>
</html>


