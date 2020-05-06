<?php

include ('connection.php');
session_start();
if(isset($_GET['did'])){
$sql="Update  donations SET nid ='".$_SESSION['id']."' where did='".$_GET['did']."'";
$res=mysqli_query($connect,$sql);
if($res)
{
	header('location:rcvfood.php');
}
}
/*else if(isset($_GET['oid'])){
$sql="DELETE FROM ngo_list where nid='".$_GET['oid']."'";
$res=mysqli_query($connect,$sql);
if($res)
{
	header('location:orphanage_list.php');
}
}*/
?>