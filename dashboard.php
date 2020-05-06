<?php


ob_start();
session_start();
// print_r($_SESSION); die;
require 'connection.php';
if($_SESSION['id']=='')
{
    header('location:index.php');
}
// $sql = "SELECT * FROM donations ";
$sql = "SELECT A.*, B.*, C.*  from donations as A inner join ngo_list as B on A.nid = b.nid join donars  as C";
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
                    <!--     <div class="col-md-6">
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
                </div>
                
                <div class="col-md-3">
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

            <?php include('header.php');?>
        <section class="main-content container">
        
            <div class="row">
            


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