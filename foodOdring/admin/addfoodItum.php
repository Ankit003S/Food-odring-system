<?php
include('../connect.php');
$showMwssage = false;
//Checking if usernaem is empty or not.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $Fname = $_POST["foodName"];
    $dec = $_POST["description"];
    $price = $_POST["price"];
    $restaurant = $_POST["restaurant"];
    // Sendind data to the database.
    $sql = "INSERT INTO `menuitems` (`RestaurantID`, `Name`, `Description`, `Price`) VALUES ('$restaurant', '$Fname', '$dec', '$price');";
    $result = mysqli_query($conn, $sql);
    $showMwssage = true;
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
        <h2>Item added Successful</h2>
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
        <?php include("adminPartiols/sidePenal.php"); ?>

        <div class="admin-container">
            <h1>Food Items</h1>

            <div class="add-food-form">
                <h2>Add Food Item</h2>
                <form method="POST" enctype="multipart/form-data"> <!-- Form to add food item -->
                    <input type="text" name="foodName" placeholder="Enter Food Name">
                    <input type="text" name="description" placeholder="Enter Description">
                    <input type="number" name="price" placeholder="Enter Price">
                    <select name="restorent">
                        <?php
                        $sql = "SELECT * FROM `restaurants`;";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $row['RestaurantID'] . '">' . $row['Name'] . '</option>';
                        }
                        ?>

                    </select>
                    <input type="file" name="image">
                    <button type="submit" value="Upload Image" name="submit">Add Food Item</button>
                </form>
            </div>
        </div>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
            $restaurant = $_POST['restorent'];
            $targetDirectory = "../img/Hotels/$restaurant/";
        
            if (!file_exists($targetDirectory)) {
                mkdir($targetDirectory, 0777, true);
            }
        
            // Define a custom filename here (you can change this)
            $customFileName = $Fname; // Replace with your preferred filename
            $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
            $targetFile = $targetDirectory . $customFileName . ".$imageFileType";
        
            // Check if the image file is an actual image or a fake image
            $check = getimagesize($_FILES["image"]["tmp_name"]);
        
            $uploadOk = true; // You might set this to false based on your validation checks
        
            if ($check !== false) {
                // Your additional checks for file type, size, etc. here
                // ...
        
                // If $uploadOk is still true, attempt to upload the file
                if ($uploadOk) {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {

                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            } else {
                echo "File is not an image.";
                $uploadOk = false;
            }
        }
        
        ?>


</body>

</html>