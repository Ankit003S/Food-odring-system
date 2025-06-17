<?php
session_start();
// $_SESSION['user']="shjadf";
if(!isset($_SESSION['loggedin'])){
    header('Location: login.php');
}
?>