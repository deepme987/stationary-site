<html>
<title>Login</title>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link rel="stylesheet" type="text/css" href="Addons/home.css">
	<script>
		function forgot(){
			window.alert("Mail ur details at peacock@gmail.com");
		}
	</script> 
	<link rel="shortcut icon" href="Addons/title_img.ico" />
</head>
<body>

	<?php
		session_start();
		session_unset();
	?>
	<div class="block">
	  
		<div class="image">
			<img src="addons/person-flat.png" alt="P">
		</div>
	  
		<div class="form">
	  
			<form action="" method="POST">
				<p class="formp">Username</p>
				<input name="id" type=text placeholder="Enter username">
				<p class="formp">Password</p>
				<input name="pass" type=password placeholder="Enter password"><br>
				<input type=submit name="login" value="Login">
				<input type=submit name="Register" value="Register">
				<a href="" onclick="forgot()"><p class="forgot">Forgot your username or password?</p></a>
			</form>
	  	
			<?php
				if (isset($_POST['Register'])) {
					header("Location: register.php");
				}

				if (isset($_POST['login'])&&$_POST['id']!="") {
					validate();
				}

		    	if (isset($_POST['login'])&&$_POST['id']!="") {validate();}

				function validate()
				{
					$user = 'user';
					$pass = 'sakec';
					$db = 'stationary';

					$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

					$check = "SELECT Pass FROM profile WHERE UId=\"".$_POST['id']."\"";

					$data = mysqli_query($conn, $check) or die("User not found.");

					$row = mysqli_fetch_assoc($data);

					if ($_POST['pass'] == $row['Pass']) {
						mysqli_close($conn);
						session();
					}

					else {
						echo '<p class="error">Wrong Id or Password</p>';
					}
				}

				function session() {
					session_start();

					$_SESSION['id']=$_POST['id'];

					if ($_SESSION['id']=='0')
					{
						header("Location: Server/");
					}
					else
					{
						header("Location: User/");
					}
				}
			?>
		</div>
		
	</div>

</body>
</html>