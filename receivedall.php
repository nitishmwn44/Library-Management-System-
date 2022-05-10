<?php
include('headers.php');
if (isset($_POST['submit'])) 
{
	$searchby=$_POST['searchby'];
	$cat=$_POST['cat'];
	$sql="SELECT * FROM messages WHERE receiverun='".$_SESSION['user']."' AND ".$cat." LIKE '%".$searchby."%'";
}
else
{
	$sql="SELECT * FROM messages WHERE receiverun='".$_SESSION['user']."'";
}
$res=mysqli_query($conn,$sql);
?>

<div class="container text-center" style="">
	<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		<div style="color: white;font-size: 25px;" class="slider">Select Category to Search by</div>
     	<br>
		<div class="slider" >
        <select name="cat" class="drop" style="text-align: center;" >
        <option value="senderun">From</option>
        <option value="subject">Subject</option>
        <option value="message">Message</option>
    	</select>
    </div>
    <br>
    <input type="text" class="slidel" name="searchby" placeholder="Enter Something to Search" >
    <br>
    <br>
    <div class="text-center">
       	<input type="submit" name="submit" value="Search" class="butt slide">
    </div>
    <br>
    <br>
	</form>
</div>

	<?php 
	while($row=mysqli_fetch_assoc($res))
	{ 
	echo "<table class='table text-center slide'>";
	echo "<tr style='background-color:#f29818;margin-top:-5px;' class='text-center'>";
		echo "<td colspan='2' style='font-size:20px;'>".$row['subject']."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td><b>FROM</b></td>";
		echo "<td>".$row['senderun']."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td><b>TO</b></td>";
		echo "<td>".$row['receiverun']."</td>";
	echo "</tr>";
	echo "<tr >";
		echo "<td colspan='2'style='font-size:20px;'>".$row['message']."</td>";
	echo "</tr>";
	echo "</table>";
	}
include('footers.php');
?>