<?php
include "occupant_index.php";
?>

<main>
  <div class="container">
    <?php
    if (isset($_POST['search-submit'])) {
      $search = mysqli_real_escape_string($conn, $_POST['search']);
      $sql = "SELECT * FROM residence WHERE
              ResidenceName LIKE '%$search%' OR
              StreetNumber LIKE '%$search%' OR
              StreetName LIKE '%$search%' OR
              Barangay LIKE '%$search%' OR
              ZIPCode LIKE '%$search%' OR
              City LIKE '%$search%' OR
              ResidenceType LIKE '%$search%' OR
              GuestNumber LIKE '%$search%'";
      $result = mysqli_query($conn, $sql);
      $queryResults = mysqli_num_rows($result);
      //echo $queryResults, $search;
      if ($queryResults > 0) {
        echo '
			<h2>Search Page</h2>
			<p>There are ' . $queryResults . ' result/s!</p>';
			while ($row = mysqli_fetch_assoc($result)) {
				echo "
				<div class = 'container p-3 mb-2 bg-info text-white'>
					  <a href='reserve_home.php?&rid=".$row['ResidenceID']."'><h3>" . $row['ResidenceName'] . "</h3></a>
					  <p>Location: " . $row['StreetNumber'] . " " . $row['StreetName'] . ", " . $row['Barangay'] . ", " . $row['ZIPCode'] . ", " . $row['City'] . "</p>
					  <p>Type: " . $row['ResidenceType'] . "</p>
					  <p>No. of Guest: " . $row['GuestNumber']."</p>
				</div>";
        }
      } else {
        echo "There are no results matched.";
      }
    } else {
      echo "FAIL";
    }

    ?>
  </div>
</main>

<?php
require "footer.php";
?>