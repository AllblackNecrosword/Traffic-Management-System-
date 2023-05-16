<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Vehicle Registration</title>
  <!-- <link rel="stylesheet" href="css/registration.css"> -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/reg.css">
</head>

<body>
  <div class="main">
    <?php include('nav.php'); ?>
  </div>


  <div class="boddy">
    <div class="container">
      <form action="regestration.php" method="post">
        <h2>Vehicle Registration</h2>
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
            <label for="vehicle">Vehicle Classification </label>
            <select name="classification" id="classification">
              <option value="Private"> Private</option>
              <option value="Public"> Public </option>
              <option value="Government">Government </option>
            </select>
          </div>


          <div class="input-box">
            <label for="vehiclemodel">Vehicle Model</label>
            <input type="text" placeholder="Enter Model " name="vehiclemodel" required>
          </div>

          <div class="input-box">
            <label for="vehiclenumber">Vehicle Number</label>
            <input type="text" placeholder="Enter Vehicle Number" name="vehiclenumber" required>
          </div>

          <div class="input-box">
            <label for="vehiclenumber">Vehicle Brand</label>
            <input type="text" placeholder="Enter Vechicle Brand" name="brand" required>
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
            <label for="Dname">cc</label>
            <input type="text" placeholder="Enter cubic centimeters" name="cc" required>
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
            <label for="Raddress">Seat Capacity</label>
            <input type="text" placeholder="Enter Capacity" name="seat" required>
          </div>

          <div class="input-box">
            <label for="colour">Color</label>
            <input type="text" placeholder="Enter color" name="color" required>
          </div>

          <div class="input-box">
            <label for="colour">Cylinder No</label>
            <input type="text" placeholder="Enter Cylinder No" name="cylinder" required>
          </div>

          <div class="input-box">
            <label for="colour">Engine Type</label>
            <input type="text" placeholder="Enter Engine Type" name="type" required>
          </div>

        </div>
        <div class="alert">
          <p>By clicking Register, you agree to our Terms, Privacy Policy and Cookies Ploicy.</p>
        </div>
        <!-- <div class="button-container">
        <button type="submit">Register</button>
      </div> -->
        <button class="learn-more" name="register">
          <span class="circle" aria-hidden="true">
            <span class="icon arrow"></span>
          </span>
          <span class="button-text">Register</span>
        </button>

      </form>
    </div>
  </div>
  <div class="popup" id="popup">
    <img src="images/tick.png">
    <h2>Thank You!</h2>
    <p>Your details has been sucessfully submitted. Thanks!</p>
    <button type="button" id="button">OK</button>
  </div>
</body>
<footer class="footer">
  <p> STOPS &copy; 2023. All rights reserved.</p>
</footer>
<script src="files/reg.js"></script>

</html>
<!-- ********************************************php******************************************************* -->
<?php
include 'files/conn.php';

// Check if the form has been submitted
if (isset($_POST['register'])) {

  // Get values from form input fields
  $vehicle_type = $_POST['vehicle'];
  $classification = $_POST['classification'];
  $vehicle_model = $_POST['vehiclemodel'];
  $vehicle_number = $_POST['vehiclenumber'];
  $brand = $_POST['brand'];
  $engine_number = $_POST['enginenumber'];
  $chasis_number = $_POST['chasisnumber'];
  $cc = $_POST['cc'];
  $dealer_address = $_POST['Daddress'];
  $reg_owner = $_POST['Rowner'];
  $seats = $_POST['seat'];
  $color = $_POST['color'];
  $cylinder = $_POST['cylinder'];
  $engine_type = $_POST['type'];

  // Get current date and time
  date_default_timezone_set('Asia/Kolkata');
  $date = date('Y-m-d H:i:s');

  $users_query = "SELECT * FROM registered_vehicle WHERE Vehicle_Number = '$vehicle_number'";

  $users_result = mysqli_query($conn, $users_query);


  if (!$users_result) {
    echo "Error: " . mysqli_error($conn);
    exit();
  }
  if (mysqli_num_rows($users_result) > 0) {
    echo "<div style='color: red'>That vehicle has already been registered</div>";


    exit();

  } else {
    // Insert values into database table
    $sql = "INSERT INTO registered_vehicle (Type, Classification, Model, Vehicle_Number,Brand, Engine_Number, ChassisNumber,CC, DealerAddress, Reg_Owner, Seat_Capacity, Color,CylinderNumber,EngineType)
      VALUES ('$vehicle_type','$classification', '$vehicle_model', '$vehicle_number','$brand', '$engine_number', '$chasis_number', '$cc', '$dealer_address', '$reg_owner', '$seats', '$color', '$cylinder','$engine_type')";

    if ($conn->query($sql) === TRUE) {
      echo "<div style='color: red'>Your vehicle has been registered successfully</div>";
      $title = 'Vehicle registered';
      $message = "A new vehicle $vehicle_number has been registered by $reg_owner";
      $stmt2 = $conn->prepare('INSERT INTO notification (Title, `Message`) VALUES (?, ?)');
      $stmt2->bind_param('ss', $title, $message);
      $stmt2->execute();
      $stmt2->close();


    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

  }


}

// Close connection
$conn->close();
?>