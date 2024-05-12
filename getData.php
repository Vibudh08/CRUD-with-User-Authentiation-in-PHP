<?php
session_start();
include("connect.php");
include("./includes/header.php");
include("./auth.php");

if(isset($_POST['name'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $course = $_POST['course'];
    
    $sql = "INSERT INTO crud (name,age,course) VALUES('$name','$age','$course') ";
    $result = mysqli_query($conn,$sql);
    if($result){
        // echo "Data inserted";
    }else{
        die(mysqli_error($conn));
    }
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
                <h2 class="alert alert-success text-center">Add New Student</h2>
                <form method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" />
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="text" class="form-control" id="age" name="age" />
                    </div>
                    <div class="mb-3">
                        <label for="course" class="form-label">Course</label>
                        <input type="text" class="form-control" id="fees" name="course" />
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="submit" name="logout"  class="btn btn-primary float-end" ><a href="logout.php" style="color: white; text-decoration: none"> Logout</a></button>
                </form>
            </div>
            <div class="col-sm-6 mt-5">
                <h2 class="alert alert-danger text-center">List of Student</h2>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Age</th>
                            <th scope="col">Course</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM crud";
                        $result = mysqli_query($conn,$sql);

                        while($row = $result-> fetch_assoc()){
                            $id = $row['id'];
                            $name = $row['name'];
                            $age = $row['age'];
                            $course = $row['course'];
                            echo '<tr>
                                    <td>'.$id.'</td>
                                    <td>'.$name.'</td>
                                    <td>'.$age.'</td>
                                    <td>'.$course.'</td>
                                    <td>
                                        <button type="submit" class="btn">
                                            <a href="updateData.php?id='.$id.'">
                                                <i class="fas fa-pen-square text-info"></i>
                                            </a>
                                        </button>
                                        <button type="submit" class="btn">
                                            <a href="deleteData.php?id='.$id.'">
                                                <i class="fas fa-trash text-danger"></i>
                                            </a>
                                        </button>
                                    </td>
                                </tr>';
                        }

                        ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>
<script src="./public/javascript/bootstrap.js"></script>
<script src="./public/javascript/all.js"></script>

</html>