 <?php
 
ob_start();
session_start();

require 'connection.php';
// print_r($_SESSION); die;
if($_SESSION['id']=='')
{
  header('location:index.php');
}
 $wh = "SELECT * FROM warehouse where id ='".$_SESSION['id']."'";
    $resw = mysqli_query($connect,$wh);
    $roww = mysqli_fetch_assoc($resw);
 
if(isset($_POST['submit']))
{

    $wh = "SELECT * FROM warehouse where id ='".$_SESSION['id']."'";
    $resw = mysqli_query($connect,$wh);
    $roww = mysqli_fetch_assoc($resw);
    $space = $_POST['store']+ $roww['stored_space'];
    // echo $space; die;

    if($roww['space_bags'] > $space){
      // echo "s";
      // echo $roww['space_bags']."is greater than".$space;
      $add_pro = "UPDATE reqs set status='1' where id='".$_POST['rid']."' ";
      // echo $add_pro;  die;
      $res = mysqli_query($connect,$add_pro);
      $sql = "UPDATE  warehouse set stored_space ='$space' WHERE id='".$_SESSION['id']."' ";
      // echo $sql; die; 
      $res = mysqli_query($connect,$sql);
       if($res)
       {
        header('location:requests.php');
        // echo "<script>alert('Done');</script>";
       }
    } else{
      echo "<script>alert('Space is not available to store ".$_POST['store']." Bags ');</script>";

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
          <li class="breadcrumb-item active">View Requests</li>    
        </ol>
      </div>
   <?php 

 
?>
    
            <div class="row">

                <div class="col-sm-12">

                    <div class="card">
                    
                    </div>
                </div>
            </div>

            <div class="card">
                     
            <div class="card-block">
            <center>
              <h2>View Requests</h2>
              <h3>Available Space <?php echo $roww['space_bags'];  ?></h3>

            </center>  
            <div class=" col-md-12">
             <table id="example" class="table display" style="width:100%">
        <thead>
            <tr>
                <th>S.no</th>
                <th>Farmer</th>
                <th>Seed</th>
                <th>Quantity</th>
                <th>Action</th>
                  
            </tr>
             </thead>
        <tbody>
          <?php 

            $sql = "SELECT * FROM reqs  WHERE w_id ='".$_SESSION['id']."' ";
            // echo $sql; die;
            //SELECT `id`, `fid`, `sid`, `request_st` FROM `seed_request` WHERE 1
            $res= mysqli_query($connect,$sql);
            $i=0;
            while($row = mysqli_fetch_assoc($res)){
              $i++;
          ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo get_farmer($row['f_id']); ?></td>
                <td><?php echo get_warehouse($row['w_id']); ?></td>
                <td><?php echo $row['bags']; ?></td>
                <td><?php if($row['status']==0){ ?>
                  <form action="" method="POST" role="form">
                  <input type="hidden" name="store" value="<?php echo $row['bags']; ?>" />
                  <input type="hidden" name="rid" value="<?php echo $row['id']; ?>" />
                  <input type="submit" name="submit" value="Accept" class="btn btn-danger"onclick="return confirm('Are sure to Accept and Store ')"/>
                </form>
                <?php   }else if($row['status']==1) { ?>
                  <a href=""><button class="btn btn-warning">Accepted</button></a>
                <?php } ?></td>
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
