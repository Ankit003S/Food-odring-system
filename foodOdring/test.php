<?php
include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="utiliti.css">
</head>

<body>

    <?php include('partials/nev.php');
    $email = $_SESSION['user'];
    $result = $conn->query("SELECT array FROM cart where userEmail= '$email'");
    $row = $result->fetch_assoc();
    if (!empty($row['array'])) {
        $cart = explode(',', $row['array']);
    } else {
        $cart = array();
    }

    $total = 0;

    if (isset($_GET['food_id'])) {

        $id = $_SESSION['user'];
        $food_id = $_GET['food_id'];
        array_push($cart, $food_id);
        $csvString = implode(',', $cart);
        $result = $conn->query("UPDATE cart SET array='$csvString' WHERE userEmail = '$id';");
        header("location: cart.php");
    }
    if (isset($_GET['delete'])) {
        $id = $_SESSION['user'];
        $delete = $_GET['delete'];
        $i = 0;
        foreach ($cart as $value) {
            if ($delete == $value) {
                unset($cart[$i]);
                if (!empty($cart)) {
                    $csvString = implode(',', $cart);
                }
                $result = $conn->query("UPDATE cart SET array='$csvString' WHERE userEmail = '$id';");
                header("location: cart.php");
            }
            $i++;
        }
    }
    ?>
    <div class="cart-container">
        <?php
        if (!empty($cart)) {
            foreach ($cart as $value) {
                $result = $conn->query("SELECT * FROM `menuitems` WHERE MenuItemID= '$value'");
                $row = $result->fetch_assoc();
        ?>
                <div class="product2">
                    <img src="img/hotels/<?php echo $row['RestaurantID'] ?>/<?php echo $row['Name']  ?>.jpg" alt="Product Image">
                    <div class="product-info">
                        <h3><?php echo $row['Name']  ?></h3>
                        <p class="product-price">$<?php echo $row['Price']; ?></p>
                        <a href="cart.php?delete=<?php echo $row['MenuItemID'] ?>"><button class="delete-btn">Delete</button></a>
                        <div class="quantity-container">
                            <button class="quantity-btn" onclick="changeQuantity(<?php echo $row['Price']; ?>, -1)">-</button>
                            <input class="quantity-input" type="text" id="quantity_<?php echo $row['MenuItemID']; ?>" value="1">
                            <button class="quantity-btn" onclick="changeQuantity(<?php echo $row['Price']; ?>, 1)">+</button>
                        </div>
                    </div>
                </div>
        <?php
                $total += $row['Price']; // Update total dynamically
            }
        }
        ?>
        <div class="total">
            Total: $<span id="totalAmount"><?php echo $total; ?></span>
        </div>

        <a onclick="downloadFile()" href="orderPlased.php?price=<?php echo $total ?>" class="checkout-btn">Click Here to Place your Order</a>
    </div>

    <script>
        function changeQuantity(price, change) {
            var quantityInput = document.getElementById('quantity_<?php echo $row['MenuItemID']; ?>');
            var currentQuantity = parseInt(quantityInput.value, 10);
            var newQuantity = currentQuantity + change;

            // Make sure the quantity doesn't go below 1
            if (newQuantity > 0) {
                quantityInput.value = newQuantity;
                updateTotal(price, newQuantity);
            }
        }

        function updateTotal(price, quantity) {
            var totalAmount = document.getElementById('totalAmount');
            var currentTotal = parseFloat(totalAmount.innerText.replace('$', ''));
            var newTotal = currentTotal + (price * quantity);
            totalAmount.innerText = '$' + newTotal.toFixed(2);
        }
    </script>
</body>

</html>
