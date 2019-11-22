<?php
include "header.php";
?>
<div class="p-4 m-4">


	<?php
	$userid = $_POST['userID'];

	if (isset($_POST['vresidence-submit'])) {
		$sql = "SELECT * FROM residence WHERE UserID = '$userid' ";
		$result = mysqli_query($conn, $sql);
		$queryResults = mysqli_num_rows($result);
		if ($queryResults > 0) {
			echo '
				<h3>Residence Lists</h3><br>';
			while ($row = mysqli_fetch_assoc($result)) {
				$residenceid = $row['ResidenceID'];

				echo "
					<div class = 'container-fluid p-3 mb-2 bg-info text-white'>
					<strong>" . $row['ResidenceName'] . "</strong>
					<p>Location: " . $row['StreetNumber'] . " " . $row['StreetName'] . ", " . $row['Barangay'] . ", " . $row['ZIPCode'] . ", " . $row['City'] . "</p>
					<p>Type: " . $row['ResidenceType'] . "</p>
					<p>No. of Guest: " . $row['GuestNumber'] . "</p>
					<p>Rental Fee: " . $row['RentalFee'] . "</p>";

				$sql = "SELECT * FROM reservation WHERE ResidenceID = '$residenceid' ";
				$resultRsrv = mysqli_query($conn, $sql);
				$queryResultsRsrv = mysqli_num_rows($resultRsrv);

				echo '	<p>No. of Reservations: ' . $queryResultsRsrv . '
							<div> 
							<form action="#" method="POST">
								<input type="hidden" name="userid" value="' . $userid . '">
								<input type="hidden" name="residenceid" value="' . $residenceid . '">
								<button type="submit" name="cancel-submit" class="btn btn-danger">Delete</button>
							</form>
							</div>
					</div>';
			}
		} else {
			echo "You are not hosting a space yet.";
		}
	} else {
		echo "FAIL";
	}

	?>

	<form action="host_profile.php">
		<button class="btn btn-success" type="submit">Back</button>
	</form>

</div>