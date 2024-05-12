<?php
    session_start();
    include("./includes/header.php");
    include("./connect.php");
    if(isset($_SESSION['auth'])){
        echo "You are already logged in";
        header("location:getData.php");
    }
    
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $sql = "SELECT * from user where email = '$email'";
        $result = mysqli_query($conn,$sql);
        
        $email_count = mysqli_num_rows($result);
        
        if($email_count){

          $row = $result->fetch_assoc();
        
            $pass = $row['password'];
            
            if($password == $pass){
                $_SESSION['auth'] = true;
                header('location:getData.php');
            }else{
                echo "Password not correct";
            }
        }else{
          echo "email not registered";
        }
             
      }
      
      
      ?>

<div class="container mt-5">
    <div class="row">
        <h1>Login Page</h1>
        <hr>
        <form method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email"  aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control"  name="password" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>   
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>