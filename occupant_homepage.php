<?php
include "occupant_index.php";
echo '
	<div class="container-fluid">
	<h1>Listed Spaces</h1>';

$sql = "SELECT * FROM Residence";
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
				<a href='reserve_home.php?&rid=" . $row['ResidenceID'] . "'><h3>" . $row['ResidenceName'] . "</h3></a>
				<p>Location: " . $row['StreetNumber'] . " " . $row['StreetName'] . ", " . $row['Barangay'] . ", " . $row['ZIPCode'] . ", " . $row['City'] . "</p>
				<p>Type: " . $row['ResidenceType'] . "</p>
				<p>No. of Guest: " . $row['GuestNumber'] . "</p>
				<p>Pictures: 
				<div class='mx-auto' style='width: 70%;'><img src='includes/uploads/residence" . $imgid . ".jpg' class='img-fluid rounded' width='720'></div>
			</div>";
		}
	}
}
echo "</div>";
