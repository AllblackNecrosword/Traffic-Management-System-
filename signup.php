<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>SignUP Form</title>
  <script src="https://kit.fontawesome.com/f0315fce63.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/signup.css">
  <script>
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
    <div class="logo"><a href="#"><img class="img" src="images\logo.png"></a></div>
  </nav>
  <div class="center">
    <h1>SignUp</h1>
    <form method="post" action="signup.php">
      <div class="txt_field">
        <input type="text" name="username" required>
        <span></span>
        <label>Full name</label>
      </div>
      <div class="txt_field">
    <input type="email" name="email" required>
    <span></span>
    <label>Email</label>
  </div>

  <div class="txt_field">
    <input type="text" name="phone" required>
    <span></span>
    <label>Phone</label>
  </div>


  <div class="txt_field">
    <input type="password" id="password" name="password" required>
    <span class="eye">
      <i id="password-toggle" class="fa-solid fa-eye-slash" onclick="togglePassword()"></i>
    </span>
    <span></span>
    <label>Password</label>
  </div>
  <div class="txt_field">
    <input type="password" name="cpassword" required>
    <span></span>
    <label>Confirm Password</label>
  </div>
  
  <input type="submit" name='signup' value="Create Account">
  <div class="signup_link">
    <p class="createAccount">Joined us before?<a href="login.php">Login</a></p>

  </div>
</form>
</div>
</body>