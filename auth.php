<?php
// session_start();

if(!isset($_SESSION['auth'])){
    $_SESSION['status'] = "You are not logged in";
    header("location:login.php");
    exit(0);
}
// elseif(isset($_SESSION['auth'])){
//     header("location:getData.php");

// }
?>
