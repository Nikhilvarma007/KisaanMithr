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
    // $f_id = $_POST['f_id'];
    $product = $_POST['product'];
    $market_val = $_POST['market_val'];
    $sql = "SELECT * FROM prods where product='$product' and market_val='$market_val' ";
    $res  = mysqli_query($connect,$sql);
    $row = mysqli_fetch_assoc( $res);
    if(mysqli_num_rows($res)==0){
      //  INSERT INTO `prods`(`id`, `f_id`, `product`, `market_val`) VALUES 
       $sql = "UPDATE prods set market_val='$market_val' where product='$product' ";
          // echo $sql; die;
       $res = mysqli_query($connect,$sql);
       if($res) {
        echo "<script>alert('Added') </script>";
       }

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
          <li class="breadcrumb-item active">Add Market Value </li>    
        </ol>
      </div>
   <?php 

 
?>
    
            <div class="row">

                <div class="col-sm-12">

                    <div class="card">
                     
                        <div class="card-block">
                         <h2> Add Market Value  </h2>
                        <div class=" col-md-12">
                        <form id="signupForm" method="post" class="form-horizontal" action="" enctype="multipart/form-data">

                        <div class="my_form">
                            <div class="row">
                            
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-6">
                              <BR><br>
                            
                              <div class="form-group">
                                  <!-- <b><input type="text" class="form-control" name="product" 
                                     placeholder="Crop" required></b>  -->
                                  <!-- <input list="prod" name="product" class="form-control" autocomplete="off"> -->

                                  <select id="prod" class="form-control" name="product">  
                                    <option value="">Select </option>
                                    <?php
                                    $sql ="SELECT distinct(product) FROM prods where market_val='0' ";
                                    $res = mysqli_query($connect,$sql);
                                    while($row = mysqli_fetch_assoc($res)){
                                     ?>
                                    
                                    <option value="<?php echo $row['product']; ?>"><?php echo $row['product']; ?> </option>
                                    <?php } ?>
                                  </select>                                     
                              </div> 
                              <div class="form-group">
                                  <b>  <input type="number" class="form-control" name="market_val" min="1" placeholder="Market Value" required="">        
                                  </b>
                                   
                              </div>                                                                              
                            </div>
                           <div class="col-md-4">
                           </div>
           
                            </div>
                        </div>                        
                   <div class="btm-alig">
                        <div class="form-group" style="text-align: center;margin-top: 25px;">
                    <input type="submit" class="btn btn-primary" name="submit" id="submit" style="background-color: #4098a5 !important;
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
                        <center><h2>View Crops</h2></center>
                        <div class=" col-md-12">
                         <table id="example" class="table display" style="width:100%">
        <thead>
            <tr>
                <th>S.no</th>
                <th>Crop</th>
                <th>Market Value</th>
                <th>Action</th>
                <!-- <th>Food For</th> -->
                  
            </tr>
             </thead>
        <tbody>
          <?php 

            $sq = "SELECT * FROM prods";
              //  INSERT INTO `prods`(`id`, `f_id`, `product`, `market_val`) VALUES 
            $res= mysqli_query($connect,$sq);
            $i=0;
            while($row = mysqli_fetch_assoc($res)){
              $i++;
          ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['product']; ?></td>
                <td><?php echo $row['market_val']; ?></td>
                <td><a href="edit_market_val.php?epid=<?php echo $row['id']; ?>" ><button class="btn-primary btn">Edit</button></a></td>
              <!-- onclick="return confirm('Are sure to delete')" -->
            </tr>
          <?php } ?>
          </tbody>
                            
                          </table>
                        </div>
                    </div>
               
                    
                    </div>
<!-- <p> <?php $a; ?></p> -->
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
