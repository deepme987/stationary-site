<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My Orders</title>
</head>
<body>
<!-- 	SELECT orders.Oid, date, time, cost, ordered.Pid, ordered.Quantity
FROM orders NATURAL JOIN ordered
	SELECT * FROM orders -->
	
    <?php

    	if (isset($_GET['id'])) {
    		echo '<div class="cart">
    			    <table class="table" align="center">
     				   	<tr>
							<th>Pid</th>
							<th>Quantity</th>
						</tr>';
	       	$user = 'user';
	        $pass = 'sakec';
	        $db = 'stationary';

	        $conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

			$sql = "select * from ordered where Oid='".$_GET['id']."'";

			$data = mysqli_query($conn, $sql) or die("Item not found.");

			while ($row = mysqli_fetch_assoc($data))
			{
		        $psql = "select * from products where Pid=\"".$row['Pid']."\"";
				$temp = mysqli_query($conn, $psql) or die("Product not found.");

				$product = mysqli_fetch_assoc($temp);

	            echo "<tr><td>".$product['Pname']."</td><td>".$row['Quantity']."</td></tr></div>";
	        }
	        echo "</table></div>";

	        mysqli_close($conn);
    	}

    	else
    	{
    		echo '<div class="cart">
    			    <table class="table" align="center">
     				   	<tr>
							<th>Oid</th>
							<th>Cost</th>
							<th>Date</th>
							<th>Status</th>
						</tr>';
	       	$user = 'user';
	        $pass = 'sakec';
	        $db = 'stationary';

	        $conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

			$sql = "select * from orders where Uid='".$_SESSION['id']."'";

			$data = mysqli_query($conn, $sql) or die("Item not found.");

			while ($row = mysqli_fetch_assoc($data))
			{
	            echo "<tr><td><a href='index.php?page=orders&id=".$row['Oid']."'>".$row['Oid']."</a></td><td>".$row['Cost']."</td><td>".$row['date']."</td><td>".$row['Status']."</td></tr></div>";
	        }
	        echo "</table></div>";

	        mysqli_close($conn);
	    }
    ?>
</body>
</html>