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
          <li class="breadcrumb-item active">Receive Food </li>    
        </ol>
      </div>
            <div class="row">
            
                <div class="col-md-12">
                    <div class="widget  bg-light">
                        <div class="row row-table ">
                            <div class="margin-b-30">
                                <h2 class="margin-b-5">Projects</h2>
                                <?php
                               
                                ?>
                                <!-- <h3> <?php echo $row['pid'];  ?></h3> -->
                                 <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>S.no</th>
                <th>From(Hostel)</th>
                <th>Food For</th>
                <th>Food type</th>
                <th> Phone</th>                
                <th>Address</th>
                <th>Date</th>
                <th>Accept</th>

                
            </tr>
             </thead>
        <tbody>
          <?php 
          
             //$sql = "SELECT * FROM `donations` where nid='' or nid='0' ";
             //$sql = "SELECT A.* FROM donars AS A ";
             $sql = "SELECT A.*,B.* FROM donars AS A inner join donations as B on A.id = B.donarid where B.nid='' or B.nid='0'  ";
             // echo $sql ;die;
         
             $res = mysqli_query($connect,$sql);
            $i=0;
            while($row = mysqli_fetch_assoc($res)){
              $i++;
          ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['dname']; ?></td>
                <td><?php echo $row['totalamt']; ?></td>
                <td><?php echo $row['food_type']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['ddate']; ?></td>
                <td><a  href="accept_food.php?did=<?php echo $row['did']; ?>" ><button  type="button" class="btn btn-success">Accept</button> </a></td>

                
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
       // "order": [[ 1, "desc" ]]
    } );
} );
</script>


</body>
</html>