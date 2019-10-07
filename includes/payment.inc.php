<?php
if(isset($_POST['payment-submit'])) {

    require 'dbh.inc.php';
    $strtDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $noGuest = $_POST['noGuest'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $noCard = $_POST['noCard'];
    $dateCard = $_POST['dateCard'];
    $codeCard = $_POST['codeCard'];
    
    echo $strtDate . " " . $endDate;

}
else {
    header("Location: ../host_home.php");
    exit();
}
