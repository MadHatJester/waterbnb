<?php
if (isset($_POST['host-submit'])) {

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
    $user = $_POST['uid'];

    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileType = $file['type'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png');
    // $fileName = $_FILES['file']['name'];
    // $fileType = $_FILES['file']['type'];
    // $fileTmpName = $_FILES['file']['tmp_name'];
    // $fileError = $_FILES['file']['error'];
    // $fileSize = $_FILES['file']['size'];


    if (empty($titleHome) || empty($typeHome) || empty($guestHome) || empty($feeHome) || empty($noHomes) || empty($streeHomes) || empty($bgyHomes) || empty($zipHomes) || empty($cityHomes)) {
        header("Location: ../host_home.php?error=emptyfields&homeTitle=" . $titleHome . "&homeType=" . $typeHome . "&noGuests=" . $guestHome . "&rentalFee=" . $feeHome . "&streetNo=" . $noHomes . "&streeName=" . $streeHomes . "&barangay=" . $bgyHomes . "&zip=" . $zipHomes . "&city=" . $cityHomes);
        exit();
    } else {
        $sql = "SELECT ResidenceID FROM residence WHERE ResidenceID=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../host_home.php?error=sqlerror1");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $titleHome);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../host_home.php?error=titletaken&homeType=" . $typeHome . "&noGuests=" . $guestHome . "&rentalFee=" . $feeHome . "&streetNo=" . $noHomes . "&streeName=" . $streeHomes . "&barangay=" . $bgyHomes . "&zip=" . $zipHomes . "&city=" . $cityHomes);
                exit();
            } else {
                $sql = "INSERT INTO residence (ResidenceName, ResidenceType, GuestNumber, StreetNumber, StreetName, Barangay, ZIPCode, City, RentalFee, UserID) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../host_home.php?error=sqlerror2");
                    exit();
                } else {
                    
                    mysqli_stmt_bind_param($stmt, "ssiissisii", $titleHome, $typeHome, $guestHome, $noHomes, $streeHomes, $bgyHomes, $zipHomes, $cityHomes, $feeHome, $user);
                    mysqli_stmt_execute($stmt);

                    $sql = "SELECT * FROM Residence WHERE ResidenceID=(SELECT MAX(ResidenceID) FROM Residence)";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $imgid = $row['ResidenceID'];

                    $sql = "INSERT INTO residenceimg (ResidenceID) VALUES ('$imgid')";
                    mysqli_query($conn, $sql);

                    if (in_array($fileActualExt, $allowed)) {
                        if ($fileError === 0) {
                            if ($fileSize < 1000000) {
                                $fileNameNew = "residence" . $imgid . "." . "jpg";
                                $fileDestination = 'uploads/' . $fileNameNew;
                                move_uploaded_file($fileTmpName, $fileDestination);
                                echo $fileDestination;
                                header("Location: host_homepage.php?upload=success");
                            } else {
                                echo "Your file is to big!";
                            }
                        } else {
                            echo "There was an error uploading your file!";
                        }
                    } else {
                        echo "You cannot upload file of this type!";
                    }

                    header("Location: ../host_homepage.php?hosting=success");
                    exit();
                }
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../host_home.php");
    exit();
}
