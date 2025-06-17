<?php
include('../connect.php');
if(isset($_GET["inputDate"])){
  $date= $_GET["inputDate"];
  $sql = "SELECT * FROM Orders INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID WHERE OrderDate = '$date'";
}
else{
  $sql = "SELECT * FROM Orders INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID;";
}
$result = mysqli_query($conn, $sql);
$showItums = true;



if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "DELETE FROM orders WHERE `orders`.`OrderID` = $id";
  $result = mysqli_query($conn, $sql);
  header('Location: order.php');
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
      <h1>Orders</h1>
      <form method="GET">
        <label for="inputDate">Enter Date: </label>
        <input type="text" name="inputDate" id="inputDate">
        <button type="submit">Sort</button>
      </form>
      <?php
      if ($showItums) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<ul class="list">
                  <li class="item">
                    <div class="details">
                      <p>Order ID: ' . $row['OrderID'] . '</p>
                      <p>Customer: ' . $row['FirstName'] . '</p>
                      <p>Order Date: ' . $row['OrderDate'] . '</p>
                      <p>Total: $' . $row['TotalAmount'] . '</p>
                    </div>
                    <a href="order.php?id=' . $row['OrderID'] . '" class="delete-btn">Delete</a>
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