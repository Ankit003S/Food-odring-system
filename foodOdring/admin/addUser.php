<?php
$showMwssage= false;
//Checking if usernaem is empty or not.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include('../connect.php');
    $name = $_POST["uName"];
    $email = $_POST["email"];
    $pass_hass = password_hash(($_POST["pass"]),   PASSWORD_DEFAULT);

    // Sendind data to the database.
    $sql = "INSERT INTO `customers` (`FirstName`, `Email`, `Password`) VALUES ('$name', '$email', '$pass_hass');";
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
        <h2>User added Successful</h2>
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
        <?php include("adminPartiols/sidePenal.php") ?>

        <div class="admin-container">
            <h1>Add User</h1>
            <div>
                <form class="add-food-form" method="POST">
                        <input type="text" name="uName" placeholder="Enter Name">
                        <input type="email" name="email" placeholder="Enter Email">
                        <input type="password" name="pass" placeholder="Enter Password">
                        <button type="submit">Add User</button>
                    </form>
            </div>
        </div>
    </div>



    
</body>

</html>