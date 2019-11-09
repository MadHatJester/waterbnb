<?php
include "header.php";
?>

<main>
    <?php
    if (isset($_SESSION['userId'])) {
        echo '
        <nav class="navbar navbar-default">

            <div class="navbar-header">
                <a class="navbar-brand" href="occupant_homepage.php">
                    <img src="img/logo.jpg" height="50" width="50">
            </div>

            <ul class="nav justify-content-end mr-3 ">
                <li class="nav-item mr-4 "><a href="occupant_homepage.php">Home</a></li>
                <li class="nav-item mr-4 "><a href="occupant_profile.php">Profile - '.$_SESSION['userUid'].'</a></li>
                <li class="nav-item mr-4 ">
                    <form action="includes/logout.inc.php" method="post"><button type="submit" name="logout-submit">Logout</button></form>
                </li>
            </ul>
        </nav>

        <ul>
            <form action="search.php" method="post" class="form-inline">
                <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search a Home">
                <button type="submit" name="search-submit">Search</button></form>
        </ul>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="poof">&times;</span>
                <h2>Welcome Occupant ' . $_SESSION['userUid'] . '!</h2>
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
?>