<?php
include('../clg/connect.php');
include('chek-login.php');
?>
<div>
    <nev class="nev">
        <div class="nevLeft">
            <a href="home.php">
                <img class="logo" src="img/logo.jpg" alt="Logo">
            </a>
            <form action="search.php" class="searchBar">
                <input type="text" placeholder="Search Food Item" name="serchBar">
                <input type="submit" name="btn1" value="Search">
            </form>
        </div>
        <div class="nevRight">
            <!-- <form>
                    <input type="button" value="Log In">
                    <input type="button" value="Sine Up">
                </form> -->
            <ul>
                <li><a href="ufood.php" class="linkss">Food</a></li>
                <li><a href="cart.php" class="linkss">Cart</a></li>
                <li><a href="uorder.php" class="linkss">Order</a></li>
                <li><a href="logout.php" class="linkss">Logout</a></li>
            </ul>
        </div>
    </nev>
</div>