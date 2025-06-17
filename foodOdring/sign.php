<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="utiliti.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="contener">
        <div class="Box">
            <form method="post">
                <div class="spasing">
                    <label>User Name:</label>
                    <input class="inputBox" type="text" name="uName">
                </div>
                <div class="spasing">
                    <label>Email:</label>
                    <input class="inputBox" type="email" name="email">
                </div>
                <div class="spasing">
                    <label>Password</label>
                    <input class="inputBox" type="password" name="pass">
                </div>
                <div class="spasing">
                    <label>Confirm Password</label>
                    <input class="inputBox" type="password" name="cPass">
                </div>
                
                <div class="loginBtn">
                    <button class="buttonBox">Sign UP</button>
                    <p><a href="logIn.php">Click Here</a> to Log in.</p>
                </div>
        </form>
        <?php
            //Checking if usernaem is empty or not.
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["uName"])) {
                echo "<div><p class='error'>Plese enter a veled user name</p></div>";
                exit();
            }
            //checking if email is valide or not.
            if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                echo "<div><p class='error'>Plese enter a veled email id</p></div>";
                exit();
            }
            include('connect.php');
            $name = $_POST["uName"];
            $email = $_POST["email"];

            $sql = "SELECT * FROM `customers` WHERE Email= '$email';";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
                if ($num > 0) {
                    echo '<div class="popup-overlay" id="popup">
                    <div class="popup-content">
                    <h2>Email already exist !</h2>
                    </div>
                </div>
                <script>
                    setTimeout(hidePopup, 3000);
                    function hidePopup() {
                        document.getElementById("popup").style.display = "none";
                        }
                </script>
                        ';
                    exit();
                }

            // checking is password is 8 cherector long or not.
            if (strlen($_POST["pass"]) < 8) {
                echo '<div class="popup-overlay" id="popup">
        <div class="popup-content">
        <h2>Password must be atleast 8 character !</h2>
        </div>
    </div>
    <script>
        setTimeout(hidePopup, 3000);
        function hidePopup() {
            document.getElementById("popup").style.display = "none";
            }
    </script>
            ';
                exit();
            }

            //checking is password match to conformed password or not.
            if (($_POST["pass"]) !== ($_POST["cPass"])) {
                echo '<div class="popup-overlay" id="popup">
                    <div class="popup-content">
                    <h2>Password Does not match !</h2>
                    </div>
                </div>
                <script>
                    setTimeout(hidePopup, 3000);
                    function hidePopup() {
                        document.getElementById("popup").style.display = "none";
                        }
                </script>
                        ';
                exit();
            }

            
            $pass_hass = password_hash(($_POST["pass"]),   PASSWORD_DEFAULT);

            include('connect.php');

            // Sendind data to the database.
            $sql = "INSERT INTO `customers` (`FirstName`, `Email`, `Password`) VALUES ('$name', '$email', '$pass_hass');";
            $result = mysqli_query($conn, $sql);
            $sql = "INSERT INTO `cart` (`userEmail`) VALUES ('$email');";
            $result = mysqli_query($conn, $sql);
            echo "<div><p class='success'>Your Account is Successfully created.<br> <a href=login.php>Click Hear</a> to login.</p></div>";
        }

            ?>
        </div>
        
    </div>
</body>

</html>

