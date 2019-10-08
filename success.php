<h1>Reservation Successful</h2>
<p>Your transaction no.: <?php echo $_GET['transacno'] ?><p>

<form action="occupant_index.php">
    <button type="submit">Home</button>
</form>

<?php
require "footer.php";
?>