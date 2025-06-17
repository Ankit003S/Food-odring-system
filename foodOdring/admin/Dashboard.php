<?php
include('../connect.php');
$sql = "SELECT * FROM `customers`;";
$result = mysqli_query($conn, $sql);
$customers = mysqli_num_rows($result);


$sql = "SELECT * FROM `orders`;";
$result = mysqli_query($conn, $sql);
$orders = mysqli_num_rows($result);

$sql = "SELECT * FROM `menuitems`;";
$result = mysqli_query($conn, $sql);
$food = mysqli_num_rows($result);

$sql = "SELECT * FROM `restaurants`;";
$result = mysqli_query($conn, $sql);
$Restorent = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>

<body>
  <div class="screan">

    <?php include("adminPartiols/sidePenal.php") ?>

    <div class="admin-container">
      <h1>Admin Dashboard</h1>

      <div class="dashboard-content">
        
        <div class="dashboard-card">
          <h2 class="card-title">Total Users</h2>
          <p><?php echo $customers; ?></p>
          <a href="users.php" class="details-btn">View Details</a>
        </div>

        <div class="dashboard-card">
          <h2 class="card-title">Total Orders</h2>
          <p><?php echo $orders; ?></p>
          <a href="order.php" class="details-btn">View Details</a>
        </div>

        <div class="dashboard-card">
          <h2 class="card-title">Total Items of food</h2>
          <p><?php echo $food; ?></p>
          <a href="foodItum.php" class="details-btn">View Details</a>
        </div>

        <div class="dashboard-card">
          <h2 class="card-title">Total Restaurent</h2>
          <p><?php echo $Restorent; ?></p>
          <a href="restorentDetales.php" class="details-btn">View Details</a>
        </div>

        <!-- Add more dashboard cards with different information -->

      </div>
    </div>
  </div>

  <!-- Your JavaScript code can be added here for dynamic functionality -->

</body>

</html>