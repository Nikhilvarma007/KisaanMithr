<?php 
ob_start();
session_start();
require 'connection.php';
 if(session_destroy())
{
	header('location:index.php');
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php


?>
</body>
</html>
