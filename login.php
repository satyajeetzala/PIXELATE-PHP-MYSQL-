<?php include 'header.php';?>
<?php require 'conn.php'; ?>

<?php
//  session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["login"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate user input and authenticate
    $sql = "SELECT email, password FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify password (you should use password hashing here)
        if ($password == $row['password']) {
            // Valid credentials, create session
            $_SESSION['user_email'] = $row['email'];
           
            echo '<script>window.location.href = "index.php";</script>';
            exit;
        } else {
            $error = "Invalid password";
            echo $error;
        }
    } else {
        $error = "Invalid email";
        echo $error;
    }
}

?>   
      


      

   <br>
   <br>
      <div class="login-form container mt-5">
         <div class="text">
            LOGIN
         </div>
         <form method="post">
            <div class="field">
            
               <input type="text" name="email" placeholder="Email or Phone">
            </div>
            <div class="field">
            
               <input type="password" name="password" placeholder="Password">
            </div>
            
            <button type="submit" name="login">LOGIN</button>
            <div class="link">
               Not a member?
               <a href="registration.php">Signup now</a>
            </div>
         </form>
      </div>
   

