<html>
<title>Login</title>
<head>
	<link rel="stylesheet" type="text/css" href="Addons/index.css">
	<script>
		function forgot(){
			window.alert("Mail ur details at peacock@gmail.com");
		}
		function reset() {
			header("Location:register.php");
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
			<img src="Addons/person-flat.png" alt="P">
		</div>
	  
		<div class="form">
	  
			<form action="" method="POST">
				<p class="formp">Username</p>
				<input name="id" type=text placeholder="Enter username">
				<p class="formp">Password</p>
				<input name="pass" type=password placeholder="Enter password"><br><br>
				<input type=submit name="login" value="Login"><br>
				<input type=button value="Register" onclick="reset()">
				<a href="" onclick="forgot()"><p class="forgot">Forgot your username or password?</p></a>
			</form>
	  	
			<?php
				if (isset($_POST['login'])&&$_POST['id']!="") {
					validate();
				}

				function validate()
				{
					// if ($_POST['pass'] == "root" && $_POST['id'] == "0") {
						session();
					// }

					// else {
					// 	echo '<p class="error">Wrong Id or Password</p>';
					// }
				}

				function session() {
					session_start();
					// $_SESSION['type']="admin";
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