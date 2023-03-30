<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
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

		p {
			font-size: 16px;
			margin: 0 0 10px;
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
		<h1>Admin Page</h1>
		<p>Welcome, Admin! You have access to the following features:</p>
		<ul>
			<li>Create new users</li>
			<li>Edit user information</li>
			<li>Delete users</li>
			<li>View user logs</li>
		</ul>
		<a href="#" class="button">Create User</a>
		<a href="#" class="button">Edit User</a>
		<a href="#" class="button">Delete User</a>
		<a href="#" class="button">View Logs</a>
	</div>
</body>
</html>
