<?php
include("connect.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $sql = "DELETE FROM crud where id= $id";
    $result = mysqli_query($conn,$sql);
    
    if($result){
        // echo "Data deleted";
        header("location:getData.php");
    }else{
        die(mysqli_error($conn));
    }
}
?>