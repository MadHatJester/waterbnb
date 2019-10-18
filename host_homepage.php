<?php
include "host_index.php";
$uid = $_SESSION['userId'];
echo '
	<div class="container-fluid">
	<h1>Hosting Residences</h1>';

$sql = "SELECT * FROM Residence WHERE UserID = $uid";
$result = mysqli_query($conn, $sql);
$queryResults = mysqli_num_rows($result);

if ($queryResults > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$imgid = $row['ResidenceID'];
		$sqlImg = "SELECT * FROM residenceimg WHERE ResidenceID = '$imgid' ";
		$resultImg = mysqli_query($conn, $sqlImg);
		while ($rowImg = mysqli_fetch_assoc($resultImg)) {
			echo "
			<div class = 'container p-3 mb-2 bg-info text-white'>
				<a href='reserve_home.php'><h3>" . $row['ResidenceName'] . "</h3></a>
				<p>Location: " . $row['StreetNumber'] . " " . $row['StreetName'] . ", " . $row['Barangay'] . ", " . $row['ZIPCode'] . ", " . $row['City'] . "</p>
				<p>Type: " . $row['ResidenceType'] . "</p>
				<p>No. of Guest: " . $row['GuestNumber'] . "</p>
				<p>Pictures: <img src='includes/uploads/residence" . $imgid . ".jpg'>
			</div>";
		}
	}
}
echo "</div>";
