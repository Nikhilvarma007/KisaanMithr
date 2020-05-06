<?php 
ob_start();
session_start();
require 'connection.php';
if($_SESSION['id']=='')
{
    header('location:login.php');
}
$sql = "SELECT * FROM ngo_list ";
$res = mysqli_query($connect, $sql);

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
		<div class="page-header">
       
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Orphanages List </li>    
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
                                 <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Organisation Name</th>              
                <th> Address </th>

                <th>Contact no. </th>
                <th>Email</th>
                <th>Delete</th>

                

            </tr>
             </thead>
        <tbody>
         <?php
$i=0;
    ///SELECT `nid`, `name`, ``, ``, ``, ``, ``, `email`,

 while($fet = mysqli_fetch_assoc($res)) { 
            $i++;   
            ?>
           <tr>
            <td><?php echo $i; ?> </td>
            <td><?php echo $fet['name']?> </td>
            <td><?php echo $fet['organisation_n']?> </td>

            
            <td><?php echo $fet['org_address']?> </td>
            <td><?php echo $fet['phone']?> </td>
            <td><?php echo $fet['email']?> </td>
            <td><a href="delete_d.php?oid=<?php echo $fet['nid']?>" id="myBtn" ><button>Delete </button></a> </td>
            <!-- <td><?php //echo $fet['address']?> </td> -->
        
        

        </tr>
<?php }?>

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
        "paging": true,
         "info":     true
    } );
} );
</script>



</body>
</html>