<?php include 'header.php';?>
<?php require 'conn.php'; ?>



<?php


// Handle registration form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST['password'];

    // Check if fullname or email already exists
    $checkQuery = "SELECT fullname FROM users WHERE fullname='$fullname' OR email='$email' OR  phone='$phone'";
   $checkResult = mysqli_query($conn,$checkQuery);  
    //  $conn->query($checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
        echo "fullname or email or phone already exists.";
    } else {
        // Insert user data into the database
        $insertQuery = "INSERT INTO users (fullname,email,phone, password) VALUES ('$fullname', '$email','$phone', '$password')";
        if ($conn->query($insertQuery) === TRUE) {
         echo "<br>";
         echo "<br>";
         echo "<br>";
         echo "<br>";
            echo "Registration successful!";
        } else {
            echo '"Error: " . $conn->error';
        }
    }
}
?>

      


      

   <br>
   <br>
      <div class="login-form container mt-5">
         <div class="text">
            REGISTER
         </div>
         <form method="post">
            <div class="field">
               
               <input type="text" name="fullname" placeholder="Full Name">
            </div>
            <div class="field">
               
               <input type="text" name="phone" placeholder="Phone">
            </div>
            <div class="field">
               
               <input type="text" name="email" placeholder="Email">
            </div>
            <div class="field">
              
               <input type="password" name="password" placeholder="Set Password">
            </div>
            
           
            <button type="submit" name="register">REGISTER</button>
            
            <div class="link">
             Already Logged In ? <a href="login.php">Log In</a>
            </div>
         </form>
      </div>
   

<?php require 'footer.php'; ?>