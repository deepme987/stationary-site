<?php
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
        echo"you cannot book more than 2 slots in a day come back again tommorow";
    }
    else
    {
        
        echo"<form action='' method='post'>
            <input type='radio' name='slot' value='9.00-9.15'>9.00-9.15<br>  
            <input type='radio' name='slot' value='9.20-9.35'>9.20-9.35<br>
            <button type'submit' name='submit' value='proceed'>proceed</button>
        </form>";
        
        if(isset($_POST['submit']))
        {   
            $user='user';
            $pass='sakec';
            $db='stationary';

            $conn= new mysqli('localhost',$user,$pass,$db)or die("unable to connect to the server");
            $sql = "INSERT INTO `tokens`(`CustomerId`,`Time`) values(\"".$_SESSION['id']."\",\"".$_POST['slot']."\")";
            if (mysqli_query($conn, $sql)) {
                echo "slot placed successfully!";
                header("refresh:2; url=http://localhost:8080/stationary-site/User/index.php?page=token");
            }
            else {
                echo "Error: ".mysqli_error($conn);
            }
            mysqli_close($conn);

        }  
    }

?>
