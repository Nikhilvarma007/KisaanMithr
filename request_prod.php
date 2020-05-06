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
          <li class="breadcrumb-item active">Request for Product</li>    
        </ol>
      </div>
   <?php 

 
?>
    
            <div class="row">

                <div class="col-sm-12">

                    <div class="card">
                     
                        <div class="card-block">
                         <h2> Request for Product  </h2>
                        <div class=" col-md-12">
                        <form id="signupForm" method="post" class="form-horizontal" action="" enctype="multipart/form-data">

                        <div class="my_form">
                            <div class="row">
                            
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-6">
                                  <div class="form-group">
                                     <label><b> Request By</b></label>
                                      <b>  <input type="text" class="form-control" value="<?php echo $_SESSION['name'];?>"   id="" placeholder="Cost" required="">                   
                                      </b>                                   
                                  </div>
                                  <div class="form-group">
                                    <select class="form-control Select" name="pid">
                                      <option value="">Select Product</option>
                                    <?php
                                        $sql = "SELECT * FROM prods";
                                        $res = mysqli_query($connect,$sql);
                                        while($row = mysqli_fetch_assoc($res)){  ?>
                                      <option value="<?php echo $row['id']; ?>"><?php echo $row['product']; ?></option>
                                    <?php } ?>
                                    </select>                              
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

            <div class="card">
                     
            <div class="card-block">
            <center><h2> Request for Product</h2></center>  
            <div class=" col-md-12">
             <table id="example" class="table display" style="width:100%">
        <thead>
            <tr>
                <th>S.no</th>
                <th>Product</th>
                <th>Request Status</th>
                  
            </tr>
             </thead>
        <tbody>
          <?php 

            $sql = "SELECT * FROM prod_reqs  ";
            $res= mysqli_query($connect,$sql);
            $i=0;
            while($row = mysqli_fetch_assoc($res)){
              $i++;
          ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><b><?php echo get_prod($row['pid']); ?></b></td>
                <td><?php if($row['req_status']==0){ ?>
                    <button class="btn btn-danger"> Requested</button>
                  <?php }else if($row['req_status']==1){ ?>  
                    <button class="btn btn-primary"> Requested</button>
                  <?php } ?>
                </td>
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
