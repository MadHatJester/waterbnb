<?php
    require "header.php";
?>

<main>
    <h1>Reserve a Home</h1>
    <form action="payment.php" method="post">
        <label>Reserve Date:</label><br>
        <label>From:</label><br>
        <input type="date" name="toDate"><br>
        <label>To:</label><br>
        <input type="date" name="fromDate"><br>
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
        <button type="submit" name="reserve-submit">Continue</button>
    </form>

</main>

<?php
require "footer.php";
?>