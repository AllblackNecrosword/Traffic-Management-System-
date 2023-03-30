<?php
// database connection information
$servername = "localhost";
$username = "yourusername";
$password = "yourpassword";
$dbname = "yourdatabasename";

// create database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// check database connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// check if username and password are submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // query admin table
  $admin_query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
  $admin_result = mysqli_query($conn, $admin_query);

  // query traffic table
  $traffic_query = "SELECT * FROM traffic WHERE username='$username' AND password='$password'";
  $traffic_result = mysqli_query($conn, $traffic_query);

  // query user table
  $user_query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
  $user_result = mysqli_query($conn, $user_query);

  // check if user exists in any of the tables
  if (mysqli_num_rows($admin_result) > 0) {
    // user exists in admin table
    // set session variables and redirect to admin page
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['user_type'] = 'admin';
    header("Location: admin.php");
    exit();
  } elseif (mysqli_num_rows($traffic_result) > 0) {
    // user exists in traffic table
    // set session variables and redirect to traffic page
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['user_type'] = 'traffic';
    header("Location: traffic.php");
    exit();
  } elseif (mysqli_num_rows($user_result) > 0) {
    // user exists in user table
    // set session variables and redirect to user page
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['user_type'] = 'user';
    header("Location: user.php");
    exit();
  } else {
    // username and password combination not found in any table
    echo "Invalid username or password.";
  }
}

// close database connection
mysqli_close($conn);
?>
