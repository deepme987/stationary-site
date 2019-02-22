<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tokens</title>
</head>
<body>
	<?php
           if (isset($_POST['submit'])) {
			echo "hello";

			header("Location: index.php?page=xerox");
			$user = 'user';
	        $pass = 'sakec';
	        $db = 'stationary';

	        $conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

			$sql = "DELETE FROM `tokens`";
			$data = mysqli_query($conn, $sql) or die("Nothing to delete.");
		}
		else {
			echo "hi";
		}
            $user = 'user';
	        $pass = 'sakec';
	        $db = 'stationary';
            
	        $conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);
            
            $sql="select * from tokens order by TokenId";
            $data=mysqli_query($conn,$sql) or die("error");
            echo"<table class='table'>
                        <thead>
                          <tr>
                            <th>TokenId</th>
                            <th>CustomerId</th>
                            <th>Time</th>
                          </tr>
                        </thead>
                        <tbody>";
            while($row=mysqli_fetch_row($data))
            {
                echo"     <tr>
                            <td>".$row[0]."</td>
                            <td>".$row[1]."</td>
                            <td>".$row[2]."</td>
                          </tr>";
            }
            echo"       </tbody>
                      </table>";
            mysqli_close($conn);
    ?>
	<form action="" method="POST">
		<button type="submit" name="submit">Reset token history</button>
	</form>
</body>
</html>