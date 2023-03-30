<!DOCTYPE html>
<html>
<head>
	<title>Traffic Management Dashboard</title>
	<style>
		/* CSS styles for the page */
		body {
			background-color: #f0f0f0;
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}

		.container {
			margin: 20px auto;
			max-width: 800px;
			padding: 20px;
			background-color: #fff;
			box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
		}

		h1 {
			font-size: 32px;
			margin: 0 0 20px;
		}

		.panel {
			background-color: #fff;
			box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
			padding: 20px;
			border-radius: 5px;
			margin-bottom: 20px;
		}

		.panel h2 {
			font-size: 24px;
			margin: 0 0 10px;
		}

		.panel p {
			font-size: 16px;
			margin: 0 0 10px;
		}

		.panel ul {
			list-style: none;
			padding: 0;
			margin: 0;
		}

		.panel li {
			font-size: 16px;
			margin-bottom: 5px;
			padding-left: 20px;
			position: relative;
		}

		.panel li:before {
			content: "";
			display: block;
			position: absolute;
			left: 0;
			top: 5px;
			width: 10px;
			height: 10px;
			border-radius: 50%;
			background-color: #4CAF50;
		}

		.button {
			background-color: #4CAF50;
			border: none;
			color: white;
			padding: 10px 20px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 10px 0;
			cursor: pointer;
			border-radius: 5px;
		}

		.button:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Traffic Management Dashboard</h1>
		<div class="panel">
			<h2>Traffic Status</h2>
			<p>Here is the current traffic status:</p>
			<ul>
				<li>High traffic on Main Street</li>
				<li>Moderate traffic on Second Avenue</li>
				<li>Low traffic on Third Street</li>
			</ul>
		</div>
		<div class="panel">
			<h2>Recent Incidents</h2>
			<p>Here are the recent traffic incidents:</p>
			<ul>
				<li>Accident on Main Street (10 minutes ago)</li>
				<li>Vehicle breakdown on Second Avenue (1 hour ago)</li>
				<li>Construction on Third Street (2 hours ago)</li>
			</ul>
		</div>
		<a href="#" class="button">View Traffic Cameras</a>
		<a href="#" class="button">View Incident Reports</a>
	</div>
    <footer>
	<p>Copyright © 2023 Traffic Management System</p>
</footer>
</body>
</html>
