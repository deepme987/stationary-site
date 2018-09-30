<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cart</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>

		.cart {
			margin-top: 30px
		}

		.blank {
			border: none;
			background: none;
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


		.table tr:nth-child(odd) {
			background-color: #f2f2f2;
		}

		.table tr:last-child {
			background-color: #555;
			color: white;
		}

		.table tr:hover {
			background-color: #AAA;
			color: lime;
		}

		.table tr:last-child:hover {
			background-color: #555;
			color: white;
		}
        .checkout
        {
            text-align: center;
        }
        .checkout button
        {
            
        }

	</style>
</head>
<body>

	<?php
		if (isset($_POST['submit'])) {
			header("Location: index.php?page=cart");
			unset($_SESSION['cart']["".$_POST['submit'].""]);
		}
    
    	if (isset($_POST['checkout'])&&(sizeof($_SESSION['cart'])!=0)) {	

			$user = 'user';
            $pass = 'sakec';
            $db = 'stationary';

            $conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

            $sql = "INSERT INTO `orders`(`Uid`, `date`, `time`, `Cost`) VALUES (\"".$_SESSION['id']."\",now(),now(),".$total.")";

            $data = mysqli_query($conn, $sql) or die("Internal Error.");

            $sql = "select Oid from orders order by Oid desc limit 1";
            $data = mysqli_query($conn, $sql) or die("Internal Error.");
            $row = mysqli_fetch_assoc($data);

            $oid = $row['Oid'];
    		header("Location: index.php?page=orders&id=".$oid."");

            foreach ($_SESSION['cart'] as $key => $value) 
            {
                $sql = "INSERT INTO `ordered`(`Oid`, `Pid`, `Quantity`) VALUES ($oid,$key, $value)";

            	$data = mysqli_query($conn, $sql) or die("Internal Error.");
            }

            $_SESSION['cart'] = array();
        }
	?>

	<div class="flex">
		<div class="cart">
            <div>
                <table class="table" align="center">
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

                        echo "<tr><td>".$row['Pname']."</td><td>".$value."</td><td>".$row['Cost']*$value."</td><td><form action='' method='POST'><button class='blank' value='".$key."' name='submit'><i class='fa fa-times'></i></button></form></td></tr>";
                        $total += $row['Cost']*$value;
                    }
                    echo "<tr class='last'><td>Total</td><td></td><td>".$total."</td><td></td> </table></div>";

                    echo "<div class='checkout'>
                            <form action='' method='POST'>
                                <button class='checkout-button' name='checkout'>Checkout</button>
                            </form>
                        </div>";

                    mysqli_close($conn);
                ?>
        </div>
    </div>

</body>
</html>