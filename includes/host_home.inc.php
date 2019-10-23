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

    $uploadDir = 'uploads' . DIRECTORY_SEPARATOR;
    $allowedTypes = array('jpg', 'png', 'jpeg', 'gif');
    $imgdef = 0;
    // Define maxsize for files i.e 2MB 
    $maxsize = 2 * 1024 * 1024;
    
    if (!empty(array_filter($_FILES['files']['name']))) {
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

                        foreach ($_FILES['files']['tmp_name'] as $key => $value) {
          
                            $imgdef++;
                            $fileTmpName = $_FILES['files']['tmp_name'][$key];
                            $fileName = $_FILES['files']['name'][$key];
                            $fileSize = $_FILES['files']['size'][$key];
                            $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
                            $fileNameNew = "residence" . $imgid . " - " . $imgdef . "." . "jpg";

                            // Set upload file path 
                            $filePath = $uploadDir . $fileNameNew;

                            // Check file type is allowed or not 
                            if (in_array(strtolower($fileExt), $allowedTypes)) {

                                // Verify file size - 2MB max 
                                if ($fileSize > $maxsize)
                                    echo "Error: File size is larger than the allowed limit.";

                                // If file with name already exist then append time in 
                                // front of name of the file to avoid overwriting of file 
                                if (file_exists($filePath)) {
                                    $filePath = $uploadDir . $fileNameNew;

                                    if (move_uploaded_file($fileTmpName, $filePath)) {
                                        echo "{$fileNameNew} successfully uploaded <br />";
                                    } else {
                                        echo "Error uploading {$fileName} <br />";
                                    }
                                } else {

                                    if (move_uploaded_file($fileTmpName, $filePath)) {
                                        echo "{$fileNameNew} successfully uploaded <br />";
                                    } else {
                                        echo "Error uploading {$fileName} <br />";
                                    }
                                }
                            } else {

                                // If file extention not valid 
                                echo "Error uploading {$fileName} ";
                                echo "({$fileExt} file type is not allowed)<br / >";
                            }

                        }

                    }

                    echo "$imgdef";
                    $sql = "UPDATE residenceimg SET ImageNumber = $imgdef WHERE ImageID=(SELECT MAX(ImageID) FROM residenceimg)";
                    mysqli_query($conn, $sql);
                }
            }
        }

    } else {

        // If no files selected 
        echo "No files selected.";
    }


    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../host_home.php");
    exit();
}
