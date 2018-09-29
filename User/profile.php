<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profile</title>
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

	<?php

		if (isset($_POST['pass'])) {
			header("Location: index.php?page=pass");
		}
		if (isset($_POST['update'])) {
			header("Location: index.php?page=profile");

			$user = 'user';
			$pass = 'sakec';
			$db = 'stationary';

			$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);


			$sql = "UPDATE `profile` SET MobNo=".$_POST['MobNo'].", Email=\"".$_POST['Email']."\" WHERE Uid=\"".$_SESSION['id']."\"";

			if (mysqli_query($conn, $sql)) {
				echo "Updated Profile";
			}
	
			else {
				echo "Error: ".mysqli_error($conn);
			}

			mysqli_close($conn);

		}
	?>
	
	<div class="tags">
		<ul>
			<li>User-Id: </li>
			<li>Name: </li>
			<li>Classs/Division:</li>
			<li>Roll No:</li>
			<li>Email Address: </li>
			<li>Contact No: </li>
		</ul>
	</div>

	<?php
			$user = 'user';
	        $pass = 'sakec';
	        $db = 'stationary';

	        $conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

			$sql = "select * from profile where Uid='".$_SESSION['id']."'";

			$data = mysqli_query($conn, $sql) or die("Item not found.");

			$row = mysqli_fetch_assoc($data);

			echo'<div class="container">
				<form action="" method="POST">
					<br><ul class="ulright">
					<li>'.$row["Uid"].'</li>
					<li><span>'.$row["Name"].'</span><br></li>
					<li><span>'.$row["Class"].'</span><br></li>
					<li><span>'.$row["RollNo"].'</span><br></li>
					<li><input type="email" name="Email" value="'.$row["Email"].'"><br></li>
					<li><input type="text" name="MobNo" value="'.$row["MobNo"].'"><br></li>
					<input name="update" type="submit" value="Update">
					<input name="pass" type="submit" value="Change Pass"></ul>
				</form> 
			</div>';
			mysqli_close($conn);
	?>
</body>
</html>