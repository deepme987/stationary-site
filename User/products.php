<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <style>
        /*@media(max-width:400px)
        {
            .card
            {
                margin-top:10px;
            }
        }*/
        .flex
        {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        img
        {
            width:100%;
            height:300px;
        }
        .card
        {
            margin:10px;
            flex:50%;
            max-width: 50%;
        }
        .card:hover
        {
            box-shadow:1px 1px 5px black;
        }
        p
        {
            text-align: center;
        }
        input[type='number']
        {
            padding:0px;
            width: 50px;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    
    <?php
    	if (isset($_POST["submit"])) {
			header('Location: index.php?page=products');
            if ($_POST['quantity'] > 0) {
                if (isset($_SESSION['cart']["".$_POST['submit'].""])) {
                    $_SESSION['cart']["".$_POST['submit'].""] += $_POST['quantity'] ;
                }
                else {
                    $_SESSION['cart']["".$_POST['submit'].""] = $_POST['quantity'];
                }
            }

            else {
                echo ("Invalid quantity");
            }
		}
    ?>

    <div class="flex">
        <?php
            $user = 'user';
            $pass = 'sakec';
            $db = 'stationary';

            $conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);
            
            $get_all = "select * from products";
            $data = mysqli_query($conn, $get_all) or die("No records found.");
            while($row = mysqli_fetch_assoc($data))
            {
                echo "<div class='card' style='width: 22rem;'>
                        <img class='card-img-top' src='addons/".$row["Link"]."' alt='".$row["Pname"]."'>
                        <div class='card-body'>
                            <form action='' method='POST'>
                            <p class='card-text'>".$row["Pname"]."<br>Cost:₹".$row["Cost"]."<br>Quantity<input type='number' name='quantity' value='1'></p>
                         </div> 
                        <button type='submit' name='submit' value='".$row['Pid']."' class='btn btn-primary'>Add to cart</button></form>
                     </div>";
            }

            mysqli_close($conn);
        ?>
    </div>

</body>
</html>