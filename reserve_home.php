<?php
include "occupant_index.php";
?>

<main>

	<div class='p-3 m-2'>

		<div class='row'>
			<div class='container col-lg-7 col-md-12'>

				<?php

				$rid = mysqli_real_escape_string($conn, $_GET['rid']);
				$sql = "SELECT * FROM residence WHERE ResidenceID LIKE '$rid'";
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($result);

				$imgid = $row['ResidenceID'];
				$sqlImg = "SELECT * FROM residenceimg WHERE ResidenceID = '$imgid' ";
				$resultImg = mysqli_query($conn, $sqlImg);
				$rowImg = mysqli_fetch_assoc($resultImg);

				$residenceName = $row['ResidenceName'];
				$street = $row['StreetNumber'];
				$streetName = $row['StreetName'];
				$brgy = $row['Barangay'];
				$zip = $row['ZIPCode'];
				$city = $row['City'];
				$type = $row['ResidenceType'];
				$guestnum = $row['GuestNumber'];

				if (isset($_GET['cancel'])) {
					if ($_GET['cancel'] == "success") {
						echo '<script type="text/javascript"> cancelSuccess() </script>';
					}
				}

				if (isset($_GET['error'])) {
					if ($_GET['error'] == "emptyfields") {
						echo '<div class="container"><div class="container-fluid text-danger p-auto bg-white"><p>*Fill in all fields!</p></div></div>';
					} elseif ($_GET['error'] == "datetaken") {
						echo '<div class="container"><div class="container-fluid text-danger p-auto bg-white"><p>*Date taken!</p></div></div>';
					} elseif ($_GET['error'] == "sqlerror1") {
						echo '<div class="container"><div class="container-fluid text-danger p-auto bg-white"><p>*sqlerror1!</p></div></div>';
					} elseif ($_GET['error'] == "sqlerror2") {
						echo '<div class="container"><div class="container-fluid text-danger p-auto bg-white"><p>*sqlerror2!</p></div></div>';
					} elseif ($_GET['error'] == "noreserve") {
						echo '<div class="container"><div class="container-fluid text-danger p-auto bg-white"><p>*No Reservation!</p></div></div>';
					}
				}


				//WIP#############################

				echo "
					<h3>" . $row['ResidenceName'] . "</h3>
					<p>Location: " . $row['StreetNumber'] . " " . $row['StreetName'] . ", " . $row['Barangay'] . ", " . $row['ZIPCode'] . ", " . $row['City'] . "</p>
					<p>Type: " . $row['ResidenceType'] . "</p>
					<p>No. of Guest: " . $row['GuestNumber'] . "</p>
					<p>Rental Fee: " . $row['RentalFee'] . "</p>
					<p>Pictures: </p>

					<div class='row'>
					";

				for ($imgdef = 1; $imgdef <= $rowImg['ImageNumber']; $imgdef++) {
					echo "
								<div class='container-fluid col-lg-6 col-md-12'>

									<div class='p-2 mx-auto' style='width: 70%;'>
										<img src='includes/uploads/residence" . $imgid . " - " . $imgdef . ".jpg' class='img-fluid rounded' width='100%' alt='Image not found'>
									</div>
								</div>
						";
				}
				echo "</div>";

				//WIP############################
				?>


			</div>

			<!-- ################## RESERVE FORM ############################-->
			<div class="container float-right p-2 bg-info col-lg-5">
				<h2>Reserve a Home</h2>
				<div class="container-fluid p-1 bg-white">
					<form action="includes/reserve_home.inc.php" method="post">

						<div class="form-group">
							<label>Reserve Date:</label><br>
							<label>From:</label><br>
							<input type="date" name="toDate"><br>
							<label>To:</label><br>
							<input type="date" name="fromDate"><br>
							<input type="hidden" name="rid" value=<?php echo $_GET['rid'] ?>>
							<input type="hidden" name="uid" value="<?php echo $_SESSION['userId']; ?>">
						</div>

						<div class="form-group">
							<label>Guest:</label><br>
							<select name="noGuest" type=number>
								<option value="" disabled selected>Select no. of guest</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
							</select><br>
						</div>

						<button class="btn btn-primary" type="submit" name="reserve-submit">Continue</button>
					</form>
				</div>
				<div class="container-fluid p-1 bg-white">
					<button id="cancelBtn" class="btn btn-primary" type="submit" name="reserve-cancel">Cancel</button>
				</div>

				<br><br><br><br>

				<!-- ################## CALENDAR FORM ############################-->
				<div class="container-fluid float-right p-2 mb-2 bg-info">
					<div class="container-fluid p-2 mb-2 bg-white">
						<?php
						include "calendar.php";
						?>
					</div>
				</div>

			</div>
			<!--######################RESERVE FORM END#####################-->

			<div id="cancelModal" class="modal">
				<!-- Modal content -->
				<div class="modal-content">
					<form action="includes/cancel_reservation.inc.php" method="post">
						<span class="close">&times;</span>
						<div class="form-group">
							<h3>Cancel Reservation</h3><br>
							<label>Transaction Number</label><br>
							<input type="text" name="transacNo"><br>
							<input type="hidden" name="rid" value=<?php echo $_GET['rid'] ?>>
							<input type="hidden" name="uid" value="<?php echo $_SESSION['userId']; ?>">
						</div>
						<button class="btn btn-primary" type="submit" name="reserve-cancel">Confirm</button>
					</form>
				</div>

			</div>

		</div>
</main>

<script>
	var modal = document.getElementById("cancelModal");
	var btn = document.getElementById("cancelBtn");
	var span = document.getElementsByClassName("close")[0];
	btn.onclick = function() {
		modal.style.display = "block";
	}
	span.onclick = function() {
		modal.style.display = "none";
	}
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
</script>

<?php
require "footer.php";
?>