<?php
require "occupant_index.php";
?>

<main>
	<div class="container-fluid p-3 m-auto bg-info">
		<h1>Online Payment</h1>
		<div class="container p-2 m-auto bg-white">
			<form action="includes/payment.inc.php" method="post">

				<div class="form-group">
					<label>First Name:</label><br>
					<input type="text" name="firstname" placeholder="First Name"><br>
				</div>

				<div class="form-group">
					<label>Last Name:</label><br>
					<input type="text" name="lastname" placeholder="Last Name"><br>
				</div>

				<div class="form-group">
					<label>Card Info:</label><br>
					<input type="text" name="noCard" pattern="[0-9]{16}" maxlength="16" placeholder="Card Number">
					<input type="text" name="monthCard" size="1" pattern="[0-9]{2}" maxlength="2" placeholder="mm">
					/
					<input tpye="text" name="yearCard" size="1" pattern="[0-9]{2}" maxlength="2" placeholder="yy">
					<input type="text" name="codeCard" size="2" pattern="[0-9]{3}" maxlength="3" placeholder="CVC"> <br>
					<input type="hidden" name="fee" value=<?php echo $_GET['fee'] ?>>
					<!-- <input type="hidden" name="startDate" value= "?php echo $strtDate; ?>">
					<input type="hidden" name="endDate" value= "?php echo $endDate; ?>">
					<input type="hidden" name="noGuest" value= "?php echo $noGuest; ?>">
					<input type="hidden" name="rid" value= "?php echo $rid; ?>">
					<input type="hidden" name="uid" value="?php echo $_SESSION['userId']; ?>"> -->
				</div>

				<button class="btn btn-primary" type="submit" name="payment-submit">Continue</button>
			</form>
		</div>
	</div>
</main>

<?php
require "footer.php";
?>