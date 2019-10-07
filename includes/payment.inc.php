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
    
    echo $strtDate . " " . $endDate . " " . $noGuest;
    echo $firstName . " " . $lastName;
    echo $noCard . " " . $dateCard . " " . $codeCard;

    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
    $transacNo = substr(str_shuffle($permitted_chars), 0, 5);

    if (empty($strtDate) || empty($endDate) || empty($noGuest) || empty($firstName) || empty($lastName) || empty($noCard) || empty($dateCard) || empty($codeCard)) {
        header("Location: ../payment.php?error=emptyfields&strtdate=".$strtDate."&endate=".$endDate."&guests=".$noGuest."&firstname=".$firstName."&lastname=".$lastName."&cardno=".$noCard."&carddate=".$dateCard."&cardcode=".$codeCard);
        exit();
    }
    else {
        $sql = "SELECT transacId FROM transac WHERE transacId=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../payment.php?error=sqlerror1");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $transacNo);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../payment.php?error=transacfinished");
                exit();
            }
            else {
                $sql = "INSERT INTO transac (transacNo, startDate, endDate, guestNo, cardNo, cardDate, codeCard) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../payment.php?error=sqlerror2");
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($stmt, "sssiisi", $transacNo, $strtDate, $endDate, $noGuest, $noCard, $dateCard, $codeCard);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../success.php?hosting=success&transacno=".$transacNo);
                    exit();
                }
            }

        }

    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);


}
else {
    header("Location: ../host_home.php");
    exit();
}
