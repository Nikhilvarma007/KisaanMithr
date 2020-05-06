 <?php
 
ob_start();
session_start();

require 'connection.php';
// print_r($_SESSION); die;
if($_SESSION['id']=='')
{
  header('location:index.php');
}
            $sq = "SELECT * FROM warehouse where id='".$_GET['bid']."'";
            // echo $sq; die;
            $res= mysqli_query($connect,$sq);
            $row = mysqli_fetch_assoc($res);
            $sql = "SELECT A.*,B.* FROM farmer as A inner join prods as B on A.id = B.f_id ";
            $res1= mysqli_query($connect,$sql);
            $row1 = mysqli_fetch_assoc($res1);
if(isset($_POST['submit']))
{ 
      $sql = "SELECT * FROM reqs WHERE f_id='".$_SESSION['id']."',w_id='".$_GET['bid']."',product='".$_POST['product']."'  ";
      $res = mysqli_query($connect,$sql);
      $rows = mysqli_fetch_assoc($res);
      if($rows==0){

         $crop_bags = $_POST['crop_bags']; 
         $product = $_POST['product']; 
         $sql = "INSERT INTO reqs (`f_id`, `w_id`, `bags`, `status`,product) values('".$_SESSION['id']."','".$_GET['bid']."','$crop_bags','0','$product')"; 
         // INSERT INTO `reqs`(`id`, `f_id`, `w_id`, `bags`, `status`, `product`)
          // echo $sql; die();
         $res = mysqli_query($connect,$sql);
         // $sql1 = "";
         if($res) {
          header('location:add_prod.php');
        }else{
          echo "<script>echo('Try Again') </script>";        
        }

    } else{
      echo "<script>echo('Already Exists') </script>";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/lib/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
        <link href="assets/lib/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/select2.min.css" rel="stylesheet" />
        <link href="assets/css/style.css" rel="stylesheet">

    
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
          <li class="breadcrumb-item active"><a href="store_crops.php">Store Crops</a></li>    
          <li class="breadcrumb-item active">Request Storage</li>    
        </ol>
      </div>
   <?php 

 
?>
    
            <div class="row">

                <div class="col-sm-12">

                    <div class="card">
                     
                        <div class="card-block">
                         <h2>Request Storage</h2>
                        <div class=" col-md-12">
                        <form id="signupForm" method="post" class="form-horizontal" action="" enctype="multipart/form-data">

                        <div class="my_form">
                            <div class="row">
                            
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-6">
                              <BR><br>                           
                              <div class="form-group">
                                  <b>  <input type="text" class="form-control"  name="warehouse" value="<?php echo $row['owner']; ?>" 
                                     placeholder="Product" required>
                                  </b>                                   
                              </div> 
                              <div class="form-group">
                                  <!-- <b><input type="text" class="form-control"  name="product" value="<?php echo $row1['product']; ?>"  placeholder="Product" required /></b> -->   
                                  <select name="product" class="form-control" required="">
                                    <option value="">Select </option>
                                    <?php 
                                    $sql = "SELECT distinct(product) from prods where f_id ='".$_SESSION['id']."' ";
                                    $res = mysqli_query($connect,$sql);
                                    while($srow =mysqli_fetch_assoc($res)){
                                    ?>
                                    <option value="<?php echo $srow['product']; ?>"><?php echo $srow['product']; ?></option>
                                  <?php } ?>
                                  </select>

                              </div> 
                              <div class="form-group">
                                  <b>  <input type="number" class="form-control" name="crop_bags" value="<?php echo $row1['crop_bags']; ?>"  min="1" 
                                     placeholder="Market Value" required="">        
                                  </b>
                                   
                              </div>                                                                              
                            </div>
                           <div class="col-md-4">
                           </div>
           
                            </div>
                        </div>                        
                   <div class="btm-alig">
                        <div class="form-group" style="text-align: center;margin-top: 25px;">
                    <input type="submit" class="btn btn-primary" name="submit" id="submit" style="                                                                           background-color: #4098a5 !important;
                         border-color: #4098a5 !important;font-size:16px;"/>
                  </div>
                        </div>
                     </form>
                        </div>
                    </div>
               
                    
                    </div>
                </div>
            </div>

            <footer class="footer">
                <span>Copyright &copy;YMTS 2017 Fixed Admin </span>
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
      <link href = "assets/css/jquery-ui.css" rel = "stylesheet">
      <script src = "assets/js/jquery-1.10.2.js"></script>
      <script src = "assets/js/jquery-ui.js"></script>    
       
        <script src="assets/lib/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/lib/datatables/dataTables.responsive.min.js"></script>
   <script > 
       $(document).ready(function() {
    $('#example').DataTable( {
    } );
} );
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
