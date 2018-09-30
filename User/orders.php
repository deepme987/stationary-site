<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My Orders</title>
	<style>
		<style>
			.topdiv {
				margin-top: 30px;
			}
			.cart {
				margin: 30px
			}
			.blank:hover {
				cursor: pointer;
			}
			.table {
				width: 100%
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
</head>
<body>
	
    <?php
    	if (isset($_GET['id'])) {
    		
	       	$user = 'user';
	        $pass = 'sakec';
	        $db = 'stationary';
	        $conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);
			$sql = "select * from ordered where Oid='".$_GET['id']."'";
			$osql = "select * from orders where Oid='".$_GET['id']."'";
			$data = mysqli_query($conn, $sql) or die("Item not found.");
			$odata = mysqli_query($conn, $osql) or die("Item not found.");
			$order = mysqli_fetch_assoc($odata);
			if ($_SESSION['id']!=$order['Uid']) {
				die("Stop trying to steal other's details!");
			}
			echo '<div class="cart">
    			  	<h3>Order No: '.$_GET["id"].'</h3>
    			  	<p>Total: '.$order["Cost"].'</p>
    			  	<p>Status: '.$order["Status"].'</p>
    			  	<h4>Items:</h4>
    			  </div>
    			  <div class="cart">
    			    <table class="table" align="center">
     				   	<tr>
							<th>Pid</th>
							<th>Quantity</th>
						</tr>';
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