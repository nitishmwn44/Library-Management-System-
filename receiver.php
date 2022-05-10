<?php
ob_start();
session_start();
include('connection.php');
$x=$_GET['x'];
$sql="UPDATE messages SET isread='yes' WHERE id='".$x."'";
mysqli_query($conn,$sql);
header('Location: received.php');
?>