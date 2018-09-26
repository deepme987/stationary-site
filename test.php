<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Arrays</title>
</head>
<body>
	
	<?php
		for ($i=0; $i < 5; $i++) { 
			echo '<form action="" method="POST">
							<input type="text" name="q" value="1">
							<button type="submit" name="submit" value="'.$i.'">Add to cart</button>
				</form>';
		}

			session_start();
			print_r($_SESSION['cart']);

		if (isset($_POST["submit"])) {
			if (isset($_SESSION['cart']["".$_POST['submit'].""])) {
				$_SESSION['cart']["".$_POST['submit'].""] += $_POST['q'] ;
			}
			else {
				$_SESSION['cart']["".$_POST['submit'].""] = $_POST['q'];
			}
			header('Location: test.php');
		}
	?>
</body>
</html>