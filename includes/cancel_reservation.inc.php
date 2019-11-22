<?php
if (isset($_POST['reserve-cancel'])) {

    require 'dbh.inc.php';
    $rid = $_POST['rid'];
    $uid = $_POST['uid'];
    $transacNo = $_POST['transacNo'];

    $sql = "SELECT TransactionNumber FROM transactions
            INNER JOIN reservation ON transactions.ReservationID = reservation.ReservationID
            WHERE transactions.TransactionNumber =?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../reserve_home.php?rid=" . $rid . "&error=sqlerror1");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $transacNo);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck == 0) {
            header("Location: ../reserve_home.php?rid=" . $rid . "&error=noreserve");
            exit();
        } else {
            $sql = "DELETE reservation, transactions FROM transactions
                INNER JOIN reservation ON transactions.ReservationID = reservation.ReservationID 
                WHERE transactions.TransactionNumber = '$transacNo'";
            mysqli_query($conn, $sql);

            header("Location: ../reserve_home.php?cancel=success&rid=" . $rid);
            exit();
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../reserve_home.php");
    exit();
}
