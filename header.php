<?php
session_start();
include "includes\dbh.inc.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Waterbnb</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

    <header>
        <div class="container">
            <?php
            if (isset($_SESSION['userId'])) {
                echo "Welcome " . $_SESSION['userUid'];
            } else {
                echo '
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">Waterbnb</a>
                        </div>
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Home</a></li>
                            <li><a href="#">Page 1</a></li>
                            <li><a href="#">Page 2</a></li>
                            <li><a href="#">Page 3</a></li>
                        </ul>
                    </div>
                </nav>';
            }
            ?>
        </div>
    </header>