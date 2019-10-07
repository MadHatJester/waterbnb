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

    

    if (empty($strtDate) || empty($endDate) || empty($noGuest) || empty($firstName) || empty($lastName) || empty($noCard) || empty($dateCard) || empty($codeCard)) {
        header("Location: ../payment.php?error=emptyfields&strtdate=".$strtDate."&endate=".$endDate."&guests=".$noGuest."&firstname=".$firstName."&lastname=".$lastName."&cardno=".$noCard."&carddate=".$dateCard."&cardcode=".$codeCard);
        exit();
    }
    else {
        $sql = "SELECT idHomes FROM homes WHERE idHomes=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../host_home.php?error=sqlerror1");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $titleHome);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../host_home.php?error=titletaken&mail=".$titleHome);
                exit();
            }
            else {
                $sql = "INSERT INTO homes (titleHomes, typeHomes, guestHomes, addressHomes, feeHomes) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../host_home.php?error=sqlerror2");
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($stmt, "ssisi", $titleHome, $typeHome, $guestHome, $addressHome, $feeHome);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../host_index.php?hosting=success");
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
