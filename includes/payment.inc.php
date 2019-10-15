  
<?php
if (isset($_POST['payment-submit'])) {
    require 'dbh.inc.php';
    $strtDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $noGuest = $_POST['noGuest'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $noCard = $_POST['noCard'];
    $dateCard = $_POST['dateCard'];
    $codeCard = $_POST['codeCard'];
    $rid = $_POST['rid'];
    $uid = $_POST['uid'];

    echo $strtDate . " " . $endDate . " " . $noGuest;
    echo $firstName . " " . $lastName;
    echo $noCard . " " . $dateCard . " " . $codeCard;

    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSUVWXYZ';
    $transacNo = substr(str_shuffle($permitted_chars), 0, 7);
    if (empty($strtDate) || empty($endDate) || empty($noGuest) || empty($firstName) || empty($lastName) || empty($noCard) || empty($dateCard) || empty($codeCard)) {
        header("Location: ../payment.php?error=emptyfields&strtdate=" . $strtDate . "&endate=" . $endDate . "&guests=" . $noGuest . "&firstname=" . $firstName . "&lastname=" . $lastName . "&cardno=" . $noCard . "&carddate=" . $dateCard . "&cardcode=" . $codeCard);
        exit();
    } else {
        $sql = "SELECT ReservationID FROM reservation WHERE ReservationID=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../payment.php?error=sqlerror1");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $reser);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../payment.php?error=transacfinished");
                exit();
            } else {
                $sql = "INSERT INTO Reservation (StartDate, EndDate, GuestNumber, UserID, ResidenceID) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../payment.php?error=sqlerror2");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "ssiii", $strtDate, $endDate, $noGuest, $uid, $rid);
                    mysqli_stmt_execute($stmt);
                }
            }
        }
    }

    $sql = "INSERT INTO Transactions (FirstName, LastName, CardNumber, CardDate, ReservationID) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../payment.php?error=sqlerror2");
        exit();
    }
    else {
        mysqli_stmt_bind_param($stmt, "issiisi", $transacNo, $strtDate, $endDate, $noGuest, $noCard, $dateCard, $codeCard, );
        mysqli_stmt_execute($stmt);
        header("Location: ../success.php?hosting=success&transacno=".$transacNo);
        exit();
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../host_home.php");
    exit();
}
