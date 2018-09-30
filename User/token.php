<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tokens</title>
</head>
<body>
	
	<?php

		if (isset($_GET['id'])) {
			
			$user = 'user';
			$pass = 'sakec';
			$db = 'stationary';

			$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

			$sql = "select * from tokens where TokenId='".$_GET['id']."'";

			$data = mysqli_query($conn, $sql) or die("Item not found.");
			$row = mysqli_fetch_assoc($data);

			if ($_SESSION['id']!=$row['CustomerId']) {
				die("Stop trying to steal other's details!");
			}

			echo '<div class="top">
					<h3>Token No: '.$row["TokenId"].'</h3>
					<p>Reserved by: '.$row["CustomerId"].'</p>
					<p>Slot: '.$row["Time"].'</p></div>';

			mysqli_close($conn);
		}
		else
		{
			if(isset($_POST['submit']) && $_POST['slot']!="")
			{   
						
				$user='user';
				$pass='sakec';
				$db='stationary';
		
				$conn= new mysqli('localhost',$user,$pass,$db)or die("unable to connect to the server");
				$sql = "INSERT INTO `tokens`(`CustomerId`,`Time`) values(\"".$_SESSION['id']."\",\"".$_POST['slot']."\")";
				if (mysqli_query($conn, $sql)) {
					echo "Slot placed successfully!";
				}
				else {
					echo "Error: ".mysqli_error($conn);
				}
		
				$sql = "select TokenId from tokens order by TokenId desc limit 1";
				$data = mysqli_query($conn, $sql) or die("Internal Error.");
				$row = mysqli_fetch_assoc($data);
	
				$oid = $row['TokenId'];
		
				header("Location: index.php?page=token&id=".$row['TokenId']);
				mysqli_close($conn);
			}	  
				
			$user='user';
			$pass='sakec';
			$db='stationary';
				
			$conn= new mysqli('localhost',$user,$pass,$db)or die("unable to connect to the server");
			$sql = "SELECT COUNT('CustomerID') FROM tokens WHERE CustomerID =\"".$_SESSION['id']."\" ";
			$result=mysqli_query($conn,$sql);
			$data=mysqli_fetch_row($result);
			$count=$data[0];
			mysqli_close($conn);
			if($count>=2)
			{
				 echo"You cannot book more than 2 slots in a day come back again tommorow";
			}
			else
			{
				echo "<form action='' method='post'>";
	  
				$time = [9,10,11,12,1,2,3,4,5];
				for ($i=0; $i < 8; $i++) { 
					echo "<input type='radio' name='slot' value='".$time[$i].".00-".$time[$i].".15'>".$time[$i].".00-".$time[$i].".15<br>  
							<input type='radio' name='slot' value='".$time[$i].".20-".$time[$i].".35'>".$time[$i].".20-".$time[$i].".35<br>
							<input type='radio' name='slot' value='".$time[$i].".40-".$time[$i].".55'>".$time[$i].".40-".$time[$i].".55<br>";
		
				}
				echo "<button type'submit' name='submit' value='proceed'>proceed</button></form>";
			}
		}
	?>
</body>
</html>