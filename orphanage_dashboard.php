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
                <th>Course</th>
                <th> Branch</th>                
                <th>Date</th>

                <th> Reporting time</th>
                <th> Exam time</th>
                <th> Subject Code</th>
                <th> Subject Name</th>
                <th> Request </th>
                
            </tr>
             </thead>
        <tbody>
          <?php 
          
             $sql = "SELECT * FROM exams where branch ='".$_SESSION['branch']."' ";
         
             $res = mysqli_query($connect,$sql);
            $i=0;
            while($row = mysqli_fetch_assoc($res)){
              $i++;
          ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['course']; ?></td>
                <td><?php echo $row['branch']; ?></td>
                <td><?php echo $row['date']; ?></td>

                <td><?php echo $row['reporting_time']; ?></td>
                <td><?php echo $row['exam_time']; ?></td>
                <td><?php echo $row['subject_code']; ?></td>
                <td><?php echo $row['subject_name']; ?></td>
                <td><button><a href="req_hall_ticket.php?eid=<?php echo $row['id']; ?>">Request Hall Tickect</a></button></td>

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