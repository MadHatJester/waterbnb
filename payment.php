<?php
	require "occupant_index.php";
    $strtDate = $_POST['toDate'];
    $endDate = $_POST['fromDate'];
    $noGuest = $_POST['noGuest'];

?>

<main>
	<div class="container-fluid p-3 m-auto bg-info">
    <h1>Online Payment</h1>
		<div class="container p-2 m-auto bg-white">
			<form action="includes/payment.inc.php" method="post">
			
				<div class = "form-group">
					<label>First Name:</label><br>
					<input type="text" name="firstname" placeholder="First Name"><br>
				</div>
				
				<div class = "form-group">
					<label>Last Name:</label><br>
					<input type="text" name="lastname" placeholder="Last Name"><br>
				</div>
				
				<div class = "form-group">
					<label>Card Info:</label><br>
					<input type="text" name="noCard" pattern = "[1-9]{16}" maxlength = "16" placeholder="Card Number">
					<input type="month" name="dateCard" placeholder="Expiration Date">
					<input type="text" name="codeCard" pattern = "[1-9]{3}" maxlength = "3" placeholder="Security Code"> <br>
					<input type="hidden" name="startDate" value= "<?php echo $strtDate; ?>">
					<input type="hidden" name="endDate" value= "<?php echo $endDate; ?>">
					<input type="hidden" name="noGuest" value= "<?php echo $noGuest; ?>">
				</div>
				
				<button class="btn btn-primary" type="submit" name="payment-submit">Continue</button>
			</form>
		</div>
	</div>
</main>

<?php
require "footer.php";
?>