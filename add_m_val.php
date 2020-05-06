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

  $sql = "SELECT * FROM prods where f_id ='".$_POST['f_id']."' and product='".$_POST['product']."' and ";
  $res  = mysqli_query($connect,$sql);
  $row = mysqli_fetch_assoc( $res);
  if(mysqli_num_rows($res)==0){

      $f_id = $_POST['f_id'];
      $product = $_POST['product'];
      $market_val= $_POST['market_val'];
       $add_pro = "INSERT INTO prods(`f_id`,`product`,`market_val`) values('$f_id','".$_SESSION['id']."','$food_for','$food_type')";       // echo $add_pro; die;
       $res = mysqli_query($connect,$add_pro);
       if($res)
       {
        header('location:view_donated.php');
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
                      <!--         <div class="form-group">
                                   
                    <input type="text" class="form-control1" name="course" id="emp_name" placeholder="Course" required >
                  </div> -->
                          <div class="form-group">
                                  <b>  <select type="number" class="form-control" name="f_id" 
                                    id="emp_dpt" placeholder="Food For [Ex : 10 members]">
                                      <option value="">SELECT FARMER</option>
                                    <?php $sql = "SELECT * FROM farmer";
                                          $res = mysqli_query($connect,$sql);
                                          while ($row = mysqli_fetch_assoc($res)) {              
                                    ?>  
                                      <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                    <?php } ?>  
                                      </select>
                                  </b>                                   
                          </div>
                            
                          <div class="form-group">
                              <b>  <input type="text" class="form-control" name="product" 
                                id="emp_dpt" placeholder="Product">
                                  
                              </b>
                               
                            </div>                                                      
                            <div class="form-group">
                                   
                                    <input type="number" class="form-control" name="market_val"
                                    id="" placeholder="Cost " autocomplete="off">
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
                        <center><h2>View Market Value</h2></center>
                        <div class=" col-md-12">
                         <table id="example" class="table display" style="width:100%">
        <thead>
            <tr>
                <th>S.no</th>
                <th>Farmer</th>
                <th>Product</th>
                <th>Market Value</th>
                <!-- <th>Food For</th> -->
                  
            </tr>
             </thead>
        <tbody>
          <?php 

            $sq = "SELECT * FROM prods ";
            $res= mysqli_query($connect,$sq);
            $i=0;
            while($row = mysqli_fetch_assoc($res)){
              $i++;
          ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['f_id']; ?></td>
                <td><?php echo $row['product']; ?></td>
                <td><?php echo $row['market_val']; ?></td>
                <!-- <td><?php echo $row[4]; ?></td> -->              
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
