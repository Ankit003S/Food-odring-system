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
    <div class="screan">

        <?php include("partials/nev.php") ?>
        <?php
        include('connect.php');
        $sql = "SELECT * FROM `orders`";
        $result = mysqli_query($conn, $sql);
        $showItums = true;

        ?>
        <div class="admin-container">
            <?php
            if ($showItums) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<ul class="list">
                  <li class="item">
                    <div class="details">
                      <p>Order Date: ' . $row['OrderDate'] . ' </p>
                      <p>Total: ₹' . $row['TotalAmount'] . '</p>
                    </div>
                  </li>
          
                  <!-- Add more order items with details -->
                </ul>';
                }
            }
            ?>

        </div>
    </div>
</body>

</html>