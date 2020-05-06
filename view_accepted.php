<?php
ob_start();
session_start();
require 'connection.php';
// print_r($_SESSION); die;
if($_SESSION['id']==''){
header('location:index.php');
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
		
       
        <script type="text/javascript">
        
      </script>
    </head>
    <body>

			<?php include('header3.php');?>
        <section class="main-content container">
		<div class="page-header">
       
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">View Received </li>    
        </ol>
      </div>
            <div class="row">
            
                <div class="col-md-12">
                    <div class="widget  bg-light">
                        <div class="row row-table ">
                            <div class="margin-b-30">
                                <center><h1  style="color: Red;">View Received</h1></center>
                                <?php
                               
                                ?>
                                <!-- <h3> <?php echo $row['pid'];  ?></h3> -->
                                 <table id="example" class="display" style="width:100%">
        <thead>
          <!--did ddate donarid nid totalamt id  dname phone panno email password jdate -->

            <tr>
                <th>S.no</th>

                <th>Donation Id</th>
                <th>  Name</th>                
                <th> Hostel Name</th>                
                <th>Date</th>

                <th> Food Received</th>
                <th> Food For(members) </th>
                <th> Phone</th>
                <th> Email</th>
                
                
            </tr>
             </thead>
        <tbody>
          <?php 
          
             $sql = "SELECT A.*,B.* FROM donations AS A inner join donars as B ON A.donarid = B.id where A.nid= '".$_SESSION['id']."'";
             // echo $sql; die();
         
             $res = mysqli_query($connect,$sql);
            $i=0;
            while($row = mysqli_fetch_assoc($res)){
              $i++;
          ?>
          <!--did ddate donarid nid totalamt id  dname phone panno email password jdate -->
            <tr>
                <td><?php echo $i; ?></td>

                <td><?php echo $row['did']; ?></td>
                <td><?php echo $row['dname']; ?></td>
                <td><?php echo $row['hst_name']; ?></td>
                <td><?php echo $row['ddate']; ?></td>

                <td><?php echo $row['food_type']; ?></td>
                <td><?php echo $row['totalamt']." Members"; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['email']; ?></td>
                
            </tr>
          <?php } ?>
          </tbody>
                            
                          </table>

                           
                        </div>
                    </div>
                </div>
                

               
                   </div>
                   </section>

            <footer class="footer">
                <span>Copyright &copy; 2017 Fixed Admin</span>
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
        
        
        <!-- Validations -->
        <script src="assets/lib/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/lib/datatables/dataTables.responsive.min.js"></script>

           <script > 
       $(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>


</body>
</html>