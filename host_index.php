<<<<<<< HEAD
<?php
include "header.php";
?>

<main>
    <?php
    if (isset($_SESSION['userId'])) {
        echo '
            <nav class="navbar navbar-default">
		
                <div class="navbar-header">
                    <a class="navbar-brand" href="host_homepage.php">
                        <img src="img/logo.jpg" height="42" width="42">
                </div>
            
                <ul  class="nav">
                    <li class="nav-item mr-4 "><a href="host_home.php">Host a Home</a></li>
                    <li class="nav-item mr-4 "><a href="host_homepage.php">Home -' . $_SESSION['userUid'] . '</a></li>
                    <li class="nav-item mr-4 "><a href="#">Profile</a></li>
                    <li class="nav-item mr-4 "><form action="includes/logout.inc.php" method="post">
                        <button type="submit" name="logout-submit">Logout</button>
                        </form></li>
                </ul>
            </nav>
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="poof">&times;</span>
                    <h2>Welcome Host ' . $_SESSION['userUid'] . '!</h2>
                </div>
            </div>
            ';
    } else {
        header("Location: index.php");
    }
    ?>
</main>

<script type="text/javascript" src="js/modal.js"></script>

<?php
require "footer.php";
=======
<?php
include "header.php";
?>

<main>
    <?php
    if (isset($_SESSION['userId'])) {
        echo '
            <nav class="navbar navbar-default">
		
                <div class="navbar-header">
                    <a class="navbar-brand" href="host_homepage.php">
                        <img src="img/logo.jpg" height="42" width="42">
                </div>
            
                <ul  class="nav">
                    <li class="nav-item mr-4 "><a href="host_home.php">Host a Home</a></li>
                    <li class="nav-item mr-4 "><a href="host_homepage.php">Home -' . $_SESSION['userUid'] . '</a></li>
                    <li class="nav-item mr-4 "><a href="#">Profile</a></li>
                    <li class="nav-item mr-4 "><form action="includes/logout.inc.php" method="post">
                        <button type="submit" name="logout-submit">Logout</button>
                        </form></li>
                </ul>
            </nav>
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="poof">&times;</span>
                    <h2>Welcome Host ' . $_SESSION['userUid'] . '!</h2>
                </div>
            </div>
            ';
    } else {
        header("Location: index.php");
    }
    ?>
</main>

<script type="text/javascript" src="js/modal.js"></script>

<?php
require "footer.php";
>>>>>>> c2695829c93f97271b41305c0fd3e6b4cbd9e8e8
?>