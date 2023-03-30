<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/registration.css">
</head>
<body>
  <nav>
    <ul>
      <li><a href="user.php">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
  </nav>

  <div class="boddy">
  <div class="container">
    <form action="vehicleRegistration.php" method="post">
      <h2>Vechicle Registation</h2>
      <div class="content">

        <div class="input-box">
        <label for="vehicle">Vehicle Type</label>
      <select name="vehicle" id="vehicle">
      <option value="Twowheelers">Two wheelers</option>
      <option value="Threewheelers">Three wheelers</option>
      <option value="Fourwheelers">Four wheelers</option>
      </select>
        </div>


        <div class="input-box">
          <label for="vehiclemodel">Vehicle Model</label>
          <input type="text" placeholder="Enter Full Name" name="vehiclemodel" required>
        </div>

        <div class="input-box">
          <label for="vehiclenumber">Vehicle Number</label>
          <input type="text" placeholder="Enter Vechicle Number" name="vehiclenumber" required>
        </div>

        <div class="input-box">
          <label for="enginenumber">Engine Number</label>
          <input type="text" placeholder="Enter valid Engine number" name="enginenumber" required>
        </div>

        <div class="input-box">
          <label for="chasisnumber">Chasis Number</label>
          <input type="text" placeholder="Enter Chasis Number" name="chasisnumber" required>
        </div>

        <div class="input-box">
          <label for="Dname">Dealer Name/Company</label>
          <input type="text" placeholder="Enter Dealer Name" name="Dname" required>
        </div>

        <div class="input-box">
          <label for="Daddress">Dealer Address</label>
          <input type="text" placeholder="Enter Address" name="Daddress" required>
        </div>

        <div class="input-box">
          <label for="Rowner">Reg Owner</label>
          <input type="text" placeholder="Enter Reg owner" name="Rowner" required>
        </div>

        <div class="input-box">
          <label for="Raddress">Reg Address</label>
          <input type="text" placeholder="Enter Address" name="Raddress" required>
        </div>

        <div class="input-box">
          <label for="colour">Color</label>
          <input type="text" placeholder="color" name="color" required>
        </div>

      </div>
      <div class="alert">
        <p>By clicking Register, you agree to our Terms, Privacy Policy and Cookies Ploicy.</p>
      </div>
      <!-- <div class="button-container">
        <button type="submit">Register</button>
      </div> -->
      <button class="learn-more" name ="register">
        <span class="circle" aria-hidden="true">
        <span class="icon arrow"></span>
        </span>
        <span class="button-text">Register</span>
      </button>

    </form>
  </div>
</div>
</body>
</html>
<!-- ********************************************php******************************************************* -->

<?php
include 'files/conn.php';

// Check if the form has been submitted
if(isset($_POST['register'])) {

  // Get values from form input fields
  $vehicle_type = $_POST['vehicle'];
  $vehicle_model = $_POST['vehiclemodel'];
  $vehicle_number = $_POST['vehiclenumber'];
  $engine_number = $_POST['enginenumber'];
  $chasis_number = $_POST['chasisnumber'];
  $dealer_name = $_POST['Dname'];
  $dealer_address = $_POST['Daddress'];
  $reg_owner = $_POST['Rowner'];
  $reg_address = $_POST['Raddress'];
  $color = $_POST['color'];

  // Get current date and time
  date_default_timezone_set('Asia/Kolkata');
  $date = date('Y-m-d H:i:s');

  // Insert values into database table
  $sql = "INSERT INTO vehicleregistration (Type, Model, VehicleNumber, EngineNumber, ChassisNumber, Company, DealerAddress, RegisteredOwner, RegisteredAddress, Color, RegisteredDate)
  VALUES ('$vehicle_type', '$vehicle_model', '$vehicle_number', '$engine_number', '$chasis_number', '$dealer_name', '$dealer_address', '$reg_owner', '$reg_address', '$color', '$date')";

  if ($conn->query($sql) === TRUE) {
    echo "<div style='color: red'>Your vehicle has been registered successfully</div>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Close connection
$conn->close();
?>

