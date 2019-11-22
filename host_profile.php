<?php
include "host_index.php";

$userid = $_SESSION['userId'];

$sql = "SELECT * FROM users WHERE UserID = '$userid' ";
$result = mysqli_query($conn, $sql);
$queryResults = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

if ($queryResults > 0) {
	$userFN = $row['FirstName'];
	$userLN = $row['LastName'];
	$userEmail = $row['Email'];
	$userName = $row['Username'];
	$userType = $row['UserType'];

	echo "<img src='includes/uploads/profile" . $userid . ".jpg' width='200' height='200' alt='Image not found'>";
} else {
	echo "<p>sql error</p>";
}
?>
<main>
	<div id="uploadProfile" class="modal">
		<!-- Modal content -->
		<div class="modal-content">
			<span class="close">&times;</span>
			<div class="form-group">
				<h3>Cancel Reservation</h3><br>
				<form action="includes/upload_ppimg.inc.php" enctype="multipart/form-data" method="POST">
					<input type="file" name="file">
					<input type="hidden" name="userID" value="<?php echo $userid ?>">
					<input type="hidden" name="userType" value="<?php echo $userType ?>">
					<button type="submit" name="submit-ppimg">Upload Profile Picture</button>
				</form>
			</div>
		</div>
	</div>

	<div class="container-fluid p-1 bg-white">
		<button id="uploadlBtn" class="btn btn-primary">Upload Picture</button>
	</div>

	<div class="container-fluid">
		<img src="" alt="">
		<h3> <?php echo $userFN . " " . $userLN ?></h3>
		<em> <?php echo $userType ?></em>
		<p> <?php echo $userEmail ?></p>
	</div>

	<div class="container-fluid">
		<form action="list_residence.php" method="POST">
			<input type="hidden" name="userID" value="<?php echo $userid ?>">
			<button type="submit" name="vresidence-submit" class="btn btn-outline-dark">
				View Residence/s
			</button>
		</form>
	</div>

	<br>

	<div class="container-fluid">
		<form action="#" method="POST">
			<button type="submit" name="cancel-submit" class="btn btn-outline-dark">
				Cancel Reservation/s
			</button>
		</form>
	</div>
</main>

<script>
	var modal = document.getElementById("uploadProfile");
	var btn = document.getElementById("uploadlBtn");
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