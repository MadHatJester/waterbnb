  
<?php
if (isset($_POST['payment-submit'])) {
    require 'dbh.inc.php';
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $noCard = $_POST['noCard'];
    $mmCard = $_POST['monthCard'];
    $yyCard = $_POST['yearCard'];
    $dateCard = $mmCard . "-" . $yyCard;
    $codeCard = $_POST['codeCard'];

    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSUVWXYZ';
    $transacNo = substr(str_shuffle($permitted_chars), 0, 7);

    $sql = "SELECT ReservationID FROM Reservation WHERE ReservationID=(SELECT MAX(ReservationID) FROM reservation)";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $rid = $row['ReservationID'];

    if (empty($firstName) || empty($lastName) || empty($noCard) || empty($dateCard) || empty($codeCard)) {
        header("Location: ../payment.php?error=emptyfields&firstname=" . $firstName . "&lastname=" . $lastName . "&cardno=" . $noCard . "&carddate=" . $dateCard . "&cardcode=" . $codeCard);
        exit();
    } else {
        $sql = "SELECT TransactionID FROM transactions WHERE TransactionID=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../payment.php?error=sqlerror1");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $transacNo);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../payment.php?error=transacfailed");
                exit();
            } else {
                $sql = "INSERT INTO Transactions (TransactionNumber, FirstName, LastName, CardNumber, CardDate, CardCode, ReservationID) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../payment.php?error=sqlerror2");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "sssisii", $transacNo, $firstName, $lastName, $noCard, $dateCard, $codeCard, $rid);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../success.php?hosting=success&transacno=" . $transacNo . "&date=" . $dateCard . "&rid=" .$rid);
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../payment_home.php");
    exit();
}
