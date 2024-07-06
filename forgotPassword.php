<!DOCTYPE html>
<html>
    <head>
     <title>Forgot Password Form</title>
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
                  <p>Already have an account account ?<br>login here</p>
                  <p>
                      <a href="index.php" type="button" class="btn signUpBtn">Login</a>
                  </p>
                 </div>
                 <!--end of first column-->
                 <!--second column-->
                 <div class="col-sm-5 col-right">
                     <h2>Forgot Password</h2>
                     <form>
                         <p>
                             <label class="form-label">Email Address<span>*</span></label>
                             <input type="email" name="email" class="form-control form-control-main" placeholder="Email Address" required;>
                         </p>
                         
                        <p>
                            <button type="submit" class="btn loginBtn">Reset Password</button>
                        </p>
                        <p>
                            <a href="registrationform.php" type="button" class="btn loginBtn">Create Account</a>
                        </p>
                        
                     </form>

                 </div>
             </div>
         </div>
     </div>
     
    </body>
</html>