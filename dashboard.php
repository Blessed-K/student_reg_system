<?php

//login code
include("conn.php");
session_start();
$fullname=$_SESSION['fullname'];
$email=$_SESSION['email'];
$password=$_SESSION['password'];
$id=$_SESSION['id'];
//update code
if(isset($_POST['userUpdateBtn'])){
   $user_id=$_POST['user_id'];
   $user_fullname=$_POST['user_fullname'];
   $user_email=$_POST['user_email'];
   $user_password=$_POST['user_password'];

   //sql statement
 $sql="UPDATE `users_table` SET `fullname` = '$user_fullname', `email` = '$user_email', `password` = '$user_password' WHERE `users_table`.`id` = $user_id";
  $updateqry=mysqli_query($conn,$sql);
if($updateqry==true){
    ?>
    <script>

        windows.alert("Data has been updated successfully");
        windows.location.href="index.php"
    </script>
    <?php
}
else{
    ?>
    <script>

        windows.alert("Could not update");
    </script>
    <?php
}

}
//logout code
if(isset($_POST['btnLogout'])){
    session_destroy();
    header("location:index.php");
}

//CODE FOR ADDING STUDENT  TO THE DATABASE
if(isset($_POST['addstudentBtn'])){
   $std_name= $_POST['std_name'];
   $std_email= $_POST['std_email'];
   $std_phone= $_POST['std_phone'];
   $std_county= $_POST['std_county'];
   $std_sub_county= $_POST['std_sub_county'];
   $std_class= $_POST['std_class'];
   $std_stream= $_POST['std_stream'];
   $std_town= $_POST['std_town'];

   $dup_sql="SELECT * FROM `std_reg_table` WHERE `email`='$std_email' ";
  $dup_query=mysqli_query($conn,$dup_sql);
   if( mysqli_num_rows($dup_query)>0){
       ?>
       <script>
       alert("duplicate record");

       </script>
       <?php
   } else{
    if(!empty($std_name)&& !empty($std_email) && !empty($std_phone)&& !empty($std_county) && !empty($std_sub_county) && !empty($std_class) && !empty($std_stream) && !empty($std_town) ){
        if(strlen($std_name)>=3 && strlen($std_email)>=3  && strlen($std_phone)>=3 && strlen($std_county)>=3  && strlen($std_sub_county)>=3  && strlen($std_class)>=3  && strlen($std_stream)>=3  && strlen($std_town)>=3 ){
            if(filter_var($std_name,FILTER_VALIDATE_INT)==FALSE && filter_var($std_sub_county,FILTER_VALIDATE_INT)==false && filter_var($std_town,FILTER_VALIDATE_INT)==false){
                if(filter_var($std_email,FILTER_VALIDATE_EMAIL)==TRUE &&  preg_match('/^[0-9]{10}+$/',$std_phone)==TRUE){
                    $std_sql="INSERT INTO `std_reg_table` (`id`, `fullname`, `email`, `phone`, `county`, `sub_county`, `town`, `std_class`, `stream`) VALUES (NULL, '$std_name', '$std_email', '$std_phone', '$std_county', '$std_sub_county', '$std_town', '$std_class', '$std_stream')";
                    $std_query=mysqli_query($conn,$std_sql);
                  
                    if($std_query=true){
                        ?>
                        <script>
                          window.alert('Data saved successfully');
                            </script>
                        <?php
                    }else{
                      ?>
                      <script>
                        window.alert('Data not saved');
                          </script>
                      <?php 
                    } 
        
                }else{
                    ?>
                    <script>
                        window.alert('wrong format for email or phone');
                    </script>
                    <?php
                }
            }else{
                ?>
                <script>
                    alert("Ensure that fullname,subcounty and town are not integers");
                </script>
                <?php
            }
           
           
          
        }
        else{
            ?>
              <script>
                window.alert('Ensure that all character length is greater');
                  </script>
              <?php 
        } 
     
      
       }else{
        ?>
        <script>
        window.alert('ensure that no field is empty');
        </script>
        <?php
       }
   }
     
  
    /*
   if(!empty($std_name)&& !empty($std_email) && !empty($std_phone)&& !empty($std_county) && !empty($std_sub_county) && !empty($std_class) && !empty($std_stream) && !empty($std_town) ){
    if(strlen($std_name)>=3 && strlen($std_email)>=3  && strlen($std_phone)>=3 && strlen($std_county)>=3  && strlen($std_sub_county)>=3  && strlen($std_class)>=3  && strlen($std_stream)>=3  && strlen($std_town)>=3 ){
        if(filter_var($std_name,FILTER_VALIDATE_INT)==FALSE && filter_var($std_sub_county,FILTER_VALIDATE_INT)==false && filter_var($std_town,FILTER_VALIDATE_INT)==false){
            if(filter_var($std_email,FILTER_VALIDATE_EMAIL)==TRUE &&  preg_match('/^[0-9]{10}+$/',$std_phone)==TRUE){
                $std_sql="INSERT INTO `std_reg_table` (`id`, `fullname`, `email`, `phone`, `county`, `sub_county`, `town`, `std_class`, `stream`) VALUES (NULL, '$std_name', '$std_email', '$std_phone', '$std_county', '$std_sub_county', '$std_town', '$std_class', '$std_stream')";
                $std_query=mysqli_query($conn,$std_sql);
              
                if($std_query=true){
                    ?>
                    <script>
                      window.alert('Data saved successfully');
                        </script>
                    <?php
                }else{
                  ?>
                  <script>
                    window.alert('Data not saved');
                      </script>
                  <?php 
                } 
    
            }else{
                ?>
                <script>
                    window.alert('wrong format for email or phone');
                </script>
                <?php
            }
        }else{
            ?>
            <script>
                alert("Ensure that fullname,subcounty and town are not integers");
            </script>
            <?php
        }
       
       
      
    }
    else{
        ?>
          <script>
            window.alert('Ensure that all character length is greater');
              </script>
          <?php 
    } 
 
  
   }else{
    ?>
    <script>
    window.alert('ensure that no field is empty');
    </script>
    <?php
   }
   */


}




 //CODE FOR UPDATING DATA FROM DATABSE
 if(isset($_POST['std_update_btn'])){
     $std_view_id=$_POST['std_view_id'];
    $std_view_fullname=$_POST['std_view_name'];
    $std_view_email=$_POST['std_view_email'];
    $std_view_phone=$_POST['std_view_phone'];
    $std_view_county=$_POST['std_view_county'];
    $std_view_subcounty=$_POST['std_view_subcounty'];
    $std_view_town=$_POST['std_view_town'];
    $std_view_class=$_POST['std_view_class'];
    $std_view_stream= $_POST['std_view_stream'];
    
   $std_update_sql= "UPDATE `std_reg_table` SET `fullname` = '$std_view_fullname', `email` = '$std_view_email', `phone` = '$std_view_phone', `county` = '$std_view_county', `sub_county` = '$std_view_subcounty', `town` = '$std_view_town', `std_class` = '$std_view_class', `stream` = '$std_view_stream' WHERE `std_reg_table`.`id` = $std_view_id ";
    $std_update_query=mysqli_query($conn,$std_update_sql);
    if($std_update_query=true){
       ?>
       <script>
           window.alert('data has been updated successfully');
       </script>
       <?php
    }
    else{
        ?>
       <script>
           window.alert('data could not be updated');
       </script>
       <?php
    }

}
//CODE FOR DELETING RECORD FROM DATABASE
if(isset($_POST['std_del_btn'])){

    $std_del_id=$_POST['std_del_id'];
    $std_del_sql="DELETE FROM `std_reg_table` WHERE `std_reg_table`.`id` =$std_del_id ";
    $std_del_query=mysqli_query($conn,$std_del_sql);
    if($std_del_query="true"){
        ?>
        <script>
            window.alert('data has been deleted successfully');
        </script>
        <?php
     }
     else{
         ?>
        <script>
            window.alert('data could not be deleted');
        </script>
        <?php
    }
}

