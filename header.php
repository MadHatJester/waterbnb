<?php
    session_start();
    include "includes\dbh.inc.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title></title>

    </head>
    <body>

        <header>
                <div class="container">
                    <?php
                        if (isset($_SESSION['userId'])) {
                          echo"Welcome ".$_SESSION['userUid'];
                            //echo '
                            //<form action="includes/logout.inc.php" method="post">
                            //<button type="submit" name="logout-submit">Logout</button>
                            //</form>';
                            //
                        }

                        else {
                            echo '<form action="includes/login.inc.php" method="post">
                            <input type="text" name="mailuid" placeholder="Username/E-mail...">
                            <input type="password" name="pwd" placeholder="Password...">
                            <button type="submit" name="login-submit">Login</button>
                            </form>
                            <a href="signup.php">Signup</a>';
                        }
                    ?>
                </div>
        </header>
