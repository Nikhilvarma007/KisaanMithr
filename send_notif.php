 <?php
 
ob_start();
session_start();
// print_r($_SESSION); die;
require 'connection.php';

if($_SESSION['id']=='')
{
  header('location:index.php');
}

 
if(isset($_POST['submit']))
{
  // print_r($_POST);// die;
  $sql = "SELECT * FROM prod_reqs where buyer_id ='".$_SESSION['id']."' and pid='".$_POST['pid']."' ";
  $res  = mysqli_query($connect,$sql);
  $row = mysqli_fetch_assoc( $res);
  if(mysqli_num_rows($res) ==0){

      $pid = $_POST['pid'];
      //SELECT `id`, `pid`, `buyer_id`, `req_status` FROM `prod_reqs` WHERE 1
      $sql = "INSERT INTO prod_reqs (  `pid`, `buyer_id`) values('$pid','".$_SESSION['id']."')";
      // echo $sql; die;
      $res = mysqli_query($connect,$sql);
       if($res)
       {
        // header('location:view_donated.php');
        echo "<script>alert('Done');</script>";
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
          <li class="breadcrumb-item active">Send Notification</li>    
        </ol>
      </div>
   <?php 

 
?>
    
            <div class="row">

                <div class="col-sm-12">

                    
                </div>
            </div>

            <div class="card">
                     
            <div class="card-block">
            <center><h2> Notify Farmer</h2></center>  
            <div class=" col-md-12">
             <table id="example" class="table display" style="width:100%">
        <thead>
            <tr>
                <th>S.no</th>                
                <th>Farmer name</th>
                <th>Product</th>
                <th>Request Status</th>
                <th>Action</th>
                  
            </tr>
             </thead>
        <tbody>
          <?php 

            $sql = "SELECT A.*, B.*, B.id as notid FROM farmer as A  inner join prods as B   on A.id = B.f_id ";
              /*SELECT `id`, `f_id`, `product`, `crop_bags`, `market_val`, `stored_in`, `stored_bags` FROM `prods` WHERE 1
              SELECT `id`, `role`, `name`, `email`, `phone`, `password`, `address`, `place` FROM `farmer` WHERE 1
            // echo $sql; die; */
            $res= mysqli_query($connect,$sql);
            $i=0;
            while($row = mysqli_fetch_assoc($res)){
              $i++;
          ?>
            <tr>
                <td><?php echo $i; ?></td>                
                <td><?php echo $row['name']; ?></td>
                <td><b><?php echo $row['product']; ?></b></td>
                <td><b><?php echo $row['market_val']; ?></b></td>
                <td><?php if($row['notify']==0){ ?><a href="delete_d.php?notid=<?php echo $row['notid']; ?>"><button class="btn btn-danger">Notify</button></a>
                <?php } else {?>
                  <button class="btn btn-info"> Notified</button>
                <?php }  ?>
                </td>
            </tr>
                    <!-- <button class="btn btn-danger"> Requested</button> -->

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
