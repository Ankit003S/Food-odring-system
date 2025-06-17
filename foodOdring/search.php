<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="utiliti.css">
    <title>Document</title>
</head>
<body>
<?php
include('partials/nev.php');
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['serchBar'])) {
    $searchTerm = $_GET['serchBar'];
    $sql = "SELECT * FROM menuitems WHERE Name LIKE '%$searchTerm%'";
    $result = mysqli_query($conn, $sql);
    echo '<div class="gride">';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
        <div class="foodContener">
            <div>
                <a href="order.php?food_id=' . $row['MenuItemID'] . '" class="linkss">

                    <div class="food_box">
                        <img class="food_img" src="img/hotels/' . $row['RestaurantID'] . '/' . $row['Name'] . '.jpg" alt="Food">
                    </div>
                    <div class="food_txt">
                        <p>' . $row['Name'] . '<br>' . $row['Price'] . '₹</p>
                    </div>
                </a>
            </div>
        </div>
    ';
    }
}
?>
</div>
</body>
</html>