//PAGINATION
if(isset($_GET['page'])){
    $page=$_GET['page'];
}else{
    $page=1;
}
if(isset($_POST['filter_btn'])){
    $num_per_page=$_POST['num_per_page'];
    $start_from=($page-1)*$num_per_page;
    $allstudents="SELECT * FROM `std_reg_table` LIMIT $start_from, $num_per_page";
$all_std_query=mysqli_query($conn,$allstudents);
}else{
    $num_per_page=05;
    $start_from=($page-1)*05;
    
    
    //CODE FOR DISPLAYING DATA FROM THE DATABASE
    $allstudents="SELECT * FROM `std_reg_table` LIMIT $start_from, $num_per_page";
    $all_std_query=mysqli_query($conn,$allstudents);
    
}

//PHP SEARCH
if(isset($_POST['btn_search'])){
    $search=$_POST['search'];
    $allstudent="SELECT * FROM `std_reg_table` WHERE `fullname` LIKE '%$search%' OR `email` LIKE '%$search%' OR `phone` LIKE '%$search%' OR `county` LIKE '%$search%'OR `sub_county` LIKE '%$search%'OR `town` LIKE '%$search%' OR `std_class` LIKE '%$search%'OR `stream` LIKE '%$search%'";
    $all_std_query=mysqli_query($conn,$allstudent);
}



