<?php
  include("./includes/header.php");
  include("./connect.php");

  if(isset($_POST['submit'])){
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);
      $c_password = mysqli_real_escape_string($conn, $_POST['c_password']);


      $emailverify = "SELECT * from user where email = '$email'";
      $emailquery = mysqli_query($conn, $emailverify);
      $emailcount = mysqli_num_rows($emailquery);

      
      if($emailcount>0){
          echo ("email already exist ");
      }else{
          if($password != $c_password){
              echo ("password not match");
          }else{
              $sql = "INSERT INTO user(`name`,`email`,`password`) VALUES('$name','$email','$password')";
              $result = mysqli_query($conn,$sql);
              header('location:login.php');
              if($result){
              echo "Data added";
              }else{
              mysqli_error($conn);
              }
          }

      }
  }

    
?>


<div class="container mt-5">
    <div class="row">
        <h1>Registration Page</h1>
        <hr>
        <form method="post">
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control"  name="name" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control"  name="email" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control"  name="password" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label"> Confirm Password</label>
              <input type="password" class="form-control" name="c_password" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>   
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
