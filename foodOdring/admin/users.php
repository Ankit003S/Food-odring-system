<?php
include('../connect.php');
$sql = "SELECT * FROM `customers`;";
$result = mysqli_query($conn, $sql);
$showItums= true;



if (isset($_GET['id'])) {
  $id= $_GET['id'];
  $sql= "DELETE FROM customers WHERE `customers`.`CustomerID` = $id" ;
      $result= mysqli_query($conn, $sql);
      header('Location: users.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Users - Admin Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="screan">

    <?php include("adminPartiols/sidePenal.php") ?>

    <div class="admin-container">
    <h1 class="userH1">Users</h1>
    <?php
    if ($showItums) {
      while ($row = mysqli_fetch_assoc($result)) {
                  echo '
                          <ul class="list">
                            <li class="item">
                              <div class="details">
                                <p>User ID: ' . $row['CustomerID'] . '</p>
                                <p>Name: ' . $row['FirstName'] . '</p>
                                <p>Email: ' . $row['Email'] . '</p>
                              </div>
                              <a href="users.php?id='.$row['CustomerID'].'" class="delete-btn">Delete</a>
                            </li>

                            <!-- Add more user items with details -->
                          </ul>';
      }
    }
    ?>
      

    </div>
  </div>
</body>

</html>