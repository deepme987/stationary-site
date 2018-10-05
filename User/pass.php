<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- <meta http-equiv="refresh" content="2"> -->
	<link rel="stylesheet" href="Addons/updateNnewpass.css">
	<title>Edit Profile - Password</title>
	<style>
		.tags {
		    float:left;
		    text-align: right;
		    padding-top: 17px;
		    padding-right: 0px;
		    margin:20px;
		    margin-top:0px;
		    /*background-color: aquamarine;*/
		}
		.tags ul
		{
		    padding:0px;
		}
		.tags ul li
		{
		    /*font-family: cursive;*/
		    font-weight: bold;
		}
		.container {
		    text-align:left;
		    padding:25px;
		    padding-top: 0px;
		    padding-right: 0px;
		    margin:30px;
		    /*background-color:blueviolet;*/
		}
		.container ul
		{
		    padding:0px;
		}
		.container ul li
		{
		    text-transform: uppercase;
		    /*font-family: cursive;*/
		}
		.container > form > input {
		  border-spacing: 5px;
		  padding: 10px;
		  float: left;
		}

		div.tags > ul > li, div.container > form > ul > li {
			font-style: Georgia,serif;
			font-size: 15px;
		  padding: 15px;
		}

		div.tags > ul, div.container > form > ul {
		  list-style-type: none;
		}
	</style>
</head>
<body>		

	<div class="tags">
		<ul>
			<li>Old Password: </li>
			<li>New Password: </li>
		</ul>
	</div>
	<?php

		if (isset($_POST['back'])) {
			header('Location: profile');
		}

		disp();

		function disp() {

			echo'<div class="container">
				<form action="" method="POST">
					<br><ul><li><input type="password" name="Old" value=""><br></li>
					<li><input type="password" name="New" value=""><br></li>
					<input name="update" type="submit" value="Update">
					<input name="back" type="submit" value="Go Back"></ul>
				</form> 
			</div>';
		}

		if (isset($_POST['update'])) {validate();}

		function validate()
		{
			$old = $_POST['Old'];
			$new = $_POST['New'];
			
			if ($old=="" || $new=="") {
				echo"<div class=\"container\"><p>Enter all details.</p></div>";
			}

			else {
				update($old, $new);
			}
		}

	
		function update($old, $new) {

			$user = 'user';
			$pass = 'sakec';
			$db = 'stationary';

			$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

			$check = "SELECT Pass FROM profile WHERE Uid=\"".$_SESSION['id']."\"";

			$data = mysqli_query($conn, $check) or die("No records found.");

			$row = mysqli_fetch_assoc($data);

			if ($old == $row['Pass']) {
				$sql = "UPDATE `profile` SET Pass=\"".$_POST['New']."\" WHERE Uid=\"".$_SESSION['id']."\"";

				if (mysqli_query($conn, $sql)) {
					echo "<div class=\"container\"><p>Password changed, redirecting to your profile...</p></div>";
				}
	
				else {
					echo "Error: ".mysqli_error($conn);
				}
				mysqli_close($conn);
				header("refresh:3; url=http://localhost/Git/stationary-site/User/profile");
			}

			else {
				echo "<div class=\"container\"><p>Wrong Password</p></div>";
			}
		}

	?>

</body>
</html>