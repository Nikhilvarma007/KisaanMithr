<?php 
ob_start();
// session_start();
require("connection.php");
if(isset($_SESSION['id']))
{
    session_start();
    session_destroy();
} 
 
if(isset($_POST['submit']))
{ 
 // print_r($_POST);//die; 
 $email =$_POST['email'];
 $username =$_POST['username'];
 $password =$_POST['password'];
 $role = $_POST['role'];

/*    if($role == 1)    {
        $sql = "SELECT * FROM users WHERE email ='$email' and fname ='$username'  ";
        // echo $sql; die;
        $res=mysqli_query($connect,$sql);  
        $row =mysqli_fetch_assoc($res);
        $rowa =mysqli_num_rows($res);

                //SELECT `user_id`, `role_id`, `fname`, `email`, `password` FROM `users` WHERE 1
        if($rowa==1)    {  
          $sql = "UPDATE users set password='$password' WHERE id='".$row['id']."' ";
                   // echo $sql; die;
                   $res = mysqli_query($connect,$sql);
                   if($res){
                        echo "<script>alert('Changed Password .. Login Now');</script>";
                   }
            }else {
              echo  "<script>alert('error');</script>";
        }
    }else */ 
    if($role ==2)    {
                $sql = "SELECT * FROM warehouse  WHERE (email ='$email' OR phone = '$email') and owner ='$username' ";
                // echo $sql; die;
                
                $res =mysqli_query($connect,$sql);
                $row =mysqli_fetch_assoc($res);
                 $rowa =mysqli_num_rows($res);
               // SELECT `id`, `wid`, `role_id`, `owner`, `phone`, `email`, `password`, `rent_day`, `rent_bag`, `w_type`, `space_bags`, `place` FROM `warehouse` WHERE 1

           if($rowa ==1)
                {
          $sql = "UPDATE warehouse set password='$password' WHERE id='".$row['id']."' ";
                   // echo $sql; die;
                   $res = mysqli_query($connect,$sql);
                   if($res){
                        echo "<script>alert('Changed Password .. Login Now');</script>";
                   }                 
                } else{                
                    echo  "<script>alert('error');</script>";                  
                }
    }else if($role ==3) {
            
            $sql = "SELECT * FROM farmer  WHERE (email ='$email' OR phone = '$email') and name ='$username' ";
            // echo $sql ; die();
            $res =mysqli_query($connect,$sql);
            $row =mysqli_fetch_assoc($res);
            $rown =mysqli_num_rows($res);
             //SELECT `id`, `role`, `name`, `email`, `phone`, `password` FROM `farmer` WHERE 1
           if($rown == 1 )
                {
                   $sql = "UPDATE farmer set password='$password' WHERE id='".$row['id']."' ";
                   // echo $sql; die;
                   $res = mysqli_query($connect,$sql);
                   if($res){
                        echo "<script>alert('Changed Password .. Login Now');</script>";
                   }

                  //echo "<script>alert('SUBMITTED');</script>";
                    // header('location:dashboard.php');
                }  else{
                  echo  "<script>alert('error');</script>";
                }
    }
}

 
?>
<!DOCTYPE html>
<html lang="en">


<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"   content="IE=edge"/>        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link href="assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <style type="text/css">
            html,body{
                height: 100%;
                background-image: url(images/bgimg.jpg);
                 background-repeat: no-repeat;
    background-size: 100% 100%;
            }
        </style>
    </head>
    <body class="bg-light">
<?php
/*session_start();
*/
require 'connection.php';
?>
<nav class="navbar ">
  <!-- Navbar content -->
   <!-- <a class="navbar-brand" style="color: white" href="#">Features</a> -->
   <h1 ><center><a class="navbar-brand" href="index.php"><span style="font-size: 40px; color: white;"> Smart Management System for Food Storage and Wastage Reduction  </span> </a></center></h1>
   
</nav>
<br><br>
        <div class="misc-wrapper">
            <div class="misc-content">
                <div class="container">
                    <div class="row justify-content-center">
                   
                        <div class="col-5">
                            <div class="misc-header text-center">
                                <h1><span class="logb" style="color: white;">Change Password  <?php      ?> </span></h1>
                            </div>
<br>

                            <div class="misc-box">   
                                <form role="form" method="post" action="">
                                    <div class="form-group">                                      
                                        <!-- <label  for="exampleuser1">Email</label> -->
                                        <!--<?php print_r($_SESSION);?> -->
                                        <div class="group-icon">
                                            <input id="exampleuser1" name="email" type="text" placeholder="Email" class="form-control" required="">
                                        <span class="icon-user text-muted icon-input"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">                                      
                                        <!--<?php print_r($_SESSION);?> -->
                                        <div class="group-icon">
                                            <input id="exampleuser1" name="username" type="text" placeholder="Username" class="form-control" required="">
                                        <span class="icon-user text-muted icon-input"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <!-- <label for="exampleInputPassword1">Role</label> -->
                                        <div class="group-icon">
                                <select id="exampleInputPassword1" name="role"  placeholder="Password"  required class="form-control">
                                    <option value="">Select Role</option>
                                    <!-- <option  value="1">Admin </option> -->
                                    <option value="2">Warehouse</option>
                                    <option value="3">Farmer</option>  
                                </select>
                                        <span class="icon-user text-muted icon-input"></span>
                                        </div>
                                    </div>
                                   <div class="form-group">
                                        <!-- <label for="exampleInputPassword1">Password</label> -->
                                        <div class="group-icon">
                    <input id="exampleInputPassword1" name="password" type="password" placeholder="Password"  required class="form-control">
                                        <span class="icon-lock text-muted icon-input"></span>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        
                                    </div>
                                    <hr>
                                   
                                    <button type="submit" name="submit" class="btn btn-block btn-primary">Change Your Password</button><br>
                                    <a href="stu_reg.php"> <label   class="btn btn-block btn-info">Register</a> </label>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br> <br>

        <script src="assets/lib/jquery/dist/jquery.min.js"></script>
        <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/lib/pace/pace.min.js"></script>
        <script src="assets/lib/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
        <script src="assets/lib/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/lib/nano-scroll/jquery.nanoscroller.min.js"></script>
        <script src="assets/lib/metisMenu/metisMenu.min.js"></script>
        <script src="assets/js/custom.js"></script>
		
    </body>

</html>
