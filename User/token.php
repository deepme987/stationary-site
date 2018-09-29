<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tokens</title>
</head>
<body>
    

    <?php
        if(isset($_POST['submit']))
        {   
            header("refresh:2; url=http://localhost/Git/stationary-site/User/index.php?page=token");
                
            $user='user';
            $pass='sakec';
            $db='stationary';

            $conn= new mysqli('localhost',$user,$pass,$db)or die("unable to connect to the server");
            $sql = "INSERT INTO `tokens`(`CustomerId`,`Time`) values(\"".$_SESSION['id']."\",\"".$_POST['slot']."\")";
            if (mysqli_query($conn, $sql)) {
                echo "slot placed successfully!";
            }
            else {
                echo "Error: ".mysqli_error($conn);
            }
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
        // if($count>=2)
        // {
        //     echo"You cannot book more than 2 slots in a day come back again tommorow";
        // }
        // else
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
    ?>
</body>
</html>