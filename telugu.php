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
 $password =$_POST['password'];
 $role = $_POST['role'];

    if($role == 1)    {
        $sql = "SELECT * FROM users WHERE email ='$email' and password ='$password'  ";
        // echo $sql; die;
        $res=mysqli_query($connect,$sql);  
        $row =mysqli_fetch_assoc($res);
                //SELECT `user_id`, `role_id`, `fname`, `email`, `password` FROM `users` WHERE 1
        if($res)    {  
                session_start();
                $_SESSION['id'] = $row['user_id'];
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['name'] = $row['fname'];
                $_SESSION['role_id'] = $row['role_id'];
                $_SESSION['email'] = $row['email'];              
                header('location:dashboard.php');
            }else {
              echo  "<script>alert('error');</script>";
        }
    }else  if($role ==2)    {
        $sql = "SELECT * FROM warehouse  WHERE email ='$email' and password ='$password' ";
        // echo $sql; die;
        
        $res =mysqli_query($connect,$sql);
        $row =mysqli_fetch_assoc($res);
         $rowa =mysqli_num_rows($res);
               // SELECT `id`, `wid`, `role_id`, `owner`, `phone`, `email`, `password`, `rent_day`, `rent_bag`, `w_type`, `space_bags`, `place` FROM `warehouse` WHERE 1

           if($res)
                {
                    session_start();                    
                $_SESSION['id'] = $row['id'];
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['wid'] = $row['wid'];
                $_SESSION['owner'] = $row['owner'];
                $_SESSION['name'] = $row['owner'];
                $_SESSION['phone'] = $row['phone'];
                $_SESSION['role_id'] = $row['role_id'];
                $_SESSION['email'] = $row['email'];          
                    $_SESSION['rent_day'] = $row['rent_day'];          
                    $_SESSION['rent_bag'] = $row['rent_bag'];          
                    $_SESSION['w_type'] = $row['w_type'];          
                    $_SESSION['space_bags'] = $row['space_bags'];          
                    $_SESSION['place'] = $row['place'];          
                    header('location:dashboard.php');                 
                } else{                
                    echo  "<script>alert('error');</script>";                  
                }
    }else if($role ==3) {
            
            $sql = "SELECT * FROM farmer  WHERE (email ='$email' OR phone = '$email') and password ='$password' ";
            // echo $sql ; die();
            $res =mysqli_query($connect,$sql);
            $row =mysqli_fetch_assoc($res);
             $rown =mysqli_num_rows($res);
             //SELECT `id`, `role`, `name`, `email`, `phone`, `password` FROM `farmer` WHERE 1
           if($rown == 1 )
                {
                    session_start();
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['fname'] = $row['name'];
                    $_SESSION['role_id'] = $row['role'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['address'] = $row['address'];
                    $_SESSION['place'] = $row['place'];
                    $sq= "SELECT * FROM prods where f_id='".$row['id']."' ";
                    $res = mysqli_query($connect,$sq);
                    $row1 = mysqli_fetch_assoc($res);
                    $_SESSION['product'] = $row1['product'];
                    $_SESSION['crop_bags'] = $row1['crop_bags'];

                  //echo "<script>alert('SUBMITTED');</script>";
                    header('location:dashboard.php');
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
            /*html,body{
                height: 100%;
                background-image: url(images/bgimg.jpg);
                 background-repeat: no-repeat;
    background-size: 100% 100%;
            } */
            #myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
}
  .main {
        background-color: #FFFFFF;
        width: 410px;
        height: 410px;
        margin: 7em auto;
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
        }
         form.form1 {
        padding-top: 3px;
    }
     .sign {
        padding-top: 17px;
        color: #8C55AA;
        font-family: 'Ubuntu', sans-serif;
        font-weight: bold;
        font-size: 23px;
    }
    .un {
    width: 76%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    /*margin-bottom: 50px;*/
    margin-left: 46px;
    text-align: center;
    margin-bottom: 10px;
    font-family: 'Ubuntu', sans-serif;
    }
    .sub {
      cursor: pointer;
        border-radius: 5em;
        color: #fff;
        background: linear-gradient(to right, #9C27B0, #E040FB);
        border: 0;
        padding-left: 40px;
        padding-right: 40px;
        padding-bottom: 10px;
        padding-top: 10px;
        font-family: 'Ubuntu', sans-serif;
        margin-left: 35%;
        font-size: 13px;
        box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
    }
    .forgot {
        cursor: pointer;
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #8C55AA;
        font-family: 'Ubuntu', sans-serif;
        padding-top: 7px;
    }
    div{
        left:16%;
    }
        </style>
    }
    </head>
    <body class="bg-light">
    	<video autoplay muted loop id="myVideo">
  <source src="coverr-ricefield-1561050847414.mp4" type="video/mp4">
</video>
<?php
/*session_start();
*/
require 'connection.php';
?>
<nav class="navbar ">
  <!-- Navbar content -->
   <!-- <a class="navbar-brand" style="color: white" href="#">Features</a> -->
   <!--<h1 ><center><a class="navbar-brand" href="index.php"><span style="font-size: 40px; color: white;"> Smart Management System for Food Storage and Wastage Reduction  </span> </a></center></h1>-->
   <!-- <a class="navbar nav-link" href="stu_reg.php" style="float:right;" > Project Tracking </a> -->
   
</nav>

        <div class="misc-wrapper">
            <div class="misc-content">
                <div class="container">
                    <div class="row justify-content-center">
                   
                        <div class="col-5">
                            <!--<div class="misc-header text-center">
                                <h1><span class="logb" style="color: white;">Login  <?php      ?> </span></h1>
                            </div>-->


                            <div class="main">   
                                <p class="sign" align="center">కిసాన్ మిత్రా</p>
                                <form class="form1" role="form" method="post" action="">
                                    <div class="form-group">                                      
                                        <!-- <label  for="exampleuser1">Email</label> -->
                                        <!--<?php print_r($_SESSION);?> -->
                                        <div class="group-icon">
                    <input id="exampleuser1" name="email" type="text" placeholder="Email" class="un" required="" value="
ఫోను నంబరు">
                                        <span class="icon-user text-muted icon-input"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!-- <label for="exampleInputPassword1">Password</label> -->
                                        <div class="group-icon">
                    <input id="exampleInputPassword1" name="password" type="password" placeholder="Password"  class="un" value="
పాస్వర్డ్">
                                        <span class="icon-lock text-muted icon-input"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!-- <label for="exampleInputPassword1">Role</label> -->
                                        <div class="group-icon">
                                        <select id="exampleInputPassword1" name="role"  placeholder="Password"  class="un">
                                            <option value="">Select Role</option>
                                            <option  value="1">అడ్మిన్ </option>
                                            <option value="2">నిల్వ యజమాని</option>
                                            <option value="3">
రైతు</option>  
                                        </select>
                                        <span class="icon-user text-muted icon-input"></span>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        
                                    </div>
                                    <hr>

                                    <button type="submit" name="submit" class="sub">ప్రవేశించండి</button><br>
                                    <a href="stu_reg.php"> <label   class="forgot">
నమోదు</label></a><br> 
                                    <a href="forgot_P.php"><label class="forgot">
పాస్వర్డ్ మర్చిపోయాను</label></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="formpage.html"><label class="forgot">మమ్మల్ని సంప్రదించండి</label></a>

                                    
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