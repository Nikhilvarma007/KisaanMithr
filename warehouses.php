<?php


ob_start();
session_start();
require 'connection.php';
// print_r($_SESSION); die;
if($_SESSION['id']=='')
{
    header('location:index.php');
}
// $sql = "SELECT * FROM donations ";

// echo "kasdka"; die;


?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1"> 



        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <!-- Common Plugins -->
        <link href="assets/lib/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
        <link href="assets/lib/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/select2.min.css" rel="stylesheet" />
        <!-- <script src="assets/js/jquery-3.4.1.min.js"></script> -->

         
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
                        <!-- <div class="row row-table "> -->
                            <!-- <div class="margin-b-30"> -->
                                <center><h1 class="margin-b-5"> Warehouses Details</h1></center>
                                <?php
                               
                                ?>
                                <!-- <h3> <?php echo $row['pid'];  ?></h3> -->
                                 <table id="example" class="table display" style="width:100%">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Warehouse Id</th>
                <th>Name</th>               
                <th>Phone</th>               
                <th>Email</th>               
                <th>Place</th>  
                <th>Warehouse Type</th>  
                <th>Rent per day</th>  
                <th>Rent per bag</th>  
                <th>Full Space</th>  
                <th>Available Space</th>  


                <th>Action</th>               
            </tr>
             </thead>
        <tbody>
          <?php  
          if($_SESSION['role_id']==1){

            $sql = "SELECT * FROM warehouse ";
        }else if ($_SESSION['role_id']==3) {
             $sql = "SELECT * FROM warehouse where place='".$_SESSION['place']."'";
        }

        // echo $sql; die; 
            $res = mysqli_query($connect, $sql);
            $i=0;
            while($row = mysqli_fetch_assoc($res)){
              $i++;
              //      // SELECT `id`, `wid`, `role_id`, `owner`, `phone`, `email`, `password`, `rent_day`, `rent_bag`, `w_type`, `space_bags`, `place` FROM `warehouse` WHERE 1

          ?>
            <tr>
            <td><?php echo $i; ?> </td>
            <td><?php echo $row['wid']; ?> </td>            
            <td><?php echo $row['owner']; ?> </td>            
            <td><?php echo $row['phone']; ?> </td>            
            <td><?php echo $row['email']; ?> </td>            
            <td><?php echo $row['place']; ?> </td>
            <td><?php echo $row['w_type']; ?> </td>
            <td><?php echo $row['rent_day']; ?> </td>
            <td><?php echo $row['rent_bag']; ?> </td>
            <td><?php echo $row['space_bags']; ?> </td>
            <td><?php echo $row['space_bags']-$row['stored_space'] ; ?> </td>
            <td>
            <?php  if($_SESSION['role_id']==1){ ?>
            <a href="delete_d.php?bid=<?php echo $row['id']; ?>" onclick="return confirm('Are sure to delete')"><button class="btn btn-danger">Delete</button> </a>
            <?php }else if($_SESSION['role_id']==3){ ?>
            <a href="request_storage.php?bid=<?php echo $row['id']; ?>" ><button class="btn btn-danger">Request</button> </a>    
            <?php } ?>
            </td>

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
<!-- https://code.jquery.com/jquery-3.3.1.js -->
<!-- https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js
 -->    
            <script > 
       $(document).ready(function() {
    $('#example').DataTable( {
  "scrollY": true,
  "scrollX": true,
        } );
} );
</script>


</body>
</html>