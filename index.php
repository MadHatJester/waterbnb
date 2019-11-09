<?php
require "header.php";
?>

<main>
    <?php
    
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "emptyfields") {
            echo '<div class="container"><div class="container-fluid text-danger p-auto bg-white"><p>Fill in all fields!</p></div></div>';
        } elseif ($_GET['error'] == "wrongpwd") {
            echo '<div class="container"><div class="container-fluid text-danger p-auto bg-white"><p>Invalid password!</p></div></div>';
        } elseif ($_GET['error'] == "nouser") {
            echo '<div class="container"><div class="container-fluid text-danger p-auto bg-white"><p>The user does not exist!</p></div></div>';
        }
    } else {
        if (isset($_SESSION['userId'])) {
            if ($_SESSION['userType'] == 'host') {
                header("Location: host_homepage.php");
            } elseif ($_SESSION['userType'] == 'occupant') {
                header("Location: occupant_homepage.php");
            }
        }
    }
    ?>


</main>

<?php
require "footer.php";
?>