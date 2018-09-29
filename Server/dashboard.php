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

	<?php
		if (isset($_POST['ready'])) {

			header("Location: index.php");

			$user = 'user';
	        $pass = 'sakec';
	        $db = 'stationary';

	        $conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

			$sql = "update orders set Status='Ready' where Oid='".$_POST['ready']."'";

			$data = mysqli_query($conn, $sql) or die("Item not found.");

			$sql = "SELECT Email FROM profile natural join orders where orders.Oid='".$_POST['ready']."'";
			$data = mysqli_query($conn, $sql) or die("User not found!");
			$row = mysqli_fetch_assoc($data);

			$msg = "Your order is ready!";
			$msg = wordwrap($msg,70);

			mail("".$row['Email']."","My subject",$msg);

		}

		if (isset($_POST['collected'])) {

			header("Location: index.php");

			$user = 'user';
	        $pass = 'sakec';
	        $db = 'stationary';

	        $conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

			$sql = "update orders set Status='Collected' where Oid='".$_POST['collected']."'";

			$data = mysqli_query($conn, $sql) or die("Item not found.");
		}
	?>

	<div class="orders">
		<h2 style="margin: 30px 100px">Orders</h2>
    	<table class="table" align="center">
			<tr>
				<th>Oid</th>
				<th>Items</th>
				<th>Cost</th>
				<th>Status</th>
				<th>Actions</th>
			</tr>
	
    <?php

       	$user = 'user';
        $pass = 'sakec';
        $db = 'stationary';

        $conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

		$sql = "select * from orders where Status='Processing' or Status='Ready'";

		$data = mysqli_query($conn, $sql) or die("Item not found.");

		while ($row = mysqli_fetch_assoc($data))
		{
            echo "<tr><td>".$row['Oid']."</td><td>";

            $isql = "select * from ordered where Oid='".$row['Oid']."'";
			$temp = mysqli_query($conn, $isql) or die("Product not found.");

			echo "<table class='table'>";
            while ($items = mysqli_fetch_assoc($temp)) {
        		$psql = "select * from products where Pid=\"".$items['Pid']."\"";
				$ptemp = mysqli_query($conn, $psql) or die("Product not found.");
				$product = mysqli_fetch_assoc($ptemp);

            	echo "<tr><td style='border:none'>".$product['Pname']."</td><td style='border:none'>".$items['Quantity']."</td></tr>";
            }
            echo "</table>";

            echo "</td><td>".$row['Cost']."</td><td>".$row['Status']."</td><td>";

            if ($row['Status']=='Processing') {
            	echo "<form action='' method='POST'><button name='ready' value='".$row['Oid']."'>Ready</button></form>";
            }

            else {
            	echo "<form action='' method='POST'><button name='collected' value='".$row['Oid']."'>Collected</button></form>";
            }
            echo "</td></tr>";
        }
        echo "</table></div>";

        mysqli_close($conn);
	?>

</body>
</html>