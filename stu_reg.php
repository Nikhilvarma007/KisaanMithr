<?php 
   require "connection.php";

 if(isset($_POST['submit']))
 { 
 /*print_r($_POST);die;*/
 $dname =$_POST['dname'];
 $phone  =$_POST['phone'];
 $email =$_POST['email'];
 $password =$_POST['password'];
 $address =$_POST['address'];
 $place =$_POST['place'];

    //SELECT `id`, `role`, `name`, `email`, `phone`, `password`, `address`, `place` FROM `farmer` WHERE 1
  $query="INSERT INTO `farmer`(`role`, `name`, `email`, `phone`, `password`, `address`, `place`) VALUES ('3','$dname','$email','$phone','$password','$address','$place')";
  // echo $query; die;
  $execn=mysqli_query($connect,$query);
    if($execn)
    {
      // echo "<script>alert('SUBMITTED');</script>";
      header('location:index.php');
    }
    else{
      echo  "<script>alert('error');</script>";
    }
 }

 
?>
    
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1"> 


 
        <link href="assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Common Plugins -->
        <link href="assets/lib/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
        <link href="assets/lib/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/select2.min.css" rel="stylesheet" />

         
         <!-- Custom Css-->
        <link href="assets/css/style.css" rel="stylesheet">
        <!--start my date picker links-->

    
      <style type="text/css">
      

            html,body,.card-block{
            /*html,.row,.card-block{*/
                height: 100%;
                background-image: url(images/bgimg.jpg);
                 background-repeat: no-repeat;
    background-size: 100% 100% 100%;
            }
              .b1{
          height:30px;

        }
        </style>
     
       
    </head>
    <body>

            <div class="row">

                <div class="col-sm-12">

                    <div class="card">
                      

                     
                        <div class="card-block">
   <center><a class="navbar-brand" href="index.php" style="font-size: 40px;color: white;">Home</a></center>
                        <br> <br>
                         <center><h2 style="color: white;">Farmer Registration </h2></center><br>
                        <div class=" col-md-12">
                        <form id="signupForm" method="post" class="form-horizontal" action="" enctype="multipart/form-data">

                        <div class="my_form">
                            <div class="row">
                             <div class="col-md-4">
                             </div>
                           
                            <div class="col-md-4">
                              <div class="form-group">
                                   
                    
                <br><br><input type="text" name="dname" placeholder="Name"  onkeypress="return onlyAlphabets(event,this);"  required=""></div>
                <div class="form-group"><input type="text" name="phone" placeholder="Phone Number" pattern="[6789][0-9]{9}" required=""></div>            
                <div class="form-group"><input type="email" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"  required="" onclick="return validateForm()"></div>
                <div class="form-group"><input type="password" name="password" id="" placeholder="Password" required=""></div>
                <div class="form-group"><textarea name="address" class="" placeholder="Address">Address</textarea></div>
                <input type="text" name="place" placeholder="Place / Area"  onkeypress="return onlyAlphabets(event,this);"  required=""></div>
                                        
                           </div>
                           <div class="col-md-4">
                             </div>
           
                            </div>
                        </div>                        
<!-----3---------------->
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

                   <div class="btm-alig">
                        <div class="form-group" style="text-align: center;margin-top: 25px;">
                    <input type="submit" class="btn btn-primary" name="submit" id="submit" style="                                                                           background-color: #4098a5 !important;
                         border-color: #4098a5 !important;font-size:16px;"/>
                  </div>
                        </div>
                     </form>
                       <div class="btm-alig">
                        <div class="form-group" style="text-align: center;margin-top: 25px;">
                  <h3> <a href="ngo_reg.php"  style="color: white;"> Register As Warehouse Owner</a></h3>
                  <h3> <a href="index.php" style="color: white;"> Login Here</a></h3>
                  </div>
                        </div>
                        </div>
                    </div>
               
                    
                    </div>
                </div>
            </div>

            
<script>
function myFunction() {
  var x = document.getElementById("mySelect").value;
  document.getElementById("demo").innerHTML = "You selected: " + x;
}
</script>

<script>
    var min = 2016,
    max = 2021,
    select = document.getElementById('selectElementId');

    for (var i = min; i<=max; i++){
       var opt = document.createElement('option');
       opt.value = i;
       opt.innerHTML = i;
       select.appendChild(opt);
    }
</script>

            

   


        </section>
 
        <script src="assets/lib/jquery/dist/jquery.min.js"></script>
    <script src="assets/lib/bootstrap/js/popper.min.js"></script>
        <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/lib/pace/pace.min.js"></script>
        <script src="assets/lib/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
        <script src="assets/lib/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/lib/nano-scroll/jquery.nanoscroller.min.js"></script>
        <script src="assets/lib/metisMenu/metisMenu.min.js"></script>
        <script src="assets/js/custom.js"></script>
        <!--my testing links-->
      <link href = "assets/css/jquery-ui.css" rel = "stylesheet">
      <script src = "assets/js/jquery-1.10.2.js"></script>
      <script src = "assets/js/jquery-ui.js"></script>    
      <script src = "assets/js/jquery-3.4.1.min.js"></script>    
       
        <!-- Validations -->
        <script src="assets/lib/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/lib/datatables/dataTables.responsive.min.js"></script>
   <script > 
       $(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>


<script type="text/javascript">
$('#alphaonly').bind('keyup blur',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^A-za-z]/g,'') ); }
);
</script>
  <script type="text/javascript">
    window.onload = function () {
      document.getElementById("password1").onchange = validatePassword;
      document.getElementById("password2").onchange = validatePassword;
    }

    function validatePassword() {
      var pass2 = document.getElementById("password2").value;
      var pass1 = document.getElementById("password1").value;
      if (pass1 != pass2)
        document.getElementById("password2").setCustomValidity("Passwords Don't Match");
      else
        document.getElementById("password2").setCustomValidity('');
      //empty string means no validation error
    }
  </script>
<script type="text/javascript">
  function validateForm()
{
    var x = document.forms["signupForm"]["email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
    {
        alert("Not a valid e-mail address");
        return false;
    }
    else
    {
        alert("Valid e-mail address");
        return true;
    }
}
</script>
   <script language="Javascript" type="text/javascript">

        function onlyAlphabets(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                    return true;
                else
                    return false;
            }
            catch (err) {
                alert(err.Description);
            }
        }

    </script>

</body>
</html>
