 <?php
 
ob_start();
session_start();

require 'connection.php';

if($_SESSION['id']=='')
{
  header('location:index.php');
}

 
if(isset($_POST['submit']))
{
  // print_r($_POST); 
  $sql = "SELECT * FROM farmer where phone ='".$_POST['phone']."'";
  $res  = mysqli_query($connect,$sql);
  $row = mysqli_fetch_assoc( $res);
  if(mysqli_num_rows($res) ==0){

      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $password = $_POST['password'];

       //farmer`(`id`, `role`, `name`, `email`, `phone`, `password`)
       $add_pro = "INSERT INTO farmer ( `role`, `name`, `email`, `phone`, `password`) values('3','$name','$email','$phone','$password')";       
       // echo $add_pro; die;
       $res = mysqli_query($connect,$add_pro);
       if($res)
       {
        header('location:view_donated.php');
       }

  }else{
    echo "<script>alert('Already Exists') </script>";
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
        .b1{
          height:30px;

        }

      </style>
     
       
    </head>
    <body>

      <?php include('header.php');?>
        <section class="main-content container">
      
            <div class="page-header">
       
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Add Farmer </li>    
        </ol>
      </div>
   <?php 

 
?>
    
            <div class="row">

                <div class="col-sm-12">

                    <div class="card">
                     
                        <div class="card-block">
                        <div class=" col-md-12">
                        
                        </div>
                    </div>
               
                    
                    </div>
                </div>
            </div>

            <div class="card">
                     
                        <div class="card-block">
                        <center><h2>View Farmers</h2></center>
                        <div class=" col-md-12">
                         <table id="example" class="table display" style="width:100%">
        <thead>
            <tr>
                <th>S.no</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Farmer Val</th>
                <th>Market Value</th>
                <th>Send sms</th>
                  
            </tr>
             </thead>
        <tbody>
          <?php 

            $sq = "SELECT A.*,B.* FROM farmer as A  inner join prods as B on  A.id = B.f_id ";
            $res= mysqli_query($connect,$sq);
            $i=0;
            while($row = mysqli_fetch_assoc($res)){
              $i++;
          ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['name'];  ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['f_val']; ?></td>
                <td><?php echo $row['market_val']; ?></td>
                <td><?php echo $row['id']; ?></td>

               
               
            </tr>
          <?php } ?>
          </tbody>
                            
                          </table>
                        </div>
                    </div>
               
                    
                    </div>
<!-- <p> <?php $a; ?></p> -->
            <footer class="footer">
                <span>Copyright &copy; 2017 Fixed Admin </span>
            </footer>
 </body>
</html>


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
       
        <!-- Validations -->
        <script src="assets/lib/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/lib/datatables/dataTables.responsive.min.js"></script>
   <script > 
       $(document).ready(function() {
    $('#example').DataTable( {
    } );
} );
</script>



   <script type="text/javascript">
    function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) 
        {
            alert('Invalid Email Address');
            return false;
        }

        return true;

}
   </script>
   <script type="text/javascript">
             
         $(function() {
            $( "#dob_bt" ).datepicker();
         });
       </script>
<script type="text/javascript">
$('#alphaonly').bind('keyup blur',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^A-za-z]/g,'') ); }
);
</script>
</body>
</html>
