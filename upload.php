<<<<<<< HEAD
<?php
    $file = $_FILES['file'];
    print_r($file);

    $fileName = $file['name'];
    $fileType = $file['type'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];

    // $fileName = $_FILES['file']['name'];
    // $fileType = $_FILES['file']['type'];
    // $fileTmpName = $_FILES['file']['tmp_name'];
    // $fileError = $_FILES['file']['error'];
    // $fileSize = $_FILES['file']['size'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
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
=======
<?php
    $file = $_FILES['file'];
    print_r($file);

    $fileName = $file['name'];
    $fileType = $file['type'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];

    // $fileName = $_FILES['file']['name'];
    // $fileType = $_FILES['file']['type'];
    // $fileTmpName = $_FILES['file']['tmp_name'];
    // $fileError = $_FILES['file']['error'];
    // $fileSize = $_FILES['file']['size'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
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
>>>>>>> c2695829c93f97271b41305c0fd3e6b4cbd9e8e8
