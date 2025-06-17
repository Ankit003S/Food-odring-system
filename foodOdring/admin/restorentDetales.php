<?php
include('../connect.php');
$sql = "SELECT * FROM `restaurants`;";
$result = mysqli_query($conn, $sql);
$showItums= true;



if (isset($_GET['id'])) {
  $id= $_GET['id'];
  $sql= "DELETE FROM restaurants WHERE `restaurants`.`RestaurantID` = $id" ;
      $result= mysqli_query($conn, $sql);
      header('Location: restorentDetales.php');
}
?>
<!DOCTYPE html>
<html lang="en">
 
<head>
  <meta charset="UTF-8">
  <title>Orders - Admin Dashboard</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="screan">

    <?php include("adminPartiols/sidePenal.php") ?>
    <div class="admin-container">
      <h1>Restorents</h1>
      <?php
    if ($showItums) {
      while ($row = mysqli_fetch_assoc($result)) {
                  echo '<ul class="list">
                  <li class="item">
                    <div class="details">
                      <p>Restaurants ID: ' . $row['RestaurantID'] . '</p>
                      <p>Name: ' . $row['Name'] . '</p>
                      <p>Address: ' . $row['Address'] . '</p>
                      <p>Contact: ' . $row['Phone'] . '</p>
                    </div>
                    <a href="restorentDetales.php?id='.$row['RestaurantID'].'" class="delete-btn">Delete</a>
                  </li>
          
                  <!-- Add more order items with details -->
                </ul>';
      }
    }
    ?>
      
    </div>
  </div>
</body>

</html>