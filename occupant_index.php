<?php
    include "header.php";
    include "includes\dbh.inc.php";
?>

<main>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul>
            <li>
              <form action="search.php" method="post" class="form-inline">
                <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search a home">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search-submit">Search</button></form>
            </li>
            <li><a href="occupant_index.php">Home</a></li>
            <li><a href="#">Profile</a></li>
            <li><form action="includes/logout.inc.php" method="post">
                <button type="submit" name="logout-submit">Logout</button>
                </form></li>
        </ul>
    </nav>


</main>

<?php
    require "footer.php";
?>
