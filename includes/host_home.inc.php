<?php
if(isset($_POST['host-submit'])) {

    require 'dbh.inc.php';
    $titleHome = $_POST['homeTitle'];
    $typeHome = $_POST['homeType'];
    $guestHome = $_POST['noGuests'];
    $noHomes = $_POST['streetNo'];
    $streeHomes = $_POST['streeName'];
    $bgyHomes = $_POST['barangay'];
    $zipHomes = $_POST['zip'];
    $cityHomes = $_POST['city'];
    $feeHome = $_POST['rentalFee'];

    if (empty($titleHome) || empty($typeHome) || empty($guestHome) || empty($feeHome) || empty($noHomes) || empty($streeHomes) || empty($bgyHomes) || empty($zipHomes) || empty($cityHomes)) {
        header("Location: ../host_home.php?error=emptyfields&homeTitle=".$titleHome."&homeType=".$typeHome."&noGuests=".$guestHome."&rentalFee=".$feeHome."&streetNo=".$noHomes."&streeName=".$streeHomes."&barangay=".$bgyHomes."&zip=".$zipHomes."&city=".$cityHomes);
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
                header("Location: ../host_home.php?error=titletaken&homeType=".$typeHome."&noGuests=".$guestHome."&rentalFee=".$feeHome."&streetNo=".$noHomes."&streeName=".$streeHomes."&barangay=".$bgyHomes."&zip=".$zipHomes."&city=".$cityHomes);
                exit();
            }
            else {
                $sql = "INSERT INTO homes (titleHomes, typeHomes, guestHomes, noHomes, streetHomes, bgyHomes, zipHomes, cityHomes, feeHomes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../host_home.php?error=sqlerror2");
                    exit();    
                }
                else {
                    mysqli_stmt_bind_param($stmt, "ssiissisi", $titleHome, $typeHome, $guestHome, $noHomes, $streeHomes, $bgyHomes, $zipHomes, $cityHomes, $feeHome);
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