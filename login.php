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
            </div>

            <div class="txt_field">
    <input type="password" id="password" name="password" required>
    <span class="eye">
      <i id="password-toggle" class="fa-solid fa-eye-slash" onclick="togglePassword()"></i>
    </span>
    <span></span>
    <label>Password</label>
  </div>
  
  <!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
  <?php
    include'files/conn.php';

 
  if (isset($_POST['login'])) {

      $email = $_POST['email'];
      $password = $_POST['password'];

       // Check if the email exists in the database
  $users_query = "SELECT * FROM user WHERE Email = '$email'";
  $users_result = mysqli_query($conn, $users_query);

  if (!$users_result) {
    echo "Error: " . mysqli_error($conn);
    exit();
  }

  if (mysqli_num_rows($users_result) > 0){
    // The email exists, verify the password
    $user_row = mysqli_fetch_assoc($users_result);
    if (password_verify($password, $user_row['Password'])) {
      // The password is correct, start the session and redirect to the home page
      $name =$user_row['Name'];
      session_start();
          $_SESSION['username'] = $username;
          $_SESSION['name'] = $name;
          $_SESSION['user_type'] = 'user';
          header("Location: landing.php");
          exit();
    } else {
      // The password is incorrect, display an error message
      echo "<div style='color: red'>Incorrect password</div>";
    }
  } else {
    // The email is not registered, display an error message
    echo "<div style='color: red'>That email is not registered</div>";
  }
     
  
  }
  
 mysqli_close($conn);
?>

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

