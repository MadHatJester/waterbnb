<?php
    require "host_index.php"
?>

<main>
    <h1>Host a Home</h1>
    <form action="includes/host_home.inc.php" method="post">
        <label>Residence Title</label><br>
        <input type="text" name="homeTitle" placeholder="Home Title"><br>
        <label>Type of Residence</label><br>
        <select name="homeType">
            <option value="" disabled selected>Select something...</option>
            <option value="apartment">Apartment</option>
            <option value="condominium">Condominium</option>
            <option value="loft">Loft</option>
            <option value="bungalow">Bungalow</option>
            <option value="cabin">Cabin</option>
            <option value="cottage">Cottage</option>
            <option value="townhouse">Townhouse</option>
        </select><br>
        <label>Number of Guests</label><br>
        <select name="noGuests" type='number'>
            <option value="" disabled selected>Select something...</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
        </select><br>
        <!-- <input type="number" name="noGuests" placeholder="Input a number"><br> -->
        <label>Residence Address</label><br>
        <input type="number" name="streetNo" placeholder="Stree No.">
        <input type="text" name="streeName" placeholder="Street Name">
        <input type="text" name="barangay" placeholder="Barangay"><br>
        <input type="number" name="zip" placeholder="ZIP Code">
        <input type="text" name="city" placeholder="City"><br>
        <label>Rental Fee</label><br>
        <input type="number" name="rentalFee" placeholder="Input a number"><br><br>
        <button type="submit" name="host-submit">Host a Residence</button>
    </form>

</main>

<?php
    require "footer.php";
?>