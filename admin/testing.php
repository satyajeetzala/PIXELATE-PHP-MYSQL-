
<?php 
include 'conn.php';

// Fetch categories for the drop-down options
$sqlCategories = "SELECT cat_name FROM categories";
$resultCategories = $conn->query($sqlCategories);

// Initialize an array to store category options
$categoryOptions = array();
while ($rowCategory = $resultCategories->fetch_assoc()) {
    $categoryOptions[] = $rowCategory['cat_name'];
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["submit"])) 
{
    $cat_name = $_POST['cat_name'];
    $name = $_POST['name'];
    $price=$_POST['price'];
    $description=$_POST['description'];
    
    $imgsrc = ""; // Placeholder for the file name

    // Handle file upload if imgsrc is set and there's no error
    if (isset($_FILES["imgsrc"]) && $_FILES["imgsrc"]["error"] === 0) {
        $imgFileName = basename($_FILES["imgsrc"]["name"]);
        $imgsrc = "products/" . $imgFileName;
        $imgFilePath = __DIR__ . "/" . $imgsrc;

        if (move_uploaded_file($_FILES["imgsrc"]["tmp_name"], $imgFilePath)) {
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "File uploaded successfully.";
        } else {
            echo "Error uploading file.";
        }
      }
      
    // Insert data into "productss" table
    $sql = "INSERT INTO products (cat_name,imgsrc,name,price,description) VALUES ('$cat_name', '$imgsrc','$name','$price','$description')";
    if ($conn->query($sql) === TRUE) {
        echo "<br>";
        echo "<br>";
        echo "Data inserted successfully.";
    } else {
        echo '"Error: " . $sql . "<br>" . $conn->error';
    }
}

?>

<!-- Skip PHP part in output -->

<!-- Skip PHP part in output -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Overlay Form</title>
  <style>
    body {
      
      background: url('../images/monkey.jpg') no-repeat center center fixed;
    
    }

    #trigger-overlay-btn {
      /* Button styling */
      background-color: #4CAF50;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
      border-radius: 8px;
    }

    /* Add your styles for background blur here */
    .blur-background {
      backdrop-filter: blur(44px); /* Adjust the blur effect as needed */
    }

    /* Styles for the overlay card */
    .overlay-card {
      background: #fff;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      max-width: 400px;
      width: 100%;
      position: absolute;
      text-align: center;
    }

    /* Close button styles */
    .close-button {
      position: absolute;
      top: 10px;
      right: 10px;
      cursor: pointer;
    }
  </style>
</head>
<body>
lrglrglrekgreg
egregre
<br>
<br>
rlrlkjr
  <button id="trigger-overlay-btn">Open Form</button>

  <div class="overlay-card blur-background" id="overlay-card" style="display: none;">
    <span class="close-button" onclick="closeOverlay()">Close</span>
    <h2 style="text-align: center;">Upload Your Masterpiece</h2>
    <form method="post" enctype="multipart/form-data">
      <!-- Your form fields go here -->
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name">
      </div>
      <!-- Rest of the form fields -->

      <button type="submit" name="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">UPLOAD</button>
    </form>
  </div>

  <script>
    // Script to show/hide overlay
    const overlayCard = document.getElementById('overlay-card');
    const triggerOverlayBtn = document.getElementById('trigger-overlay-btn');

    function closeOverlay() {
      overlayCard.style.display = 'none';
      document.body.classList.remove('blur-background');
    }

    triggerOverlayBtn.addEventListener('click', () => {
      overlayCard.style.display = 'block';
      document.body.classList.add('blur-background');
    });
  </script>
</body>
</html>
