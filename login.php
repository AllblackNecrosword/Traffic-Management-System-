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
