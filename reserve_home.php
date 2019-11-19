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

					if (isset($_GET['error'])) {
					if ($_GET['error'] == "emptyfields") {
						echo '<div class="container"><div class="container-fluid text-danger p-auto bg-white"><p>*Fill in all fields!</p></div></div>';
					} elseif ($_GET['error'] == "datetaken") {
						echo '<div class="container"><div class="container-fluid text-danger p-auto bg-white"><p>*Date taken!</p></div></div>';
					} elseif ($_GET['error'] == "sqlerror1") {
						echo '<div class="container"><div class="container-fluid text-danger p-auto bg-white"><p>*sqlerror1!</p></div></div>';
					} elseif ($_GET['error'] == "sqlerror2") {
						echo '<div class="container"><div class="container-fluid text-danger p-auto bg-white"><p>*sqlerror2!</p></div></div>';
					}
					}


					//WIP#############################

					echo"
					<h3>" . $row['ResidenceName'] . "</h3>
					<p>Location: " . $row['StreetNumber'] . " " . $row['StreetName'] . ", " . $row['Barangay'] . ", " . $row['ZIPCode'] . ", " . $row['City'] . "</p>
					<p>Type: " . $row['ResidenceType'] . "</p>
					<p>No. of Guest: " . $row['GuestNumber'] . "</p>
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
					echo"</div>";

					//WIP############################
					?>
			</div>

			<!-- ################## CALENDAR FORM ############################-->
			<div class="container-fluid float-right p-2 mb-2 bg-info col-lg-5 col-md-auto">
				<div  class="container-fluid p-2 mb-2 bg-white">
				<?php
				include "calendar.php";
				?>
			  </div>
			</div>


			<!-- ################## RESERVE FORM ############################-->
			<div class="container-fluid float-right p-2 bg-info ">
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
			</div>
			<!--######################RESERVE FORM END#####################-->



	</div>
</main>

<?php
require "footer.php";
?>
