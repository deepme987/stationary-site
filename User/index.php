<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Stationary</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
	<?php
		include 'session.php';
	?>
	<div id='nav'>
		<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #333;">
			<a class="navbar-brand" href="index.php?page=products">Aakash Stationary</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					<li class="nav-item"><a class="nav-link<?php if($_GET["page"]==""){echo 'active';}?>" href="index.php">Home <span class="sr-only">(current)</span></a></li>
					<li class="nav-item"><a class="nav-link <?php if($_GET["page"]=="token"){echo 'active';}?>" href="index.php?page=token">Generate Xerox Token</a></li>
					<li class="nav-item"><a class="nav-link <?php if($_GET["page"]=="products"){echo 'active';}?>" href="index.php?page=products">Products</a></li>
					<li class="nav-item"><a class="nav-link <?php if($_GET["page"]=="orders"){echo 'active';}?>" href="index.php?page=orders">My Orders</a></li>
					<li class="nav-item"><a class="nav-link <?php if($_GET["page"]=="profile"){echo 'active';}?>" href="index.php?page=profile">Profile</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li class="nav-item"><a class="nav-link <?php if($_GET["page"]=="cart"){echo 'active';}?>" href="index.php?page=cart">Cart</a></li>
					<li><a class="nav-link" href="../">Logout</a></li>
				</ul>
			</div>
		</nav>
	</div>
    

	 <div class="maincontent">
            <?php
                if (isset($_GET['page'])&&$_GET['page']!=""){
                	$p = $_GET['page'].".php";
                    include $p;
                }
                else {
                    include 'products.php';
                }
            ?>
        </div>
</body>
</html>