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
                    header("Location: host_index.php");

                }
                elseif ($_SESSION['userType'] == 'occupant') {
                    echo '<p>This is occupant!</p>';
                    header("Location: occupant_index.php");
                    echo'
                    <h1>Listed Spaces</h1>
                    <div class="container">';

                        $sql = "SELECT * FROM homes";
                        $result = mysqli_query($conn, $sql);
                        $queryResults = mysqli_num_rows($result);

                        if ($queryResults>0) {
                          while ($row = mysqli_fetch_assoc($result)) {
                            echo'<div>
                              <h3>'.$row['titleHomes'].'</h3>
                              <p>Location: '.$row['addressHomes'].'</p>
                              <p>Type: '.$row['typeHomes']."</p>
                              <p>No. of Guest: ".$row['guestHomes']."</p>
                            </div>";
                          }
                        }
                    echo"</div>";

                }
            }
            else {

                echo '<p>You are logged out!</p>';
            }
        ?>


    </main>

<?php
    require "footer.php";
?>
