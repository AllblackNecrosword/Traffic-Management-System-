<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lost Vehicle</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/lostVehicle.css">
</head>
<body>
  <?php
  include'files/conn.php';
  
// Check if the form has been submitted
if(isset($_POST['register'])) {

  // Get values from form input fields
  $vehicle_type = $_POST['vehicle'];
  $vehicle_model = $_POST['vehiclemodel'];
  $vehicle_number = $_POST['vehiclenumber'];
  $engine_number = $_POST['enginenumber'];
  $chasis_number = $_POST['chasisnumber'];
  $dealer_name = $_POST['Dname'];
  $reg_owner = $_POST['Rowner'];
  $reg_address = $_POST['Raddress'];
  $color = $_POST['color'];
  $cc =$_POST['cc'];
  $date = $_POST['date'];
  $address =$_POST['address'];



  // Insert values into database table
  $sql = "INSERT INTO lostvehicle (Type, Model, VehicleNumber, EngineNumber, ChassisNumber, Dealer, registered_owner, registered_address, color,cc,lostDate,lostAddress)
  VALUES ('$vehicle_type', '$vehicle_model', '$vehicle_number', '$engine_number', '$chasis_number', '$dealer_name',  '$reg_owner', '$reg_address', '$color',$cc,'$date','$address')";

  if ($conn->query($sql) === TRUE) {
    echo "<div style='color: red'>Your vehicle has been registered successfully</div>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
  ?>
  <header>
    <div class="main">
        <nav>
            <!-- <h1>Logo</h1> -->
            <img class="logo" src="images/viber_image_2023-03-16_10-13-00-055.png">
            <ul>
                <li><button class="btn"> Home
                </button></li>

                <li><button class="btn"> Services
                </button></li>
                <li><button class="btn"> About us
                </button></li>
                <!-- <li><a href="#">Contact Us</a></li> -->
                <li><button class="btn"> News
                </button></li>
            </ul>
        </nav>
    </div>
</header>


  <div class="boddy">
  <div class="container">
    <form action="" method="post">
      <h2>Lost Vehicle Application</h2>
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
          <label for="vechiclemodel">Vehicle Model</label>
          <input type="text" placeholder="Enter Full Name" name="vehiclemodel" required>
        </div>

        <div class="input-box">
          <label for="vechiclenumber">Vehicle Number</label>
          <input type="text" placeholder="Enter Vechicle Number" name="vehiclenumber" required>
        </div>

        <div class="input-box">
          <label for="enginenumber">Engine Number</label>
          <input type="text" placeholder="Enter valid Engine number" name="enginenumber" required>
        </div>

        <div class="input-box">
          <label for="chasisnumber">Chassis Number</label>
          <input type="text" placeholder="Enter Chasis Number" name="chasisnumber" required>
        </div>

        <div class="input-box">
          <label for="Dname">Dealer Name/Company</label>
          <input type="text" placeholder="Enter Dealer Name" name="Dname" required>
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

        <div class="input-box">
          <label for="colour">Cc</label>
          <input type="text" placeholder="color" name="cc" required>
        </div>

        <div class="input-box">
            <label for="dateTime">Lost Date and Time</label>
            <input type="datetime-local" placeholder="color" name=" date">
          </div>

          <div class="input-box">
            <label for="address">Address</label>
            <input type="text" placeholder="color" name="address" required>
          </div>

      </div>
    



      <div class="alert">
        <p>By clicking Register, you agree to our Terms, Privacy Policy and Cookies Ploicy.</p>
      </div>
      <button class="learn-more" name = "register">
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