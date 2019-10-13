<?php
    include "occupant_index.php";
    include "includes\dbh.inc.php";
?>

<main>
	<div class="container-fluid p-3 mb-2 bg-info">
	<h1>Reserve a Home</h1>
		<div class="container p-3 mb-2 bg-white">
		<form action="payment.php" method="post">
		
			<div class = "form-group">
			<label>Reserve Date:</label><br>
			<label>From:</label><br>
			<input type="date" name="toDate"><br>
			<label>To:</label><br>
			<input type="date" name="fromDate"><br>
			</div>
			
			<div class = "form-group">
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
</main>

<?php
require "footer.php";
?>