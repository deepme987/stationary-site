<html>
<head>
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
            margin-top:10px;
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
                echo "
                    <div class='card' style='width: 22rem;'>
                        <img class='card-img-top' src='addons\\".$row["Link"]."' alt='".$row["Pname"]."'>
                        <div class='card-body'>
                          <p class='card-text'>".$row["Pname"]."<br>Cost:₹".$row["Cost"]."<br>Quantity<input type='number'></p>
                         </div>
                        <button type='button' name='".$row['Pid']."cart' class='btn btn-primary'>Primary</button>
                     </div>
                    ";
            }
        ?>
    </div>

</body>
</html>