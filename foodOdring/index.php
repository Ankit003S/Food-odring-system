<?php
//connecting to database.
include('connect.php');
?>
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
    //adding navbar on the page.
    include('partials/nev.php');
    ?>
    <?php
    if (isset($_GET['hotel_ID'])) {
        $hotelID = $_GET['hotel_ID'];
        $sql = "SELECT * FROM `menuitems` WHERE `RestaurantID` = '$hotelID'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $name = $row['Name'];
        $price = $row['Price'];
        $showItems = true;
    }
    if ($showItems) {
        //showing items on the page.
        echo '<div class="gride">';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '
            <div class="foodContainer">
                <div>
                    <a href="#" class="linkss" onclick="addToCart(' . $row['MenuItemID'] . ')">
                        <div class="food_box">
                            <img class="food_img" src="img/hotels/' . $row['RestaurantID'] . '/' . $row['Name'] . '.jpg" alt="Food">
                        </div>
                        <div class="food_txt">
                            <p>' . $row['Name'] . '<br>₹' . $row['Price'] . '</p>
                        </div>
                    </a>
                </div>
            </div>
        ';
        }
    }
    ?>

    <script>
        function addToCart(menuItemId) {
            // Display the confirmation popup
            var isConfirmed = window.confirm("Are you sure you want to add this item to your cart?");

            // Check the result of the confirmation
            if (isConfirmed) {
                // Redirect to the cart.php page or perform any other action to add the item to the cart
                window.location.href = 'cart.php?food_id=' + menuItemId;
            } else {
                // Do nothing or provide feedback to the user
                alert("Item not added to the cart.");
            }
        }
    </script>

    </div>
</body>

</html>
