<?php
    require "header.php";
?>

<main>
    <nav>
        <h2>Welcome Host!</h2>  
        <ul>
            <li><a href="host_home.php">Host a Home</a></li>
            <li><a href="host_index.php">Home</a></li>
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