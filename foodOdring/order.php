<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="utiliti.css">
    <title>Orders</title>
</head>


<body>
    <div class="contener" id="orderD">
        <div class="Box">
            <div class="nameBox">
                <img class="product" src="img/hotels/' . $row['RestaurantID'] . '/' . $row['Name'] . '.jpg" alt="img" width="500" height="600">
                <p>' . $name . '</p>
            </div>



            <div class="box2">
                <div id="i">
                    <div class="spasing">
                        <label>Price:</label>
                        <input id="Price" class="item inputBox" type="text" size="3" value="' . $price . '" readonly="readonly">
                    </div>
                    <div class="spasing">
                        <label>Enter your Quantity here:</label>
                        <input id="Qua" class="item inputBox" type="text" size="3" value="1">
                    </div>
                    <button id="cOrder" class="buttonBox" onclick="MyFunction()">Confirm Order</button>
                </div>
                <form method="post">
                    <div id="hiden">
                        <div class="spasing">
                            <label>Yout total Price is:</label>
                            <input id="tPrice" class="item inputBox" type="text" size="3" readonly="readonly">
                        </div>
                        <div class="spasing">
                            <button onclick="downloadFile()" type="Submit" id="pOrder" class="buttonBox">Click hear to confor your order</button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>

    </div>
</body>

</html>

