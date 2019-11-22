<?php
include "header.php";
?>

<div class="p-4 m-4">

	<?php
	$userid = $_POST['userID'];

	if (isset($_POST['vreserve-submit'])) {
		$sql = "SELECT * FROM reservation WHERE UserID = $userid ";
		$result = mysqli_query($conn, $sql);
		$queryResults = mysqli_num_rows($result);
		//echo $queryResults, $search;
		if ($queryResults > 0) {
			echo '
				<h3>Transaction Lists</h3><br>';
			while ($row = mysqli_fetch_assoc($result)) {
				$reservationid = $row['ReservationID'];
				$residenceid = $row['ResidenceID'];
				$sqlRsrv = "SELECT * FROM transactions WHERE ReservationID = ' $reservationid' ";
				$resultRsrv = mysqli_query($conn, $sqlRsrv);

				while ($rowRsrv = mysqli_fetch_assoc($resultRsrv)) {

					$sqlRsdn = "SELECT * FROM residence WHERE ResidenceID = ' $residenceid' ";
					$resultRsdn = mysqli_query($conn, $sqlRsdn);
					$rowRsdn = mysqli_fetch_assoc($resultRsdn);
					echo "
						<div class = 'container-fluid p-3 mb-2 bg-info text-white'>
							<p>Transaction #: " . $rowRsrv['TransactionNumber'] . "</p>
								<strong>" . $rowRsdn['ResidenceName'] . "</strong>
								<p>
								Location: " . $rowRsdn['StreetNumber'] . " " . $rowRsdn['StreetName'] . ", " . $rowRsdn['Barangay'] .
						", " . $rowRsdn['ZIPCode'] . ", " . $rowRsdn['City'] . "
								</p>
								<p>Type: " . $rowRsdn['ResidenceType'] . "</p>
								<p>No. of Guest: " . $rowRsdn['GuestNumber'] . "</p>
								<p>Date: " . $row['StartDate'] . " to " . $row['EndDate'] . "</p>
								<p>Rental Fee: " . $rowRsdn['RentalFee'] . "</p>
						</div>";
				}
			}
		} else {
			echo "There are no transactions yet.";
		}
	} else {
		echo "FAIL";
	}
	?>

	<br>
	<form action="occupant_profile.php">
		<button class="btn btn-success" type="submit">Back</button>
	</form>

</div>