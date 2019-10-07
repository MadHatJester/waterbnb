<?php

$strtDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$noGuest = $_POST['noGuest'];
echo $strtDate;
echo $endDate;
echo $noGuest;
?>

<main>
    <h1>Online Payment</h1>
    <form action="includes/payment.inc.php" method="post">
        <label>First Name</label><br>
        <input type="text" name="firstname" placeholder="First Name"><br>
        <label>Last Name</label><br>
        <input type="text" name="lastname" placeholder="Last Name"><br>
        <label>Card Info</label><br>
        <input type="text" name="noCard" pattern = "[1-9]{16}" maxlength = "16" placeholder="Card Number">
        <input type="month" name="dateCard" placeholder="Expiration Date">
        <input type="text" name="codeCard" pattern = "[1-9]{3}" maxlength = "3" placeholder="Security Code"> <br>
        <input type="hidden" name="startDate" value= "<?php echo $strtDate; ?>">
        <input type="hidden" name="endDate" value= "<?php echo $endDate; ?>">
        <input type="hidden" name="noGuest" value= "<?php echo $noGuest; ?>">
        <button type="submit" name="payment-submit">Reserve Residence</button>
        
    </form>

</main>

<?php
require "footer.php";
?>