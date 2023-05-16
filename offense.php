<!DOCTYPE html>
<html>
<head>
	<title>Offence Report Form</title>
	<style type="text/css">
		label {
			display: inline-block;
			width: 100px;
			margin-bottom: 10px;
		}
		input[type="submit"] {
			margin-top: 10px;
		}
		table {
			border-collapse: collapse;
			margin-top: 20px;
		}
		th, td {
			padding: 5px;
			border: 1px solid black;
		}
	</style>
</head>
<body>
	<h1>Offence Report Form</h1>
	<form method="POST">
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" required>
		<br>
		<label for="offenceid">Offence ID:</label>
		<input type="text" id="offenceid" name="offenceid" required>
		<br>
		<input type="submit" value="Submit">
	</form>

	<?php
		include 'files/conn.php';

		// Check if form was submitted
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$name = $_POST["name"];
			$offenceid = $_POST["offenceid"];

			// Query database for matching records
			$sql = "SELECT * FROM offence WHERE name='$name' AND offenceId=$offenceid";
			$result = $conn->query($sql);

			// Check if any records were found
			if ($result->num_rows > 0) {
				echo "<table>";
				echo "<tr><th>Offence ID</th><th>Name</th><th>Offence</th><th>Charge</th><th>Pay Now</th></tr>";
				while ($row = $result->fetch_assoc()) {
					echo "<tr><td>".$row["offenceId"]."</td><td>".$row["Name"]."</td><td>".$row["Offence"]."</td><td>".$row["Charge"]."</td><td><form method='POST' action='payment.php'><input type='hidden' name='name' value='".$row["Name"]."'><input type='hidden' name='offenceid' value='".$row["offenceId"]."'><input type='hidden' name='charge' value='".$row["Charge"]."'><input type='hidden' name='offence' value='".$row["Offence"]."'><input type='submit'name='pay' value='Pay Now'></form></td></tr>";
				}
				echo "</table>";
			} else {
				echo "No matching records found.";
			}
		}

		$conn->close();
	?>
</body>
</html>
