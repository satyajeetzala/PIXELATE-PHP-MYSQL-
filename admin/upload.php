<?php require 'conn.php'; ?>
<?php include 'headerforupload.php'; ?>

<?php
// session_start();

// Check if user is logged in
// if (!isset($_SESSION['user_email'])) {
//     header('Location:../login.php'); // Redirect to login page
//     exit;
// }
?>

<?php
// Fetch categories for the drop-down options
$sqlCategories = "SELECT cat_name FROM categories";
$resultCategories = $conn->query($sqlCategories);

// Initialize an array to store category options
$categoryOptions = array();
while ($rowCategory = $resultCategories->fetch_assoc()) {
  $categoryOptions[] = $rowCategory['cat_name'];
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["submit"])) {
  $cat_name = $_POST['cat_name'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $description = $_POST['description'];

  $imgsrc = ""; // Placeholder for the file name

  // Handle file upload if imgsrc is set and there's no error
  if (isset($_FILES["imgsrc"]) && $_FILES["imgsrc"]["error"] === 0) {
    $imgFileName = basename($_FILES["imgsrc"]["name"]);
    $imgsrc = "products/" . $imgFileName;
    $imgFilePath = __DIR__ . "/" . $imgsrc;

    if (move_uploaded_file($_FILES["imgsrc"]["tmp_name"], $imgFilePath)) {
     
      $fileupd="File uploaded successfully.";
    } else {
      echo "Error uploading file.";
    }
  }

  // Insert data into "productss" table
  $sql = "INSERT INTO products (cat_name,imgsrc,name,price,description) VALUES ('$cat_name', '$imgsrc','$name','$price','$description')";
  if ($conn->query($sql) === TRUE) {
   
    $mrkt="Data inserted successfully.";
  } else {
    echo '"Error: " . $sql . "<br>" . $conn->error';
  }

}

?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="sources/bootstrap.min.css">
  <link rel="stylesheet" href="sources/all.min.css" />
  <link rel="stylesheet" href="stylesnoside.css">
  <link rel="icon" href="images/favicon/favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="images/favicon/favicon.ico" type="image/x-icon">
  <style>
    .registration-section {
      position: relative;
      overflow: hidden;
      background: url('aditya.jpg') no-repeat center center fixed;
      background-size: cover;
      height: 100vh;
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7);
      backdrop-filter: blur(5px);
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .registration-container {
      background-color: #ffffff32;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      width: 90%;
      max-width: 600px;
      display: flex;
      color: white;
    }
    .fieldtransperent{
      background-color: rgba(0, 0, 0, 0.2);
      color: #fff;
    }
    .registration-image {
      flex: 1;
      padding: 20px;
      height: 100%;

    }

    .registration-form {
      flex: 1;
      padding: 20px;
    }

    .registration-image img {
      max-width: 100%;
      height: auto;
      border-radius: 12px;
    }
    input,
    select {
      width: 100%;
      padding: 10px;
      border: 1px solid #fff; /* White border */
      border-radius: 5px;
      background-color: #2c003e; /* Very dark purple */
      color: #fff; /* White text */
    }

    button {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 5px;
      background-color: #af52bf; /* Light purple */
      color: #fff; /* White text */
      cursor: pointer;
    }

    button:hover {
      background-color: #210a2e; /* Darker purple on hover */
    }
  </style>
</head>

<body style="margin-left: 4px;">
<br>
<br>

  <div class="container animationsmate mt-5 mb-5 col-lg-4 " style="background-color:rgba(49, 7, 60, 0.511);border-radius:17px;">
    <div class="registration-form">
      <h2 style="text-align: center;">Upload Your Masterpiece</h2>
      <form method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control fieldtransperent" name="name" id="name" placeholder="Enter your name" required>
        </div>
        <div class="form-group">
          <label for="cat_name">Category:</label>
          <select class="form-control fieldtransperent" id="cat_name" name="cat_name" required>
            <option value="">Tap to Select</option>
            <?php foreach ($categoryOptions as $category) { ?>
              <option value="<?php echo $category; ?>">
                <?php echo $category; ?>
              </option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="imgsrc">File:</label>
          <input type="file" class="form-control fieldtransperent" id="imgsrc" name="imgsrc" placeholder="FILE" required>
        </div>
        <div class="form-group">
          <label for="email">Price</label>
          <input type="text" class="form-control fieldtransperent" name="price" id="email" required>
        </div>
        <div class="form-group">
          <label for="Textfield">Description</label>
          <input type="text" name="description" class="form-control fieldtransperent" id="password" required>
        </div>
        <button type="submit" name="submit">U P L O A D</button>
        <?php 
                if(isset($fileupd))
                  { 
                    echo '<div class="message mt-1 fieldtransperent" style="border-radius:5px;">';
                    echo " &nbsp;&nbsp;$fileupd<BR>";
                    echo '</div>';
                  }
                  if(isset($mrkt))
                  { 
                    echo '<div class="message mt-1 fieldtransperent" style="border-radius:5px;">';
                    echo " &nbsp;&nbsp;$mrkt<BR>";
                    echo '</div>';
                  }
                
                    ?> 
      </form>
    </div>
  </div>

  <!-- Include Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>