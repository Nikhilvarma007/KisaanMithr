 <?php
 
ob_start();
session_start();

require 'connection.php';

if($_SESSION['id']=='')
{
  header('location:index.php');
}
$sql ="SELECT * FROM warehouse where  id='".$_SESSION['id']."' ";
$res = mysqli_query($connect,$sql); 
$row = mysqli_fetch_assoc($res);
 
if(isset($_POST['submit']))
{


      $add_pro = "UPDATE warehouse set space_bags= '".$_POST['space_bags']."' where id='".$_SESSION['id']."'";
      // echo $add_pro; die;
      $res = mysqli_query($connect,$add_pro);
       if($res)
       {
        // header('location:view_donated.php');
        echo "<script>alert('Done');</script>";
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
          <li class="breadcrumb-item active">Update Space </li>    
        </ol>
      </div>
            <div class="row">

                <div class="col-sm-12">

                    <div class="card">
                     
                        <div class="card-block">
                         <h2> Update Space  </h2>
                        <div class=" col-md-12">
                        <form id="signupForm" method="post" class="form-horizontal" action="" enctype="multipart/form-data">

                        <div class="my_form">
                            <div class="row">
                            
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
<!--                                   <div class="form-group">
                                      <b>  <input type="text" class="form-control" name="seed" 
                                        id="" placeholder="Seed" required="">                   
                                      </b>                                   
                                  </div> -->
                                  <div class="form-group">
                                      <b>  <input type="number" class="form-control" name="space_bags" 
                                        id="" placeholder="Space " value="<?php echo $row['space_bags']; ?>" required="">                   
                                      </b>                                   
                                  </div>              
                            </div>
                            <div class="col-md-4">
                            </div>
           
                            </div>
                        </div>                        
                   <div class="btm-alig">
                        <div class="form-group" style="text-align: center;margin-top: 25px;">
                    <input type="submit" name="submit" class="btn btn-primary"  onclick="return confirm('Are you sure to Submit again')" id="submit" style="                                                                           background-color: #4098a5 !important;
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
            <center><h2>View Space</h2></center>  
            <div class=" col-md-12">
             <table id="example" class="table display" style="width:100%">
        <thead>
            <tr>
                <th>S.no</th>
                <th>Full Space</th>
                <th>Filled Space</th>
                <th>Available Space</th>
                  
            </tr>
             </thead>
        <tbody>
          <?php 

            $sql = "SELECT * FROM warehouse WHERE id='".$_SESSION['id']."' ";
            $res= mysqli_query($connect,$sql);
            $i=0;
            while($row = mysqli_fetch_assoc($res)){
              $i++;
          ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['space_bags']; ?></td>
                <td><?php echo $row['stored_space']; ?></td>
                <td><?php echo $row['space_bags']-$row['stored_space']; ?></td>
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
