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
                echo $value . "<br>";
                $result = $conn->query("SELECT * FROM `menuitems` WHERE MenuItemID= '$value'");
                $row = $result->fetch_assoc();

        ?>
                <div class="product2">
                    <img src="img/hotels/<?php echo $row['RestaurantID'] ?>/<?php echo $row['Name']  ?>.jpg" alt="Product Image">
                    <div class="product-info">
                        <h3><?php echo $row['Name']  ?></h3>
                        <?php
                        if (isset($_GET[$row['Name']])) {
                            $q = $_GET[$row['Name']];
                            $price = $row['Price'];
                            $price = $price * $q;
                            $row['Price'] = $price;
                        }

                        ?>
                        <p class="product-price">$<?php echo $row['Price'];
                                                    $total = $total + $row['Price']; ?></p>
                        <a href="cart.php?delete=<?php echo $row['MenuItemID'] ?>"><button class="delete-btn">Delete</button></a>
                        <div class="quantity-container">
                            <form>
                                <input type="number" name="<?php echo $row['Name']  ?>" value="1">
                                <Button type="submit">Ok</Button>
                            </form>
                        </div>
                    </div>
                </div>

        <?php }
        } ?>

        <div class="total">
            Total: <?php echo $total; ?>
        </div>
        <button class="checkout-btn" onclick="openPopup()">click hear to add address</button>
        <a onclick="downloadFile()" href="orderPlased.php?price=<?php echo $total ?>" class="checkout-btn">Click Hear to Place your Order</a>

        <div id="overlay">
            <div id="popup">
                <span id="closeBtn" onclick="closePopup()">X</span>
                <h2>Popup Form</h2>
                <form>
                    <!-- Your form fields go here -->
                    <label for="city">City :</label>
                    <input type="text" id="city" name="city" required>
                    <br>
                    <br>
                    <label for="address">Address: </label>
                    <input type="text" id="address" name="address" required>
                    <br>
                    <br>
                    <label for="pincode">Pincode: </label>
                    <input type="number" id="pincode" name="pincode" required>
                    <br>
                    <br>
                    <input class="checkout-btn" type="button" value="Submit" style="
    background-color: #b2b53ebf;
"  onclick="closePopup()">
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    function openPopup() {
        document.getElementById('overlay').style.display = 'flex';
    }

    function closePopup() {
        document.getElementById('overlay').style.display = 'none';
    }
</script>
<script>
    function downloadFile() {
        // Create a blob with the file content
        const fileContent = 'Thanks for Ordering your total price is: <?php echo  $total;  ?>';
        const blob = new Blob([fileContent], {
            type: 'text/plain'
        });

        // Create an anchor element
        const a = document.createElement('a');

        // Set the download attribute and create a URL from the blob
        a.download = 'output.txt';
        a.href = window.URL.createObjectURL(blob);

        // Append the anchor element to the body
        document.body.appendChild(a);

        // Trigger a click on the anchor element to start the download
        a.click();

        // Remove the anchor element from the body
        document.body.removeChild(a);
    }
</script>

</html>