?>
<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="shortcut icon" type="imange/png" href="images/favicon.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   <script src="https://use.fontawesome.com/185514fac8.js"></script>
   <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="main_content">
            <!--main body-->
            <div class="main-body">
                <div class="card">
                    <div class="card-body">
                        <!--table 1-->
                        <table class="table table-sm table-responsive">
                            <tr>
                                <td>
                                    <h3>Registration System</h3>
                                    <p style="color: #3d5c5c"><b>Your login as:</b>
                                    <?php
                                        if(!empty($fullname)){
                                            echo $fullname;
                                        }
                                        ?>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal"><i class="fa fa-sign-out"aria-hidden="true"></i>Log out</a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#addstudentModal"><i class="fa fa-user-plus" aria-hidden="true"></i>Add Student</a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#viewprofileModal"><i class="fa fa-eye" aria-hidden="true"></i>View Profile</a>
                                </p>
                                </td>

                                <!--search code-->
                                <td style="padding-top:10px;">
                                <form method="POST" action="">
                                  <div class="input-group">
                                      <input type="text" class="form-control" name="search" placeholder="search">
                                      <button type="btn btn-outline-secondary" name="btn_search" type="submit">Search</button>
                                    </div>
                                    </form>
                                    </td>
                                <!--end of search code--> 
                                <td>
                                    <?php
                                   $slct_qry="SELECT * FROM `std_reg_table`";
                                       $record=mysqli_query($conn,$slct_qry);
                                      $count=mysqli_num_rows($record)
                                    ?>
                                    <h4>Total Record: <?php echo $count;?></h4>
                                </td>
                               
                               <!--show-->
                                <td>
                                    <form method="POST" action="">
                                    <div class="input-group">
                                        <input type="number" name="num_per_page" class="form-control" style="width:60px" min="5" max="100" step="10" value="5">
                                        <button type="btn btn-outline-secondary" name="filter_btn" style="width:70px" type="submit">Show</submit>
                                    </div>
                                    </form>
                                </td>

                            </tr>
                        </table>
                        <!--table 2-->
                        <table class="table table-sm table-bordered table-responsive">
                            <thead style="background-color:#2aa15f;color:white;">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">FullName</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">County</th>
                                    <th scope="col">Sub county</th>
                                    <th scope="col">Town</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Stream</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                               while($std_row=mysqli_fetch_array($all_std_query)){
                                   ?>
                                   <tr>
                                     <td><?php echo$std_row['id']?></td>
                                     <td><?php echo$std_row['fullname']?></td>
                                     <td><?php echo$std_row['email']?></td>
                                     <td><?php echo$std_row['phone']?></td>
                                     <td><?php echo$std_row['county']?></td>
                                     <td><?php echo$std_row['sub_county']?></td>
                                     <td><?php echo$std_row['town']?></td>
                                     <td><?php echo$std_row['std_class']?></td>
                                     <td><?php echo$std_row['stream']?></td>

                                <td>

                                <a data-bs-toggle="modal" data-bs-target="#studentUpdateModal<?php echo$std_row['id']?>" class="btn btn-sm btn-success"><i class="fa fa-eye" aria-hidden="true"></i>View</a>
                               <a data-bs-toggle="modal" data-bs-target="#studentDeleteModal<?php echo$std_row['id']?>" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>Delete</a>
                            </td>
                               </tr>

                               <!--MODAL FOR DELETE-->
                               <div class="modal fade" tabindex="1" id="studentDeleteModal<?php echo$std_row['id']?>" aria-labelledby="exampleModallabel" aria-hidden="true">
                               <div class="modal-dialog">
                                   <div class="modal-content">
                                    <div class="modal-header">
                                        <h5>Are you sure you want to delete this record ?</h5>
                                    </div>
                                     <form action="" method="POST">
                                    <input type="text" name="std_del_id" hidden="true" class="form-control" value="<?php echo$std_row['id']?>">
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>Close</button>
                                   <button type="submit" name="std_del_btn" class="btn btn-success btn-sm"><i class="fa fa-paper-plane" aria-hidden="true"></i>Delete</button>
                                    </div>
                               </form>
                                </div>
                                </div>
                              </div>
                               
                               
                               
                               
                               <!--modal for update-->
                               <div class="modal fade" id="studentUpdateModal<?php echo$std_row['id']?>" tabindex="1" aria-labelledby="exampleModallabel" aria-hidden="true">
                                   <div class="modal-dialog">
                                   <div class="modal-content">
                                   <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModallabel">Update:<?php echo$std_row['fullname']?></h5>
                                   </div>
                                   <form method="POST" action="">
                                   <div class="modal-body">
                                  <input type="text" name="std_view_id" hidden="true" class="form-control" value=<?php echo$std_row['id']?>>
                                   <div class="mb-3 row">
                                        <label for="fullname" class="col-sm-3 col-form-label">Fullname</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="std_view_name" value="<?php echo$std_row['fullname']?>" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="fullname" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="std_view_email" value="<?php echo$std_row['email']?>"required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="fullname" class="col-sm-3 col-form-label">phone</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="std_view_phone" value="<?php echo$std_row['phone']?>"required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="fullname" class="col-sm-3 col-form-label">County</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" name="std_view_county" required>
                                             <option value="<?php echo$std_row['county']?>"><?php echo$std_row['county']?></option>
                                             <option value="Nairobi">Nairobi</option>
                                             <option value="Kisumu">Kisumu</option>
                                             <option value="Nakuru">Nakuru</option>
                                             <option value="Narok">Narok</option>
                                             <option value="Mombasa">Mombasa</option>
                                             <option value="Machakos">Machakos</option>  
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="fullname" class="col-sm-3 col-form-label">Sub county</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="std_view_subcounty" value="<?php echo$std_row['sub_county']?>" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="fullname" class="col-sm-3 col-form-label">Town</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="std_view_town" value="<?php echo$std_row['town']?>" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="fullname" class="col-sm-3 col-form-label">Class</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" name="std_view_class" required>
                                             <option value="<?php echo$std_row['std_class']?>"><?php echo$std_row['std_class']?></option>
                                             <option value="Form one">Form one</option>
                                             <option value="Form Two">Form two</option>
                                             <option value="Form Three">Form three</option>
                                             <option value="Form four">Form four</option> 
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="fullname" class="col-sm-3 col-form-label">Stream</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" name="std_view_stream" required>
                                             <option value="<?php echo$std_row['stream']?>"><?php echo$std_row['stream']?></option>
                                             <option value="Red">Red</option>
                                             <option value="Blue">Blue</option>
                                             <option value="Green">Green</option>
                                             <option value="Yellow">Yellow</option> 
                                            </select>
                                        </div>
                                    </div> 



                                   </div>
                                   <div class="modal-footer">
                                      <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>Close</button>
                                   <button type="submit" name="std_update_btn" class="btn btn-success btn-sm"><i class="fa fa-paper-plane" aria-hidden="true"></i>Save Changes</button>
                                    </div>
                               </form>
                                   </div>
                               </div>


                               </div>
                                   <?php

                               }
                               ?>
                            </tbody>
                        </table>
                      <?php
                      $pg_query="SELECT * FROM `std_reg_table`";
                      $pg_result=mysqli_query($conn,$pg_query);
                      $total_record=mysqli_num_rows($pg_result);
                      $total_pages=ceil($total_record/$num_per_page);
                      if($page>1){
                        echo"<a href='dashboard.php?page=".($page-1)."' class='btn btn-small btn-danger'>previous</a>"; 
                      }
                      for($i=1;$i<=$total_pages;$i++){
                         echo"<a href='dashboard.php?page=".$i."' class='btn btn-small btn-success'>".$i."</a>";
                      }
                      if($i>$page){
                        echo"<a href='dashboard.php?page=".($page+1)."' class='btn btn-small btn-danger'>next</a>"; 
                      }
                      ?>

                    </div>
                    <!--logout modal-->
                    <div class="modal fade" id="logoutModal" aria-labelledby="exampleModallabel" aria aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6>Are you sure you want to log out?</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                </div>
                                <div class="content">
                               </div>
                                <!--modal footer-->
                                <form method="POST" action="">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="btnLogout" class="btn btn-sm btn-success">Log out</button>
                                </div>
                              </form>
                            </div>
                        </div>
                    </div>
                    <!--add student modal-->
                    <div class="modal fade" id="addstudentModal" aria-labelledby="exampleModallabel" aria aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #2aa15f;color:white;">
                                    <h6>Add student</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                </div>
                                <form method="POST" action="">
                                <div class="modal-content">
                                    <div class="mb-3 row">
                                        <label for="fullname" class="col-sm-3 col-form-label">Fullname</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="std_name" placeholder="fullname" >
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="fullname" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" name="std_email"placeholder="eg. you@gmail.com" >
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="fullname" class="col-sm-3 col-form-label">Phone</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="std_phone"placeholder="eg. 07xxxxxxxx" >
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="fullname" class="col-sm-3 col-form-label">County</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" name="std_county" placeholder="county">
                                             <option value="">Select your county</option>
                                             <option value="Nairobi">Nairobi</option>
                                             <option value="Kisumu">Kisumu</option>
                                             <option value="Nakuru">Nakuru</option>
                                             <option value="Narok">Narok</option>
                                             <option value="Mombasa">Mombasa</option>
                                             <option value="Machakos">Machakos</option>  
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="sub_county" class="col-sm-3 col-form-label">Sub county</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="std_sub_county"placeholder="sub county" >
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="town" class="col-sm-3 col-form-label">Town</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="std_town" placeholder="town">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="fullname" class="col-sm-3 col-form-label">Class</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" name="std_class">
                                             <option value="">Select your class</option>
                                             <option value="Form one">Form one</option>
                                             <option value="Form Two">Form two</option>
                                             <option value="Form Three">Form three</option>
                                             <option value="Form four">Form four</option> 
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="fullname" class="col-sm-3 col-form-label">Stream</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" name="std_stream" >
                                             <option value="">Select your stream</option>
                                             <option value="Red">Red</option>
                                             <option value="Blue">Blue</option>
                                             <option value="Green">Green</option>
                                             <option value="Yellow">Yellow</option> 
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--modal footer-->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="addstudentBtn"class="btn btn-sm btn-success">Add student</button>
                                </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                    <!--End of student modal-->

                     <!--add student modal-->
                     <div class="modal fade" id="viewprofileModal" aria-labelledby="exampleModallabel" aria aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #2aa15f;color:white;">
                                    <h6> Profile:
                                        <?php
                                        if(!empty($fullname)){
                                            echo $fullname;
                                        }
                                        ?>
                                        </h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                </div>
                                <form method="POST" action="">
                                <div class="modal-content">
                                    <input type="text" name="user_id" class="form-control"  value="<?php if(!empty($id)){echo$id;}?>" hidden="true">
                                    <div class="mb-3 row">
                                        <label for="fullname" class="col-sm-3 col-form-label">Fullname</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="user_fullname" value="<?php if(!empty($fullname)){echo$fullname;}?>" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="fullname" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" name="user_email" value="<?php if(!empty($email)){echo$email;}?>" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="fullname" class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="user_password" value="<?php if(!empty($password)){echo$password;}?>" required>
                                        </div>
                                    </div>
                                  </div>
                                <!--modal footer-->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="userUpdateBtn" class="btn btn-sm btn-success">Update</button>
                                </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                    <!--End of student modal-->
                </div>
            </div>
        </div>

    </body>
</html>