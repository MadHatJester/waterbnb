<?php
if (isset($_POST['reserve-submit'])) {

    require 'dbh.inc.php';
    $strtDate = $_POST['toDate'];
    $endDate = $_POST['fromDate'];
    $noGuest = $_POST['noGuest'];
    $rid = $_POST['rid'];
    $uid = $_POST['uid'];

    if (empty($strtDate) || empty($endDate) || empty($noGuest)) {
        header("Location: ../reserve_home.php?rid=" . $rid . "&error=emptyfields&startdate=" . $strtDate . "&enddate=" . $endDate . "&noGuests=" . $noGuest);
        exit();
    } else {
        $sql = "SELECT ReservationID FROM reservation WHERE ReservationID=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../reserve_home.php?rid=" . $rid . "&error=sqlerror1");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $strtDate);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../reserve_home.php?error=datetaken");
                exit();
            } else {
                $sql = "INSERT INTO Reservation (StartDate, EndDate, GuestNumber, UserID, ResidenceID) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../reserve_home.php?error=sqlerror2");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "ssiii", $strtDate, $endDate, $noGuest, $uid, $rid);
                    mysqli_stmt_execute($stmt);

                    $sql = "SELECT RentalFee FROM residence WHERE ResidenceID = $rid";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $rentFee = $row['RentalFee'];

                    header("Location: ../payment.php?hosting=success&fee=" . $rentFee);
                    exit();
                }
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../reserve_home.php");
    exit();
}
