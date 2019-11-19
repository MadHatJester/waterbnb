<?php
include "host_index.php";
	
$userid = $_SESSION['userId'];	
	
$sql = "SELECT * FROM users WHERE UserID = '$userid' ";
$result = mysqli_query($conn, $sql);
$queryResults = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

//echo $queryResults . ' ' . $userid;

if ($queryResults > 0) {
	
	$userFN = $row['FirstName'];
	$userLN = $row['LastName'];
	$userEmail = $row['Email'];
	$userName = $row['Username'];
	$userType = $row['UserType'];
	
	echo '
	<div class="container-fluid"> 
	<img src="" alt="">
		<p> '.$userFN.'\'s - Profile</p>
		<h3> '.$userFN.' '. $userLN .'</h3>
		<em> '.$userType.'</em>
		<p> '.$userEmail.'</p>
	</div>
	
	<div class="container"> 
		<form action="#" method="POST">
			<button type="button" name="cancel-submit" class="btn btn-outline-dark">
				Cancel Reservation/s
			</button>
		</form>
	</div>
	';
	
	
	
}else{
	echo "<p>sql error</p>";
}
