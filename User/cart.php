<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cart</title>
</head>
<body>
	<?php
		print_r($_SESSION['cart']);

		echo '<form action="" method="POST">
							<button type="submit" name="submit" value="1">Delete</button>
				</form>';

		if (isset($_POST["submit"])) {
			unset($_SESSION['cart']["3"]);
			header('Location: index.php?page=cart');
		}

	?>
</body>
</html>