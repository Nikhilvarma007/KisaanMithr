<?php


ob_start();
session_start();
require 'connection.php';
if($_SESSION['id']=='')
{
    header('location:login.php');
}
// $sql = "SELECT * FROM donations ";
$sql = "SELECT * FROM users WHERE user_id!='1' ";
 // echo $sql; die;
$res = mysqli_query($connect, $sql);
// echo "kasdka"; die;


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
        
       
        <script type="text/javascript">
        
      </script>
    </head>
    <body>

            <?php include('header.php');?>
        <section class="main-content container">
            <br>
            <br>
        
            <div class="row">
                <div class="col-md-12">
                    <div class="widget  bg-light">
                        <div class="row row-table ">
                            <div class="margin-b-30">
                                <center><h1 class="margin-b-5"> Buyer Details</h1></center>
                                <?php
                               
                                ?>
                                <!-- <h3> <?php echo $row['pid'];  ?></h3> -->
                                 <table id="example" class="table display" style="width:100%">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Name</th>               
                <th>Email</th>               
                <th>Action</th>               


                

            </tr>
             </thead>
        <tbody>
          <?php 
          

$i=0;
            while($row = mysqli_fetch_assoc($res)){
              $i++;
          ?>
            <tr>
            <td><?php echo $i; ?> </td>
            <td><?php echo $row['fname']; ?> </td>

            
            <td><?php echo $row['email']; ?> </td>
            <td><a href="delete_d.php?bid=<?php echo $row['user_id']; ?>" onclick="return confirm('Are sure to delete')"><button class="btn btn-danger">Delete</button> </a></td>


<?php }?>
        </tr>

          </tbody>
                            
                          </table>

                           
                        </div>
                    </div>
                </div>
                


               
                   </div>
                   </section>




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
        
        
        <!-- Validations -->
        <script src="assets/lib/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/lib/datatables/dataTables.responsive.min.js"></script>

           <script > 
       $(document).ready(function() {
    $('#example').DataTable( {
  "scrollY": "300px",
        } );
} );
</script>


</body>
</html>