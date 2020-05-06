 <?php
 
ob_start();
session_start();

require 'connection.php';

if($_SESSION['id']=='')
{
  header('location:index.php');
}

if(isset($_POST['submit']))
{

 /* $sql = "SELECT * FROM donations where ddate ='".$_POST['edate']."'";
  $res  = mysqli_query($connect,$sql);
  $row = mysqli_fetch_assoc( $res);
  if(mysqli_num_rows($res) < 1){*/

      $food_for = $_POST['food_for'];
      $food_type = $_POST['food_type'];
      $date= $_POST['edate'];
      $date2=  date('Y-m-d ', strtotime($date));

       //SELECT `did`, `ddate`, `donarid`, `nid`, `totalamt` FROM `donations` WHERE 1
       $add_pro = "INSERT INTO donations ( `ddate`, `donarid`, `totalamt`,food_type) values('$date2','".$_SESSION['id']."','$food_for','$food_type')";       // echo $add_pro; die;
       $res = mysqli_query($connect,$add_pro);
       if($res)
       {
        header('location:view_donated.php');
       }

  // }
  

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
          <li class="breadcrumb-item active">Add Food </li>    
        </ol>
      </div>
   <?php 

 
?>
    
            <div class="row">

                <div class="col-sm-12">

                    <div class="card">
                     
                        <div class="card-block">
                         <h2> Add Food  </h2>
                        <div class=" col-md-12">
                        <form id="signupForm" method="post" class="form-horizontal" action="" enctype="multipart/form-data">

                        <div class="my_form">
                            <div class="row">
                            
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                      <!--         <div class="form-group">
                                   
                    <input type="text" class="form-control1" name="course" id="emp_name" placeholder="Course" required >
                  </div> -->
                          <div class="form-group">
                                  <b>  <select type="number" class="form-control" name="food_type" 
                                    id="emp_dpt" placeholder="Food For [Ex : 10 members]">
                                      <option value="">SELECT FOOD TYPE</option>
                                      <option value="Break Fast">Break Fast</option>
                                      <option value="Lunch">Lunch</option>
                                      <option value="Dinner">Dinner</option>

                                      </select>
                                  </b>
                                   
                                </div>
                            
                              <div class="form-group">
                                  <b>  <input type="number" class="form-control" name="food_for" 
                                    id="emp_dpt" placeholder="Food For [Ex : 10 members]">
                                      
                                  </b>
                                   
                                </div>
                            
                              
                                    <div class="form-group">
                                   
                                    <input type="text" class="form-control1" name="edate"
                                    id="dob_bt" placeholder="Date " autocomplete="off">
                              </div>
                                 
                            
                            </div>
                           <div class="col-md-4">
                           </div>
           
                            </div>
                        </div>                        
<!-----3---------------->

                   <div class="btm-alig">
                        <div class="form-group" style="text-align: center;margin-top: 25px;">
                    <input type="submit" class="btn btn-primary" name="submit" id="submit" style="                                                                           background-color: #4098a5 !important;
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
                        <center><h2>View Donated</h2></center>
                        <div class=" col-md-12">
                         <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>S.no</th>
                <th>Date</th>

                <th>Orphanage Id</th>

                <th>Food For</th>
                  
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
 </body>
</html>


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
        <!--my testing links-->
      <link href = "assets/css/jquery-ui.css" rel = "stylesheet">
      <script src = "assets/js/jquery-1.10.2.js"></script>
      <script src = "assets/js/jquery-ui.js"></script>    
       
        <!-- Validations -->
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
