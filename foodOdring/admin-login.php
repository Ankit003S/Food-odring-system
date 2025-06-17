<?php
$wrongEmail= false;
$wrongPass= false;
            //Checking request method.
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                include('connect.php');
                //saving email and pass gating from web page.
                $email = $_POST["email"];
                $pass = $_POST["pass"];
                //gating data from database.
                $sql = "SELECT * FROM `Admin` WHERE AdminEmail= '$email';";
                $result = mysqli_query($conn, $sql);
                //checking number of resule gating from database.
                $num = mysqli_num_rows($result);
                if ($num == 1) {
                    // gating data into a veriable named $roe
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Macking passwort to database password.
                        if ($pass==$row['password']) {
                            session_start();
                            $login = true;
                            $_SESSION['adminLoggedin'] = true;
                            $_SESSION['user'] = $email;
                            header('Location: admin/Dashboard.php');
                        } else {
                            // if password is wrong the this message will sow.
                            $wrongPass= true;
                        }
                    }
                }else{
                    $wrongEmail= true;
                }
            }

            ?>

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
<?php
    if ($wrongEmail) {
        echo '<div class="popup-overlay" id="popup">
        <div class="popup-content">
        <h2>Login feald The email is wrong!</h2>
        </div>
    </div>
    <script>
        setTimeout(hidePopup, 3000);
        function hidePopup() {
            document.getElementById("popup").style.display = "none";
            }
    </script>
            ';
            $wrongEmail=false;
    };
    if ($wrongPass) {
        echo '<div class="popup-overlay" id="popup">
        <div class="popup-content">
        <h2>Login feald The Password is wrong!</h2>
        </div>
    </div>
    <script>
        setTimeout(hidePopup, 3000);
        function hidePopup() {
            document.getElementById("popup").style.display = "none";
            }
    </script>
            ';
            $wrongEmail=false;
    };
    ?>
    <div class="contener">
        <div class="Box">
            <form method="post">
                <div class="spasing">
                    <label>Admin User Name:</label>
                    <input class="inputBox" type="text" name="email">
                </div>
                <div class="spasing">
                    <label>Password</label>
                    <input class="inputBox" type="password" name="pass">
                </div>
                <div class="loginBtn">
                        <button class="buttonBox" >Log In</button>
                        <p><a href="logIn.php">Click Here</a> to Log in.</p>
                    </div>
            </form>
        </div>
    </div>
</body>

</html>