<?php

include ('connection.php');


	if(isset($_GET['num'])){
		$sql = "DELETE FROM contact where id='".$_GET['num']."'";
		$res = mysqli_query($connect,$sql);
		if($res){
			header('location:add_no.php');
		}
	}
/*	if(isset($_GET['seedr'])){
		$sql = "UPDATE requests set request_st='1' where id='".$_GET['seedr']."'";
		// echo $sql; die;
		$res = mysqli_query($connect,$sql);
		if($res){
			header('location:seed_request.php');
		}
	}*/
	if(isset($_GET['notid'])){
		$sql = "UPDATE prods set notify='1' where id='".$_GET['notid']."'";
		// echo $sql; die;
		$res = mysqli_query($connect,$sql);
		if($res){
			header('location:send_notif.php');
		}
	}
	if(isset($_GET['delre'])){
		$sql = "DELETE FROM retailers where id='".$_GET['delre']."'";
		// echo $sql; die;
		$res = mysqli_query($connect,$sql);
		if($res){
			header('location:add_retailer.php');
		}
	}

?>