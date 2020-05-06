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

			<?php include('header.php');?>
        <section class="main-content container">
		<div class="page-header">
       
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Food Sent </li>    
        </ol>
      </div>
            <div class="row">
            
                <div class="col-md-12">
                    <div class="widget  bg-light">
                        <div class="row row-table ">
                            <div class="margin-b-30">
                              <center>  <h2 class="margin-b-5">Food Sent</h2></center>
                                <?php
                               
                                ?>
                                <!-- <h3> <?php echo $row['pid'];  ?></h3> -->
                                 <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>S.no</th>
                <th>Date</th>
                <th> Orphanage</th>                
                <th>Donated Food  </th>
                <th>Donated Food  </th>

            </tr>
             </thead>
        <tbody>
          <?php 

            $sq = "SELECT * FROM donations where donarid='".$_SESSION['id']."' ";
            $res= mysqli_query($connect,$sq);
            $i=0;
            while($row = mysqli_fetch_row($res)){
              $i++;
          ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php if ($row[3]=='0'){ echo "<span style='color:red;'>Not Accepted</span>";}
                else{echo "Accepted";} ?></td>

                <td><?php echo $row[4]; ?></td>
                <td><?php echo $row[6]; ?></td>
               
               
            </tr>
          <?php } ?>
          </tbody>
                            
                          </table>

                           
                        </div>
                    </div>
                </div>
                
                <!-- <div class="col-md-6">
                    <div class="widget  bg-light">
                        <div class="row row-table ">
                            <div class="margin-b-30">
                                <h2 class="margin-b-5">Sales</h2>
                                <p class="text-muted">Total Sales</p>
                                <span class="pull-right text-indigo widget-r-m">1349</span>
                            </div>
                            <div class="progress margin-b-10 progress-mini">
                                <div style="width:40%;" class="progress-bar bg-indigo"></div>
                            </div>
                           <p class="text-muted pull-left margin-b-0">Change</p>
                            <p class="text-muted pull-right margin-b-0">40%</p>
                        </div>
                    </div>
                </div> -->
                
              <!--   <div class="col-md-3">
                    <div class="widget  bg-light">
                        <div class="row row-table ">
                            <div class="margin-b-30">
                                <h2 class="margin-b-5">Orders</h2>
                                <p class="text-muted">Total Orders</p>
                                <span class="pull-right text-success widget-r-m">285</span>
                            </div>
                            <div class="progress margin-b-10 progress-mini">
                                <div style="width:65%;" class="progress-bar bg-success"></div>
                            </div>
                         <p class="text-muted pull-left margin-b-0">Change</p>
                            <p class="text-muted pull-right margin-b-0">65%</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget  bg-light">
                        <div class="row row-table ">
                            <div class="margin-b-30">
                                <h2 class="margin-b-5">Visitors</h2>
                                <p class="text-muted">Total Visitors</p>
                                <span class="pull-right text-warning widget-r-m">285</span>
                            </div>
                            <div class="progress margin-b-10 progress-mini">
                                <div style="width:20%;" class="progress-bar bg-warning"></div>
                            </div>
                            
                            <p class="text-muted pull-right margin-b-0">20%</p>
                        </div>
                    </div>
                </div>
            </div> -->

               
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
        // "order": [[ 3, "desc" ]]
    } );
} );
</script>


</body>
</html>