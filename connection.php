<?php
$servername="localhost";
$username="root";
$password="";
$databasename="warehouse_storage";
$connect= mysqli_connect($servername,$username,$password,$databasename);

if(!$connect)
{
	echo "Connection error.";
	die;
}

?>
<script type="text/javascript">
$('#alphaonly').bind('keyup blur',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^A-za-z]/g,'') ); }
);
</script>