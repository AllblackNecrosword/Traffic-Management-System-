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

    const inputFields = document.querySelectorAll('input');
  inputFields.forEach((input) => {
    input.addEventListener('focus', () => {
      // Clear the error message
      const errorMessage = document.getElementById('error-messages');
      if (errorMessage) {
        errorMessage.textContent = '';
      }
    });
  });
  </script>
</head>
<body>
  <nav>
    <div class="logo"><a href="#"><img class="img" src="images/logo.png"></a></div>
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
  <!-- ********************php*********************************************** -->
  <?php
  if (isset($_POST['signup'])) {
    // Get the email and password from the form
    include 'files/conn.php';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // Email verification
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "<div style='color: red'>Invalid email format</div>";
 
  exit();
}

// Password strudiness  verification
if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
  echo "<div style='color: red'>Password should be at least 8 characters long, and contain at least one uppercase letter, one lowercase letter, one number and one special character</div>";
  exit();
}


// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Output the hashed password
echo $hashedPassword;


    if ($password == $cpassword) {
      
        $users_query = "SELECT * FROM users WHERE Email = '$email'";

        $users_result = mysqli_query($conn, $users_query);

        
      if (!$users_result) {
        echo "Error: " . mysqli_error($conn);
        exit();
      }
      if (mysqli_num_rows($users_result) > 0){
        echo "<div style='color: red'>That email has already been registered</div>";
        
        exit();

    }else{
      $users_query = "SELECT * FROM users WHERE Email = '$email' AND Password = '$password'";

    $users_result = mysqli_query($conn, $users_query);


    $sql = "INSERT INTO users (Name, Email, Phone, Password) VALUES ('$username','$email','$phone','$hashedPassword')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
       echo "<div style='color: red'>Account Created Successfully</div>";
      
    }

    }
  

    } else {
      echo "<div style='color: red'>Password does not match</div>";

    }
  }
  ?>




  
</form>
</div>
</body>