<?php
$mess = false;
include('../connect.php');
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "DELETE FROM menuitems WHERE `menuitems`.`MenuItemID` = $id";
  $result = mysqli_query($conn, $sql);
  // header('Location: foodItum.php');
  $mess = true;
}


$sql = "SELECT * FROM `menuitems`;";
$result = mysqli_query($conn, $sql);
$showItums = true;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Food Items - Admin Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  if ($mess) {
    echo '<div class="popup-overlay" id="popup">
        <div class="popup-content">
        <h2>Itum is deleted!</h2>
        </div>
    </div>
    <script>
        setTimeout(hidePopup, 3000);
        function hidePopup() {
            document.getElementById("popup").style.display = "none";
            }
    </script>
            ';
    $wrongEmail = false;
  };
  ?>

  <div class="screan">

    <?php include("adminPartiols/sidePenal.php") ?>
    <div class="admin-container">
      <ul class="list">
        <?php
        if ($showItums) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<li class="item">
                  <div class="details">
                    <p>Food ID: ' . $row['MenuItemID'] . '</p>
                    <p>Name: ' . $row['Name'] . '</p>
                    <p>Description: ' . $row['Description'] . '</p>
                    <p>Price: $' . $row['Price'] . '</p>
                  </div>
                  <a href="foodItum.php?id=' . $row['MenuItemID'] . '" class="delete-btn">Delete</a>
                </li>';
          }
        }
        ?>


        <!-- Add more food items with details -->
      </ul>
    </div>
  </div>
  </div>
</body>

</html>