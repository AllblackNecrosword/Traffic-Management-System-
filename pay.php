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
    <!-- <nav>
     
        <img class="logo" src="images/logo.png">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Service</a></li>
            <li><a href="#">About Us</a></li>
            <!-- <li><a href="#">Contact Us</a></li> -->
            <!-- <li><a href="#">Notices</a></li>
        </ul>
                 -->
       
    </nav> -->
   <?php include ('nav.php');?> 
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $offenseid = intval($_POST['Offencenumber']);
    $vehicleid = $conn->real_escape_string($_POST['Name']);

    $sql = "SELECT * FROM offense WHERE ticket_no=$offenseid AND violator_name='$vehicleid'";
    $result = $conn->query($sql);

    $sql1 = "SELECT offenses.code, offenses.name
        FROM offense
        INNER JOIN offenses
        ON offense.total_amount = offenses.fine";

    // Execute the query and fetch the results
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($result1);

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
          <th>Offense Code</th>
          <th>Offense Type</th>
          <th>Amount</th>
          <th>Status</th>
          <th>Issued Date</th>
          <th>Pay now</th>
          </tr>';
          
          while ($row = $result->fetch_assoc()) {
              $status = $row['status'];
              $payNowButton = ($status === 'Pending') ? '<input type="submit" name="pay" value="Pay now">' : '';
              echo "<tr>
                      <td>".$row['ticket_no']."</td>
                      <td>".$row['violator_name']."</td>
                      <td>".$row['officer_name']."</td>
                      <td>".$row['vehicles_no']."</td>
                      <td>".$row1['code']."</td>
                      <td>".$row1['name']."</td>
                      <td>".$row['total_amount']."</td>
                      <td>
                      <span style='background-color: #e74c3c; color: #fff; padding: 5px 10px; border-radius: 20px; font-size: 12px; font-weight: bold;'>".$row['status']."</span>


                      </td>
                      <td>".$row['Date']."</td>
                      <td>
                          <form method='POST' action='challan.php'>
                              <input type='hidden' name='OffenseID' value='".$row['ticket_no']."'>
                              <input type='hidden' name='Name' value='".$row['violator_name']."'>
                              <input type='hidden' name='OfficerName' value='".$row['officer_name']."'>
                              <input type='hidden' name='VehicleNumber' value='".$row['vehicles_no']."'>
                              <input type='hidden' name='code' value='".$row1['code']."'>
                              <input type='hidden' name='name' value='".$row1['name']."'>
                              <input type='hidden' name='TotalCharge' value='".$row['total_amount']."'>
                              <input type='hidden' name='Status' value='".$status."'>
                              <input type='hidden' name='IssuedDate' value='".$row['Date']."'>
                              ".$payNowButton."
                          </form>
                      </td>
                  </tr>";
          }
          

        echo '  </table>';
        echo '</div>';
        
    } else {
        echo 'Record not found';
    }
}
?>

</body>
<footer class="footer">
  <p> STOPS &copy; 2023. All rights reserved.</p>
</footer>

</html>

		
            