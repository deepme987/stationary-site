<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<style>
		.form-group {
			color: yellow;
		}
		.card-header {
			color: lime;
		}
	</style>
	<title>Register</title>
	<link rel="stylesheet" href="Addons/home.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

	<div>
		<div class="card-header">Register Yourself!</div>
		
		<div class="card-body">
			<form method="POST" action="" autocomplete="off">
				<!-- <input autocomplete="off" name="hidden" type="text" style="display:none;"> -->
				<div class="form-group col-sm-4">
					<label for="Email">Email address</label>
					<input type="text" class="form-control" name="Email" placeholder="Enter email">
				</div>

				<div class="form-group col-sm-4">
					<label for="UserId">Smart Card</label>
					<input type="text" class="form-control" name="UserId" placeholder="Smart Card Id">
				</div>

				<div class="form-group col-sm-4">
					<label for="Pass">Password</label>
					<input type="password" class="form-control" name="Pass" placeholder="Password">
				</div>

				<div class="form-group col-sm-4">
					<label for="Name">Name</label>
					<input type="text" class="form-control" name="Name" placeholder="Full Name">
				</div>

				<div class="form-group col-sm-4">
					<label for="group">Year</label>
					<div class="group">
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="Class" id="FE" value="FE">
							<label class="form-check-label" for="FE">FE</label>
						</div>
						
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="Class" id="SE" value="SE">
							<label class="form-check-label" for="SE">SE</label>
						</div>

						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="Class" id="TE" value="TE">
							<label class="form-check-label" for="TE">TE</label>
						</div>

						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="Class" id="BE" value="BE">
							<label class="form-check-label" for="BE">BE</label>
						</div>
					</div>
				</div>

				<div class="form-group col-sm-4">
				    <label for="Div">Class</label>
				    <select class="form-control col-sm-3" name="Div" name="Div">
					    <option>1</option>
					    <option>2</option>
					    <option>3</option>
					    <option>4</option>
					    <option>5</option>
					    <option>D</option>
					</select>
				</div>

				<div class="form-group col-sm-4">
					<label for="RollNo">Roll No.</label>
					<input type="text" class="form-control" name="RollNo" placeholder="Enter your Roll No">
				</div>

				<button type="submit" class="btn btn-primary" name="register" style="margin: 15px 0 0 15px">Register</button>
				<button type="button" class="btn btn-primary" name="login" style="margin: 15px 0 0 15px">Back to Login</button>
			</form>
		</div>
	</div>

	<?php

		if (isset($_POST['login']))
		{
			header("Location: index.php");
		}
		
		if (isset($_POST['register'])) {update();}
	
		function update() {

			$user = 'user';
			$pass = 'sakec';
			$db = 'stationary';

			$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

			$sql = "INSERT INTO `profile`(`Uid`, `Name`, `Email`, `Class`, `RollNo`, `Pass`) VALUES (\"".$_POST['UserId']."\",\"".$_POST['Name']."\",\"".$_POST['Email']."\",\"".$_POST['Class']." - ".$_POST['Div']."\",".$_POST['RollNo'].",\"".$_POST['Pass']."\")";
			echo "$sql";

			if (mysqli_query($conn, $sql)) {
				echo "Created Profile, redirecting to login...";
			}
	
			else {
				echo "Error: ".mysqli_error($conn);
			}

			mysqli_close($conn);

			echo "Registered successfully!";
			header("refresh:3; url=http://localhost/Git/stationary-site/index.php");
		}
	?>
</body>
</html>