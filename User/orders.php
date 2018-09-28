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

		$sql = "select * from orders where Uid='".$_SESSION['id']."'";

		$data = mysqli_query($conn, $sql) or die("Item not found.");

		while ($row = mysqli_fetch_assoc($data))
		{
            echo "<tr><td>".$row['Oid']."</td><td>".$row['Cost']."</td><td>".$row['date']."</td><td>".$row['Status']."</td></tr>";
        }
        echo "</table></div>";

        mysqli_close($conn);
    ?>
    </div>
</body>
</html>