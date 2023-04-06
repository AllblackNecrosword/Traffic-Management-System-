<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <script src="https://kit.fontawesome.com/f0315fce63.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/login.css">
    <script>
        function showMessage() {
            alert('Logged in Successfully');
            
        }
        function PasswordVisibility() {
        var passwordInput = document.getElementById('password');
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }

    function togglePassword() {
      var passwordField = document.getElementById("password");
      var passwordToggle = document.getElementById("password-toggle");
      if (passwordField.type === "password") {
        passwordField.type = "text";
        passwordToggle.classList.replace("fa-eye-slash", "fa-eye");
      } else {
        passwordField.type = "password";
        passwordToggle.classList.replace("fa-eye", "fa-eye-slash");
      }
    }
    </script>
     
</head>
<body>
    <nav>
        <div class="logo"><a href="#"><img class="img" src="images/logo.png"></a></div>
    </nav>
    <div class="center">
        <h1>Login</h1>
        <form  method="post" action = "login.php">
            <div class="txt_field">
                <input type="text" name = "email" required>
                <span></span>
                <label>Email</label>
            </div>S

            <div class="txt_field">
    <input type="password" id="password" name="password" required>
    <span class="eye">
      <i id="password-toggle" class="fa-solid fa-eye-slash" onclick="togglePassword()"></i>
    </span>
    <span></span>
    <label>Password</label>
  </div>
    <input type="submit" name="login" value="Login">

            <div class="signup_link">
                <p class="createAccount">New to STOPS?<a href="signup.php">Create Account</a></p>
            </div>
        </form>
    </div>
    <footer>
        <div class="footer">
            <p> STOPS &copy; 2023. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
<?php
  $servername = "localhost"; 
  $username = "root"; 
  $password = "SQL.18abi"; 
  $dbname = "trafficmanagementsystem"; 
  $conn = new mysqli($servername, $username, $password, $dbname);
  

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  
 
  if (isset($_POST['login'])) {

      $email = $_POST['email'];
      $password = $_POST['password'];
  
      // Prepare the SQL statement with placeholders
      $admin_query = "SELECT * FROM admin WHERE Email = '$email' AND Password = '$password'";

      $admin_result = mysqli_query($conn, $admin_query);

      $users_query = "SELECT * FROM users WHERE Email = '$email' AND Password = '$password'";

      $users_result = mysqli_query($conn, $users_query);

      if (!$admin_result) {
        echo "Error: " . mysqli_error($conn);
        exit();
      }

      if (!$users_result) {
        echo "Error: " . mysqli_error($conn);
        exit();
      }
  
      
  
      // Check if the query returned any rows
      if (mysqli_num_rows($admin_result) > 0) {
          // User has been found, log them in
          echo "Admin logged in successfully";
         
          // set session variables and redirect to admin page
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['user_type'] = 'admin';
    echo "<script>showMessage();</script>";
    header("Location: admin.php");
    exit();
          
      } else if (mysqli_num_rows($users_result) > 0){
          // User not found, display an error message
          echo "User logged in successfully";
          session_start();
    $_SESSION['username'] = $username;
    $_SESSION['user_type'] = 'user';
    header("Location: dashboard.php");
    exit();
      }else{
        echo "Invalid email or password";
      }
  
  
  }
  
 mysqli_close($conn);
?>
