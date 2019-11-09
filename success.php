<?php
include "header.php";
?>

<html>
    <head>
        <meta charset="utf-8">
		<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
        <title>WaterBNB - Reservation Success!</title>
    </head>

<div class="jumbotron p-4 m-4">
<h1>Reservation Successful!</h2>
<p>Your transaction no.: <?php echo $_GET['transacno'] ?></p>

<form action="occupant_homepage.php">
    <button class="btn btn-success" type="submit">Home</button>
</form>

</div>

<?php
require "footer.php";
?>
</html>