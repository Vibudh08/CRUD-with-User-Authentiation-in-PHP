<?php
$host = "localhost";
$username = "root";
$password = null;
$database = "crud_with_php";

$conn = new mysqli($host, $username, $password, $database);

if($conn){
    // echo "Connected";
}else{
    die(mysqli_error($conn));
}
?>