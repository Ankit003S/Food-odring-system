<?php
//connecting to database.
include('connect.php');

//gating items from database.
$sql = "SELECT * FROM `restaurants`;";
$result = mysqli_query($conn, $sql);
$showItums = True;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="utiliti.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>HOME</title>
</head>

<body>

<?php
    //adding nevbar on the page.
    include('partials/nev.php');
    ?>

    <div class="slideshow-container">

        <div class="mySlides fade">
            <img src="img/slaider(1).avif" style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src="img/slaider(1).jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src="img/slaider(2).jpg" style="width:100%">
        </div>
    </div>
    <br>

    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
    <?php

        if ($showItums) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo '
            <a class="linkss" href="index.php?hotel_ID=' . $row['RestaurantID'] . '"><div class="rBox">
            <div class="rImg">
            <img src="img/hotels/' . $row['RestaurantID'] . '/DP.jpg" alt="dp" style="
            width: 254px;
            ">            </div>
            <div class="rDe">

                <h1>' . $row['Name'] . '</h1>
                <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </diV>
                <span>Phone No. ' . $row['Phone'] . '</span>
                <span>Address. ' . $row['Address'] . '</span>

                <p>' . $row['Description'] . '</p>
            </div>
            </div></a>
            ';
        }
    }
    ?>

    <?php
    //adding futer on the page.
    include('partials/futer.php')
    ?>

</body>

<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        setTimeout(showSlides, 5000); // Change image every 2 seconds
    }
</script>


</html>