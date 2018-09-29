<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My Orders</title>
	<style>
		<style>

			.cart {
				margin-top: 30px
			}

			.blank:hover {
				cursor: pointer;
			}

			.table {
				width: 80%
				/*margin: 10px 0 0 0;*/
			}

			.table th {
				background-color: #555;
				color: white;
			}

			.table th, .table td {
				text-align: center;
			}

			.checkout {

			}

	</style>
	</style>
</head>
<body>

	<div class="cart">
    	<table class="table" align="center">
			<tr>
				<th>Oid</th>
				<th>Cost</th>
				<th>Date</th>
				<th>Status</th>
			</tr>
	
    <?php

       	$user = 'user';
        $pass = 'sakec';
        $db = 'stationary';

        $conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

		$sql = "select * from orders";

		$data = mysqli_query($conn, $sql) or die("Item not found.");

		while ($row = mysqli_fetch_assoc($data))
		{
            echo "<tr><td><a href='index.php?page=orders&id=".$row['Oid']."'>".$row['Oid']."</a></td><td>".$row['Cost']."</td><td>".$row['date']."</td><td>".$row['Status']."</td></tr>";
        }
        echo "</table></div>";

        mysqli_close($conn);
	?>

</body>
</html>