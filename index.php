<?php
if(isset($_POST['loginBtn'])){
    include('conn.php');
    $email=$_POST['user_email'];
    $password=$_POST['user_password'];
   //WRITE SQL STATEMENT.
   $sql="SELECT * FROM `users_table` WHERE `email`='$email'AND `password`='$password'";
   $query=mysqli_query($conn,$sql);

   $row=mysqli_fetch_array($query);
   $num_row=mysqli_num_rows($query);
   if($num_row>0){
       session_start();
       $_SESSION['id']=$row['id'];
       $_SESSION['fullname']=$row['fullname'];
       $_SESSION['email']=$row['email'];
       $_SESSION['password']=$row['password'];
       header('location:dashboard.php');
   }else{
      ?>
      <script>
          window.alert("failed to login")
      </script>
      <?php
   }
}
?>
<!DOCTYPE html>
<html>
    <head>
     <title>Login</title>
     <link rel="shortcut icon" type="imange/png" href="images/favicon.png">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/185514fac8.js"></script>
<link rel="stylesheet" href="css/style.css">
    </head>
    <body>
     <div class="login">
         <div class="login-container">
             <div class="row">
                 <!--first column-->
                 <div class="col-sm-7 col-left">
                  <h2>Welcome !</h2>
                  <p>Create your free account<br>for free</p>
                  <p>
                      <a href="registrationform.php" type="button" class="btn signUpBtn">Sign up</a>
                  </p>
                 </div>
                 <!--end of first column-->
                 <!--second column-->
                 <div class="col-sm-5 col-right">
                     <h2>Login</h2>
                     <form method="POST" action="">
                         <p>
                             <label class="form-label">Email Address<span>*</span></label>
                             <input type="email" name="user_email" class="form-control form-control-main" placeholder="Email Address" required;>
                         </p>

                         <p>
                            <label class="form-label">Password<span>*</span></label>
                            <input type="password" name="user_password" class="form-control form-control-main" placeholder="Password" required;>
                        </p>
                        <p>
                            <button type="submit"name="loginBtn" class="btn loginBtn">Login</button>
                        </p>
                         <p>
                             <a class="forgotpassword" href="forgotPasswordForm.php">Forgot Password?</a>
                         </p>
                     </form>

                 </div>
             </div>
         </div>
     </div>
     
    </body>
</html>