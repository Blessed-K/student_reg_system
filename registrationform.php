<?php
if(isset($_POST['registerBtn'])){
    include('conn.php');
    $user_fullname=$_POST['user_fullname'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];

   $sql="INSERT INTO `users_table` (`id`, `fullname`, `email`, `password`) VALUES ('', '$user_fullname', '$user_email', '$user_password')";
   $query=mysqli_query($conn,$sql);
   if($query){
      ?>
      <script>

          window.alert('registration is successful')
      </script>
    
      <?php
   }else{
    ?>
    <script>

        window.alert('registration failed')
    </script>
  
    <?php
   }
}

?>


<!DOCTYPE html>
<html>
    <head>
     <title>Registration Form</title>
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
                  <p>Already have an account<br>Login here</p>
                  <p>
                      <a href="index.php" type="button" class="btn signUpBtn">Login</a>
                  </p>
                 </div>
                 <!--end of first column-->
                 <!--second column-->
                 <div class="col-sm-5 col-right">
                     <h2>Registration</h2>
                     <form action="" method="post">
                        <p>
                            <label class="form-label">Fullname<span>*</span></label>
                            <input type="text" name="user_fullname" class="form-control form-control-main" placeholder="fullname" required;>
                        </p>
                         <p>
                             <label class="form-label">Email Address<span>*</span></label>
                             <input type="email" name="user_email" class="form-control form-control-main" placeholder="Email Address" required;>
                         </p>
                         <p>
                            <label class="form-label">Password<span>*</span></label>
                            <input type="password" name="user_password" class="form-control form-control-main" placeholder="Password" required;>
                        </p>
                        <p>
                            <button type="submit" name="registerBtn" class="btn loginBtn">Create an account</button>
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