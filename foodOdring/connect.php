<?php
$server= "localhost";
$username= "root";
$password= "";
$database= "fos";

$conn= mysqli_connect($server, $username, $password, $database);

if(!$conn){
    echo "error!";
}


?>