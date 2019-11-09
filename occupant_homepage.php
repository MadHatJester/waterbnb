<?php
include "occupant_index.php";
echo '<h1>Listed Spaces</h1>';
	
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
			<div class = 'container-fluid p-3 mb-3 bg-info text-white'>
				<a href='reserve_home.php?&rid=" . $row['ResidenceID'] . "'><h3>" . $row['ResidenceName'] . "</h3></a>
				<p>Location: " . $row['StreetNumber'] . " " . $row['StreetName'] . ", " . $row['Barangay'] . ", " . $row['ZIPCode'] . ", " . $row['City'] . "</p>
				<p>Type: " . $row['ResidenceType'] . "</p>
				<p>No. of Guest: " . $row['GuestNumber'] . "</p>
				<p>Pictures:</p>
			";
			
			echo"
			<div class='row'>	
			";	
			for ($imgdef = 1; $imgdef <= $rowImg['ImageNumber']; $imgdef++) {
				echo " 	
						<div class='container col-lg-4 col-md-6'>
				
							<div class='p-2 mx-auto' style='width: 70%;'>
								<img src='includes/uploads/residence" . $imgid . " - " . $imgdef . ".jpg' class='img-fluid rounded' width='100%' alt='Image not found'>
							</div>
						</div>
				";
			}
			echo"</div>";

			echo "</div>";
		}
	}
}
