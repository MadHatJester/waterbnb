<?php
include "occupant_index.php";

					
	echo'
	<div class="container-fluid">
	<h1>Listed Spaces</h1>';
	
		$sql = "SELECT * FROM homes";
		$result = mysqli_query($conn, $sql);
		$queryResults = mysqli_num_rows($result);

		if ($queryResults>0) {
		  while ($row = mysqli_fetch_assoc($result)) {
			echo "
			<div class = 'container p-3 mb-2 bg-info text-white'>
				<a href='reserve_home.php'><h3>" . $row['titleHomes'] . "</h3></a>
				<p>Location: " . $row['noHomes'] . " " . $row['streetHomes'] . ", " . $row['bgyHomes'] . ", " . $row['zipHomes'] . ", " . $row['cityHomes'] . "</p>
				<p>Type: " . $row['typeHomes'] . "</p>
				<p>No. of Guest: " . $row['guestHomes']."</p>
			</div>";
		  }
		}
	echo"</div>";
