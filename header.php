<?php
// session_start();
?>
<head>
        <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
        <script src="assets/js/jquery-3.4.1.min.js"></script> 
    </head>
			<div class="top-bar light-top-bar">
			<div class="container-fluid">
				<div class="row">
					<div class="col">
						<a class="admin-logo" href="#">Hello <?php echo  $_SESSION['name'];?>
							<h1>
                            
								<!-- <img alt="" src="assets/img/icon.png" class="logo-icon margin-r-10">
								<img alt="" src="assets/img/logo-dark.png" class="toggle-none hidden-xs"> -->
							</h1>
						</a>
						<div class="left-nav-toggle" >
							<a  href="#" class="nav-collapse"><i class="fa fa-bars"></i></a>
						</div>
						<div class="left-nav-collapsed" >
							<a  href="#" class="nav-collapsed"><i class="fa fa-bars"></i></a>
						</div>
						
					</div>
					<div class="col">
						<ul class="list-inline top-right-nav">
							
							<li class="dropdown avtar-dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="signout.php">
									<i class="fa fa-user" style="font-size:25px;"></i>
								</a>
								<ul class="dropdown-menu top-dropdown">
									
									<li class="dropdown-divider"></li>
												<li>
										<a class="dropdown-item" href="signout.php"><i class="icon-logout"></i> Logout</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		
        <div class="main-sidebar-nav dark-navigation">
            <div class="nano">
                <div class="nano-content sidebar-nav">
                    <ul class="metisMenu nav flex-column" id="menu">
						<div class="card-block border-bottom text-center nav-profile">
                            
                        </div>
						
                        <li class="nav-heading"><span> Menu</span></li>
							<?php if($_SESSION['role_id']==1){?>
						<li class="nav-item"><a class="nav-link" href="farmers.php"><i class="fa fa-table"> </i> <span class="toggle-none">Farmers</a></li>
						<li class="nav-item"><a class="nav-link" href="warehouses.php"><i class="fa fa-table"></i> <span class="toggle-none">Warehouses</a></li>
						<li class="nav-item"><a class="nav-link" href="add_prod.php"><i class="fa fa-table"></i> <span class="toggle-none">Add Market Value</a></li>	
						<li class="nav-item"><a class="nav-link" href="add_retailer.php"><i class="fa fa-table"></i> <span class="toggle-none">Add a Retailer</a></li>	
						<li class="nav-item"><a class="nav-link" href="send_sms.php"><i class="fa fa-table"></i> <span class="toggle-none">Send Sms</a></li>	

						 <?php } else if($_SESSION['role_id']==2){ ?>
						  <li class="nav-item"><a class="nav-link" href="add_rent.php"><i class="fa fa-home"></i> <span class="toggle-none">Add Rent</a></li>			
						  <li class="nav-item"><a class="nav-link" href="update_space.php"><i class="fa fa-home"></i> <span class="toggle-none">Update Space</a></li>
						  <li class="nav-item"><a class="nav-link" href="view_pest.php"><i class="fa fa-home"></i> <span class="toggle-none">View Prices</a></li>
						  <li class="nav-item"><a class="nav-link" href="requests.php"><i class="fa fa-home"></i> <span class="toggle-none">View Storage Requests</a></li>
						  <li class="nav-item"><a class="nav-link" href="send_notif.php"><i class="fa fa-home"></i> <span class="toggle-none">Send Notification</a></li>

						 <?php } else if($_SESSION['role_id']==3){ ?>
									
						  <li class="nav-item"><a class="nav-link" href="f_add_prod.php"><i class="fa fa-home"></i> <span class="toggle-none">Add Crop</a></li>
						  <li class="nav-item"><a class="nav-link" href="warehouses.php"><i class="fa fa-home"></i> <span class="toggle-none">View Warehouses</a></li>
						  <li class="nav-item"><a class="nav-link" href="view_marketval.php"><i class="fa fa-home"></i> <span class="toggle-none">View Market Values</a></li>
						  <li class="nav-item"><a class="nav-link" href="view_retailers.php"><i class="fa fa-home"></i> <span class="toggle-none">View Retailers</a></li>
						  <li class="nav-item"><a class="nav-link" href="store_crops.php"><i class="fa fa-home"></i> <span class="toggle-none">Store Crops </a></li>
						  <li class="nav-item"><a class="nav-link" href="notification.php"><i class="fa fa-home"></i> <span class="toggle-none">Notification</a></li>

						 <?php } ?>
						
						
                        	
				
                    </ul>
                </div>
            </div>
        </div>
 <!--  
  </span>
</a>
</li>
</span>
</a>
</li>
</span>
</a>
</li>
</span> -->
 </html>
 <?php
 		function get_farmer($id){
 			include 'connection.php';
 			$sql = "SELECT * FROM farmer where id='".$id."'";
 			$res = mysqli_query($connect,$sql);
 			$row = mysqli_fetch_assoc($res);
 			return $row['name'];
 		}
 		function get_prod($id){
 			include 'connection.php';
 			$sql = "SELECT * FROM prods where id='".$id."'";
 			$res = mysqli_query($connect,$sql);
 			$row = mysqli_fetch_assoc($res);
 			return $row['product'];
 		}
 		function get_seed($id){
 			include 'connection.php';
 			$sql = "SELECT * FROM seeds where id='".$id."'";
 			$res = mysqli_query($connect,$sql);
 			$row = mysqli_fetch_assoc($res);
 			return $row['seed'];
 		}function get_user($id){
 			include 'connection.php';
 			$sql = "SELECT * FROM users where user_id='".$id."'";
 			$res = mysqli_query($connect,$sql);
 			$row = mysqli_fetch_assoc($res);
 			return $row['fname'];
 		}function get_warehouse($id){
 			include 'connection.php';
 			$sql = "SELECT * FROM warehouse where id='".$id."'";
 			$res = mysqli_query($connect,$sql);
 			$row = mysqli_fetch_assoc($res);
 			return $row['owner'];
 		}

 ?>