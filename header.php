<<<<<<< HEAD
<?php
session_start();
include "includes\dbh.inc.php";
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<title>WaterBNB</title>

</head>

<body>

	<header>
		<div class="container">
			<?php
			if (isset($_SESSION['userId'])) { 
				
			} else {
				echo '
							
							<nav class="navbar navbar-default">
	
								<div class="navbar-header">
									<a class="navbar-brand" href="#">
									<img src="img/logo.jpg" height="50" width="50">
								</div>
								
								<ul class="nav justify-content-end mr-3 ">
									<li class="nav-item mr-4 "><a href="#">Home</a></li>
									<li class="nav-item mr-4 "><a href="#">About Us</a></li>
									<li class="nav-item mr-4 "><a href="signup.php">Sign-up</a></li>
								</ul>
							</nav>
							
							
							<div class="container-fluid p-3 m-right bg-white">
								<form action="includes/login.inc.php" method="post">
								<div class = "form-group">
								<label>Username/E-mail:</label><br>
								<input type="text" name="mailuid" placeholder="Username/E-mail...">
								</div>
								<div class = "form-group">
								<label>Password:</label><br>
								<input type="password" name="pwd" placeholder="Password...">
								</div>
								<div class="form-check">
								<button id="logoutbtn" type="submit" name="login-submit">Login</button>
								<br></form>
							</div><br>
							
							';
			}
			?>
		</div>
	</header>

	<script>
		var btn = document.getElementById("logoutbtn");
		btn.onclick = function() {
			localStorage.clear();
		}
=======
<?php
session_start();
include "includes\dbh.inc.php";
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<title>WaterBNB</title>

</head>

<body>

	<header>
		<div class="container">
			<?php
			if (isset($_SESSION['userId'])) { 
				
			} else {
				echo '
							
							<nav class="navbar navbar-default">
	
								<div class="navbar-header">
									<a class="navbar-brand" href="#">
									<img src="img/logo.jpg" height="50" width="50">
								</div>
								
								<ul class="nav justify-content-end mr-3 ">
									<li class="nav-item mr-4 "><a href="#">Home</a></li>
									<li class="nav-item mr-4 "><a href="#">About Us</a></li>
									<li class="nav-item mr-4 "><a href="signup.php">Sign-up</a></li>
								</ul>
							</nav>
							
							
							<div class="container-fluid p-3 m-right bg-white">
								<form action="includes/login.inc.php" method="post">
								<div class = "form-group">
								<label>Username/E-mail:</label><br>
								<input type="text" name="mailuid" placeholder="Username/E-mail...">
								</div>
								<div class = "form-group">
								<label>Password:</label><br>
								<input type="password" name="pwd" placeholder="Password...">
								</div>
								<div class="form-check">
								<button id="logoutbtn" type="submit" name="login-submit">Login</button>
								<br></form>
							</div><br>
							
							';
			}
			?>
		</div>
	</header>

	<script>
		var btn = document.getElementById("logoutbtn");
		btn.onclick = function() {
			localStorage.clear();
		}
>>>>>>> c2695829c93f97271b41305c0fd3e6b4cbd9e8e8
	</script>