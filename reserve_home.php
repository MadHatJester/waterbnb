<?php
include "occupant_index.php";
?>

<main>

	<div class='container'>
	
		<div class='row'>
			<div class='col-8'>
			
					<?php
					$rid = mysqli_real_escape_string($conn, $_GET['rid']);
					$sql = "SELECT * FROM residence WHERE ResidenceID LIKE '$rid'";
					$result = mysqli_query($conn, $sql);
					$row = mysqli_fetch_assoc($result);
					
					$residenceName = $row['ResidenceName'];
					$imgid = $row['ResidenceID'];
					$street = $row['StreetNumber'];
					$streetName = $row['StreetName'];
					$brgy = $row['Barangay'];
					$zip = $row['ZIPCode'];
					$city = $row['City'];
					$type = $row['ResidenceType'];
					$guestnum = $row['GuestNumber'];
					
					//WIP#############################
					
					echo"
					<h3>" . $row['ResidenceName'] . "</h3>
					<p>Location: " . $row['StreetNumber'] . " " . $row['StreetName'] . ", " . $row['Barangay'] . ", " . $row['ZIPCode'] . ", " . $row['City'] . "</p>
					<p>Type: " . $row['ResidenceType'] . "</p>
					<p>No. of Guest: " . $row['GuestNumber'] . "</p>
					<p>Pictures: </p>
					
					<div class='' style='width: 70%;'><img src='includes/uploads/residence" . $imgid . ".jpg' class='img-fluid rounded' width='720'></div>
					";
					
					//WIP############################
					?>
					
					
			
			</div>
			
			<div class="col-lg-3 col-md-auto">
			<!-- ################## RESERVE FORM ############################-->
			<div class="container-fluid float-right p-3 mb-2 bg-info" style=''>
			<div style=''>
				<h1>Reserve a Home</h1>
				<div class="container p-3 mb-2 bg-white">
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
			</div>
		<!--######################RESERVE FORM END#####################-->
			</div>
			
		</div>
	
	</div>
</main>

<?php
require "footer.php";
?>