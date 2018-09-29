
<form action="" method="post">
    <input type="radio" name="slot" value="9.00-9.15">9.00-9.15<br> 
    <input type="radio" name="slot" value="9.20-9.35">9.20-9.35<br>
    <button type="submit" name="submit" value="proceed">proceed</button>
</form>
<?php
    if(isset($_POST['submit']))
    {   
        $user='user';
        $pass='sakec';
        $db='stationary';
        
        $conn= new mysqli('localhost',user)
    }
?>