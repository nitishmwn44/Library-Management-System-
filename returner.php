<?php
ob_start();
session_start();
include('connection.php');
$x=$_GET['x'];
$sql="SELECT * FROM libops WHERE id='".$x."'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);
$bookname=$row["bookname"];
$bookedi=$row["bookedi"];
$sql="UPDATE books SET available=available+1 WHERE name='$bookname' AND edition='$bookedi'";
mysqli_query($conn,$sql);
$date=date("d-m-Y");
$sql="UPDATE libops SET returnd='$date' WHERE id='$x'";
mysqli_query($conn,$sql);
header('Location: return.php');
?>