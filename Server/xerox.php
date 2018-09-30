<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tokens</title>
</head>
<body>
	<?php
		if (isset($_POST['submit'])) {

			header("Location: index.php?page=xerox");
			$user = 'user';
	        $pass = 'sakec';
	        $db = 'stationary';

	        $conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

			$sql = "DELETE FROM `tokens`";
			$data = mysqli_query($conn, $sql) or die("Nothing to delete.");
		}
	?>
	<form action="" method="POST">
		<button type="submit" name="submit">Reset token history</button>
	</form>
</body>
</html>