<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cart</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<div class="flex">
		<div class='table'>
        	<table>
        		<tr>
					<th>Product</th>
					<th>Quantity</th>
					<th>Cost</th>
					<th>Remove</th>
				</tr>
        <?php
        	$user = 'user';
            $pass = 'sakec';
            $db = 'stationary';
            $conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

            $total = 0;
           	foreach ($_SESSION['cart'] as $key => $value) 
           	{
           		$sql = "select * from products where Pid=\"".$key."\"";
           		
           		$data = mysqli_query($conn, $sql) or die("Item not found.");
            	$row = mysqli_fetch_assoc($data);

                echo "<tr><td>".$row['Pname']."</td><td>".$value."</td><td>".$row['Cost']*$value."</td><td><form action='' method='POST'><button><i class='fa fa-times'></i></button></form></td><tr>";
                $total += $row['Cost']*$value;
            }
            echo "</table></div>";

            echo "Total: ".$total;
            mysqli_close($conn);
        ?>
    </div>

</body>
</html>