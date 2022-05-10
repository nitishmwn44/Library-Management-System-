<?php
ob_start();
session_start();
include('connection.php');
$x=$_GET['x'];
$sql="SELECT * FROM students WHERE id='".$x."'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);
$status=$row['status'];
//if(strcmp($status,"no")==0)
if($status=="no")
{
$sql="UPDATE students SET status='yes' WHERE id='".$x."'";
mysqli_query($conn,$sql);
}
else
{
$sql="UPDATE students SET status='no' WHERE id='".$x."'";
mysqli_query($conn,$sql);
}
header('Location: muser.php');
?>