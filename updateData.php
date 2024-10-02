<?php
include("connect.php");
include("./includes/header.php");
// include("./auth.php");


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * from crud where id = $id";
    $result = mysqli_query($conn,$sql);
    $row = $result -> fetch_assoc();
    
    $name = $row['name'];
    $age = $row['age'];
    $course = $row['course'];
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/bootstrap.css">
    <link rel="stylesheet" href="./public/css/all.css">
    <title>CRUD</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 mt-5">
                <h2 class="alert alert-success text-center">
                    Update Student
                </h2>
                <form method="post">
                    <div class=" mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name?>" />
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="text" class="form-control" id="age" name="age" value="<?php echo $age?>" />
                    </div>
                    <div class="mb-3">
                        <label for="fees" class="form-label">Course</label>
                        <input type="text" class="form-control" id="course" name="course"
                            value="<?php echo $course?>" />
                    </div>

                    <button type="submit" name="update" value=" <?php echo $id?>"
                        class=" btn btn-warning">Update</button>
                    <button type="submit" class=" btn btn-secondary "><a href="./getData.php"
                            class="text-light text-decoration-none">
                            Back to
                            Home</a></button>
                </form>

                <?php
                
                if(isset($_POST['update'])){
                    $id = $_POST['update'];
                    $name = $_POST['name'];
                    $age = $_POST['age'];
                    $course = $_POST['course'];
                    $sql = "UPDATE crud set name = '$name' , age = '$age', course = '$course' where id = '$id'";
                    $result = mysqli_query($conn,$sql);
                    
                    if($result){
                        // echo "updated";
                        header("location:getData.php");
                    }else{
                        die(mysqli_error($conn));
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
<script src=" ./public/javascript/bootstrap.js"></script>
<script src="./public/javascript/all.js"></script>

</html>