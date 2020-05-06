<?php 
   require "connection.php";

 if(isset($_POST['submit']))
 { 
/* print_r($_POST);die;*/
    $owner = $_POST['owner'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $w_type = $_POST['w_type'];
    $place = $_POST['place'];
    $sql = "SELECT * FROM warehouse where email='$email' and owner='$owner' ";
    $res  = mysqli_query($connect,$sql);
    $row = mysqli_fetch_assoc( $res);
    if(mysqli_num_rows($res)==0){
          // SELECT `id`, `wid`, `role_id`, `owner`, `phone`, `email`, `password`, `rent_day`, `rent_bag`, `w_type`, `space_bags`, `place` FROM `warehouse` WHERE 1
          $sql="INSERT INTO `warehouse`(role_id,`owner`,`phone`,`email`,`password`,w_type,`place`) VALUES ('2','$owner','$phone','$email','$password','$w_type','$place' )";
          // echo $sql; die();
          $res=mysqli_query($connect,$sql);
          $sql1= "SELECT max(id) as maxid  from warehouse "; 
          $f   = mysqli_query($connect, $sql1);
          $q   = mysqli_fetch_assoc($f);
          $max = $q['maxid'];
          $var1 ="whid". $max;
          $sqlq1 =" UPDATE `warehouse` set `wid`= '$var1'  where id = '$max' " ;
          $execution=mysqli_query($connect,$sqlq1);
          // echo $sqlq1; die();
          if($res){
              echo "<script>alert('Registerd Successfully');</script>";
            } else{
              echo  "<script>alert('Try Again');</script>";
            }
    } else{
      echo  "<script>alert('Already Exists');</script>";
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

      body{

          height: 100%;
          background-image: url(images/whbg.jpg);
          background-repeat: no-repeat;
          background-size: 100% 100% 100% 100%;
      }
      .b1{
        height:30px;

      }
      </style>
     
       
    </head>
    <body> 
            <div class="row">
                <div class="col-sm-12">
       <!-- <div class="card"> -->
        <nav class="navbar ">
  <!-- Navbar content -->
   <!-- <a class="navbar-brand" style="color: white" href="#">Features</a> -->
   <center><a class="navbar-brand" href="index.php" style="font-size: 40px;color: white;">Smart Management System for Food Storage and Wastage Reduction</a></center>
   <!-- <a class="navbar-brand" href="stu_reg.php" style="float:right;" > Project Tracking </a> -->
</nav>
          <!-- <div class="card-block"> --><br><br><br>
                    <center><h2 style="color: white;">Warehouse Registration </h2></center><br>
                        <div class=" col-md-12">
                        <form id="signupForm" method="post" class="form-horizontal" action="" enctype="multipart/form-data">

                        <div class="my_form">
                            <div class="row">
                            
                           
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                              <div class="form-group">
                              
                <div class="form-group"><input type="text" name="owner"  onkeypress="return onlyAlphabets(event,this);"  placeholder="Name" required=""></div>                           
                <div class="form-group"><input type="text" name="phone" pattern="[6789][0-9]{9}"  placeholder="Phone" required=""></div>                           
                <div class="form-group"><input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"   placeholder="Email" required=""></div>
                <div class="form-group"><input type="password" class="form-control" name="password" id="password2" placeholder=" Password" required=""></div>
                <div class="form-group">  
                    <select class="form-control" name="w_type">
                      <option value="">Select</option>
                      <option value="Normal">Normal</option>
                      <option value="ColdStorage">Cold Storage</option>
                    </select>
                </div>
                <div class="form-group"><input type="text" class="form-control" name="place" id="" placeholder="City / Place" required ></div>

                  </div>
                  <div class="form-group">
                     <input type="submit" name="submit"  class="form-control btn-info"   />
                  </div>
                          
                              
                           </div> 
           
                            </div>
                        </div>                        
                    <script src="assets/js/jquery.min.js"></script>

                        </div>
                     </form>
                       <div class="btm-alig">
                        <div class="form-group" style="text-align: center;margin-top: 25px;">
                   <h3><a href="stu_reg.php"style="color: white;"> Register As Farmer</a><br></h3>
                   <h3><a href="index.php"style="color: white;">Login Here</a></h3>
                  </div>
                        </div>
                        </div>
                    <!-- </div> -->
               
                    
                    <!-- </div> -->
                </div>
            </div>
            <script type="text/javascript">
              $("#select1").change(function() {
  if ($(this).data('options') === undefined) {
    /*Taking an array of all options-2 and kind of embedding it on the select1*/
    $(this).data('options', $('#select2 option').clone());
  }
  var id = $(this).val();
  var options = $(this).data('options').filter('[value=' + id + ']');
  $('#select2').html(options);
});
            </script>
            
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
        // "order": [[ 3, "desc" ]]
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
      // document.getElementById("password2").onchange = validatePsassword;
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
    var x = document.forms["myForm"]["email"].value;
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




</body>
</html>
