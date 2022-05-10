<?php
include('headers.php');
$sql="SELECT * FROM students WHERE name='".$_SESSION['user']."'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);
?>
<div class="container-fluid slide" style="padding: 30px">
	<div class="container text-center" style="padding: 15px;background-color: white;border-radius: 20px;">
		<span class="glyphicon glyphicon-user" style="color:#f29818;font-size: 10em;border: 5px solid #f29818;padding: 30px;border-radius: 3em; "></span>
		<br>
		<br>
		<table class="table">
		<tr>
			<td><b>First Name</b></td><td><?php echo $row['fname'];  ?></td>
		</tr>
		<tr>
			<td><b>Last Name</b></td><td><?php echo $row['lname'];  ?></td>
		</tr>
		<tr>
			<td><b>Userame</b></td><td><?php echo $row['name'];  ?></td>
		</tr>
		<tr>
			<td><b>Email</b></td><td><?php echo $row['email'];  ?></td>
		</tr>
		<tr>
			<td><b>Roll Number</b></td><td><?php echo $row['roll'];  ?></td>
		</tr>
		</table>

	</div>
</div>

<?php
include('footers.php');
?>