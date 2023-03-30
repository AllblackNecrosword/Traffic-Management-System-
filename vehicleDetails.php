<?php
// Establish database connection
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "trafficmanagementsystem";
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Retrieve vehicle number value passed as a parameter
$vehicle_number = $_GET["vehiclenumber"];

// Retrieve related data from table vehicle_reg
$query = "SELECT Model,EngineNumber,ChassisNumber,Company,DealerAddress,RegisteredOwner,RegisteredAddress,Color FROM vehicleregistration WHERE VehicleNumber = '$vehicle_number'";
$result = mysqli_query($conn, $query);

// Extract the related data as a string
if(mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $related_data = $row["Model"] . "," . $row["EngineNumber"] . "," . $row["ChassisNumber"]. "," .$row["Company"]. "," . $row["DealerAddress"] . "," . $row["RegisteredOwner"]. "," .$row["RegisteredAddress"]. ",". $row["Color"];
  echo $row["Model"];
} else {
  $related_data = "";
}

// Close database connection
mysqli_close($conn);

// Return the related data as a string
echo $related_data;
?>
