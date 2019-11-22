<?php
require 'dbh.inc.php';

if (isset($_POST['submit-ppimg'])) {

	$userID = $_POST['userID'];
	$userType = $_POST['userType'];
	$file = $_FILES['file'];
	$uploadDir = 'uploads' . DIRECTORY_SEPARATOR;
	$allowedTypes = array('jpg', 'png', 'jpeg', 'gif');

	$maxsize = 2 * 1024 * 1024;

	$sql = "INSERT INTO userimg (UserID) VALUES ('$userID')";
	mysqli_query($conn, $sql);

	$fileTmpName = $file['tmp_name'];
	$fileName = $file['name'];
	$fileSize = $file['size'];
	$fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
	$fileNameNew = "profile" . $userID . "." . "jpg";

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
				if ($userType == 'occupant'){
					header("Location: ../occupant_profile.php?success");
				} else {
					header("Location: ../host_profile.php?success");
				}
				echo "{$fileNameNew} successfully uploaded <br />";
			} else {
				if ($userType == 'occupant'){
					header("Location: ../occupant_profile.php?error=uploadfailed");
				} else {
					header("Location: ../host_profile.php?error=uploadfailed");
				}
				echo "Error uploading {$fileName} <br />";
			}
		} else {

			if (move_uploaded_file($fileTmpName, $filePath)) {
				if ($userType == 'occupant'){
					header("Location: ../occupant_profile.php?success");
				} else {
					header("Location: ../host_profile.php?success");
				}
				echo "{$fileNameNew} successfully uploaded <br />";
			} else {
				if ($userType == 'occupant'){
					header("Location: ../occupant_profile.php?error=uploadfailed");
				} else {
					header("Location: ../host_profile.php?error=uploadfailed");
				}
				echo "Error uploading {$fileName} <br />";
			}
		}
	} else {

		// If file extention not valid 
		if ($userType == 'occupant'){
			header("Location: ../occupant_profile.php?error=imgtype");
		} else {
			header("Location: ../host_profile.php?error=imgtype");
		}
		echo "Error uploading {$fileName} ";
		echo "({$fileExt} file type is not allowed)<br / >";
	}

	mysqli_close($conn);
} else {
	header("Location: ../occupant_profile.php");
	exit();
}
