<?php
include('../connect.php');
$showMwssage= false;
//Checking if usernaem is empty or not.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $dec = $_POST["description"];
    // Sendind data to the database.
    $sql = "INSERT INTO `restaurants` (`Name`, `Address`, `Phone`, `Description`) VALUES ('$name', '$address', '$phone', '$dec');";
    $result = mysqli_query($conn, $sql);
    $showMwssage= true;
}

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
<?php
    if ($showMwssage) {
        echo '<div class="popup-overlay" id="popup">
        <div class="popup-content">
        <h2>Restaurant added Successful</h2>
        </div>
    </div>
    <script>
        setTimeout(hidePopup, 3000);
        function hidePopup() {
            document.getElementById("popup").style.display = "none";
            }
    </script>
            ';
    }
    ?>

    <div class="screan">
        <?php include("adminPartiols/sidePenal.php");
        include("adminPartiols/uplode.php"); ?>

        <div class="admin-container">
            <div class="add-food-form">
                <h1>Add Restaurents</h1>
                <form method="POST"> <!-- Form to add food item -->
                    <input type="text" name="name" placeholder="Enter Restaurent Name">
                    <input type="text" name="address" placeholder="Enter  Restaurent Address">
                    <input type="number" name="phone" placeholder="Enter  Restaurent Phone No">
                    <input type="text" name="description" placeholder="Enter Description">
                    <button type="submit">Add Food Item</button>
                </form>
            </div>
        </div>


</body>

</html>