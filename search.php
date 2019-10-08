<?php
    require "header.php";
?>

<main>
  <div class="container">
    <?php
    if (isset($_POST['search-submit'])) {
      $search = mysqli_real_escape_string($conn, $_POST['search']);
      $sql = "SELECT * FROM homes WHERE
              titleHomes LIKE '%$search%' OR
              noHomes LIKE '%$search%' OR
              streetHomes LIKE '%$search%' OR
              bgyHomes LIKE '%$search%' OR
              zipHomes LIKE '%$search%' OR
              cityHomes LIKE '%$search%' OR
              typeHomes LIKE '%$search%' OR
              guestHomes LIKE '%$search%'";
      $result = mysqli_query($conn, $sql);
      $queryResults = mysqli_num_rows($result);
      //echo $queryResults, $search;
      if ($queryResults > 0) {
        echo '<h2>Search Page</h2>
          <p>There are ' . $queryResults . ' result/s!</p>';
        while ($row = mysqli_fetch_assoc($result)) {
          echo "
            <div>

              <a href='reserve_home.php'><h3>" . $row['titleHomes'] . "</h3></a>
              <p>Location: " . $row['noHomes'] . " " . $row['streetHomes'] . ", " . $row['bgyHomes'] . ", " . $row['zipHomes'] . ", " . $row['cityHomes'] . "</p>
              <p>Type: " . $row['typeHomes'] . "</p>
              <p>No. of Guest: " . $row['guestHomes'] . "</p>
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