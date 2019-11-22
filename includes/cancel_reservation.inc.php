<?php
if (isset($_POST['reserve-cancel'])) {

    require 'dbh.inc.php';
    $rid = $_POST['rid'];
    $uid = $_POST['uid'];
    $transacNo = $_POST['transacNo'];

    $sql = "SELECT ReservationID FROM reservation WHERE ReservationID=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../reserve_home.php?rid=" . $rid . "&error=sqlerror1");
        exit();
    } else {
        /* $sql = "SELECT
                *
                FROM
                transactions
                INNER JOIN reservation ON transactions.ReservationID = reservation.ReservationID
                WHERE
                reservation.ReservationID = $rid AND ";
        
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $example = $row['TransactionNumber'];
        echo $example; */

        $sql = "DELETE reservation, transactions FROM transactions
                INNER JOIN reservation ON transactions.ReservationID = reservation.ReservationID 
                WHERE transactions.TransactionNumber = '$transacNo'";
        mysqli_query($conn, $sql);

        header("Location: ../reserve_home.php?cancel=success&rid=" . $rid);
        exit();
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../reserve_home.php");
    exit();
}
