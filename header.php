<?php
    session_start();
    include "includes\dbh.inc.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
		<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
        <title>WaterBNB</title>

    </head>
    <body>

        <header>
                <div class="container">
                    <?php
                        if (isset($_SESSION['userId'])) {
                          	/* echo"Welcome ".$_SESSION['userUid'];
                            
							
							echo '
                            <form action="includes/logout.inc.php" method="post">
                            <button type="submit" name="logout-submit">Logout</button>
                            </form>'; */
                            
                        }

                        else {
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
								<button type="submit" name="login-submit">Login</button>
								<br></form>
							</div><br>
							
							';					
                        }
                    ?>
                </div>
        </header>
