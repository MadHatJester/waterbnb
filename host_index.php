<?php
include "header.php";
include "includes\dbh.inc.php";
?>

<main>
    <?php
    if (isset($_SESSION['userId'])) {
        echo '
            <nav class="navbar navbar-default">
		
                <div class="navbar-header">
                    <a class="navbar-brand" href="host_index.php">
                        <img src="img/logo.jpg" height="42" width="42">
                </div>
            
                <ul  class="nav">
                    <li class="nav-item mr-4 "><a href="host_home.php">Host a Home</a></li>
                    <li class="nav-item mr-4 "><a href="host_index.php">Home -' . $_SESSION['userUid'] . '</a></li>
                    <li class="nav-item mr-4 "><a href="#">Profile</a></li>
                    <li class="nav-item mr-4 "><form action="includes/logout.inc.php" method="post">
                        <button type="submit" name="logout-submit">Logout</button>
                        </form></li>
                </ul>
            </nav>
            ';
    } else { 
        header("Location: index.php");
    }
    ?>


</main>

<?php
require "footer.php";
?>