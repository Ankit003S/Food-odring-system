<?php
include('connect.php');
if (isset($_GET['price'])) {
    session_start();
    $userID= $_SESSION['id'];
    $Price = $_GET['price'];
    $email = $_SESSION['user'];
    $result = $conn->query("INSERT INTO `orders` (`CustomerID`, `OrderDate`, `TotalAmount`) VALUES ('$userID', (now()), '$Price')");
    $result = $conn->query("UPDATE `cart` SET `array` = '' WHERE `userEmail` = '$email';");

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="Utiliti.css">
    <title>Order Plased</title>
</head>

<body>
    <div class="contener">
        <div class="Box">
            <div class="center">
                <h1>Your order has been placed</h1>
                <p>Your Total Amount is <?php echo $Price; ?> <br> <a href="home.php">Click Hear</a> go to home page</p>
            </div>
        </div>
    </div>

</body>

</html>