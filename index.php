<<<<<<< HEAD
<?php
    require "header.php";
?>

    <main>
        <?php
            if (isset($_SESSION['userId'])) {
                echo '<p>You are logged in!</p>';
                if ($_SESSION['userType'] == 'host') {
                    echo '
                    <p>This is host!</p>
                    ';
                    header("Location: host_homepage.php");

                }
                elseif ($_SESSION['userType'] == 'occupant') {
                    echo '<p>This is occupant!</p>';
                    header("Location: occupant_homepage.php");
                    
                }
            }
            else {

            }
        ?>


    </main>

<?php
    require "footer.php";
?>
=======
<?php
    require "header.php";
?>

    <main>
        <?php
            if (isset($_SESSION['userId'])) {
                echo '<p>You are logged in!</p>';
                if ($_SESSION['userType'] == 'host') {
                    echo '
                    <p>This is host!</p>
                    ';
                    header("Location: host_homepage.php");

                }
                elseif ($_SESSION['userType'] == 'occupant') {
                    echo '<p>This is occupant!</p>';
                    header("Location: occupant_homepage.php");
                    
                }
            }
            else {

            }
        ?>


    </main>

<?php
    require "footer.php";
?>
>>>>>>> c2695829c93f97271b41305c0fd3e6b4cbd9e8e8
