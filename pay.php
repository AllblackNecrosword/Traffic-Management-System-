<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Challan</title>
  <!-- <link rel="stylesheet" href="css/registration.css"> -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/offense.css">

</head>
<body>
  <div class="main">
    <nav>
     
        <img class="logo" src="images/logo.png">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Service</a></li>
            <li><a href="#">About Us</a></li>
            <!-- <li><a href="#">Contact Us</a></li> -->
            <li><a href="#">Notices</a></li>
        </ul>
                
       
    </nav>
</div>



  <div class="boddy">
  <div class="container">
    <form action="" method="post">
      <h2>Offense Details</h2>
      <p class="detail">
        After getting challan detail you can further go for challan payment.
      </p>
      <div class="content">

        <div class="input-box">
            <label for="vehiclemodel">Offense Number</label>
            <input type="text" placeholder="Enter Offense Number " name="Offencenumber" required>
          </div>
  
        <div class="input-box">
          <label for="vehiclemodel">Name</label>
          <input type="text" placeholder="Enter Plate Number " name="Name" required>
        </div>

      </div>
      <div class="alert">
        <p>By clicking Get Details, you agree to our Terms, Privacy Policy and Cookies Ploicy.</p>
      </div>
  
      <button class="learn-more" name ="register">
        <span class="circle" aria-hidden="true">
        <span class="icon arrow"></span>
        </span>
        <span class="button-text">Get Details</span>
      </button>

    </form>
  </div>
</div>
<!-- Chcek record -->
<!-- <button id="check-button">Check Record</button>
<div id="error-message"></div> -->



<!-- ********************************************php******************************************************* -->
<?php
include 'files/conn.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $offenseid = intval($_POST['Offencenumber']);
    $vehicleid = $conn->real_escape_string($_POST['Name']);

    $sql = "SELECT * FROM offense WHERE OffenseID=$offenseid AND ViolatorName='$vehicleid'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo 'Record found';
        echo '<div id="tableContainer">';
        echo '  <table id="myTable">';
        echo '
          <tr>
            <th>OffenseID</th>
            <th>Violator Name</th>
            <th>Officer Name</th>
            <th>Vehicle Number</th>
            <th>Offense Type</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Issued Date</th>
            <th>Pay now</th>
          </tr>';

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row['OffenseID']."</td>
                    <td>".$row['ViolatorName']."</td>
                    <td>".$row['OfficerName']."</td>
                    <td>".$row['VehicleNumber']."</td>
                    <td>".$row['OffenseType']."</td>
                    <td>".$row['Amount']."</td>
                    <td>".$row['Status']."</td>
                    <td>".$row['Date']."</td>
                    <td>
                        <form method='POST' action='challan.php'>
                            <input type='hidden' name='OffenseID' value='".$row['OffenseID']."'>
                            <input type='hidden' name='Name' value='".$row['ViolatorName']."'>
                            <input type='hidden' name='OfficerName' value='".$row['OfficerName']."'>
                            <input type='hidden' name='VehicleNumber' value='".$row['VehicleNumber']."'>
                            <input type='hidden' name='Offense' value='".$row['OffenseType']."'>
                            <input type='hidden' name='TotalCharge' value='".$row['Amount']."'>
                            <input type='hidden' name='Status' value='".$row['Status']."'>
                            <input type='hidden' name='IssuedDate' value='".$row['Date']."'>
                            <input type='submit' name='pay' value='Pay now'>
                        </form>
                    </td>
                </tr>";
        }

        echo '</table>';
        echo '</div>';

    } else {
        echo 'No record found';
    }
}
?>
</body>
<footer class="footer">
  <p> STOPS &copy; 2023. All rights reserved.</p>
</footer>
<!-- <script src="files/offense.js"></script> -->
</html>

		
            