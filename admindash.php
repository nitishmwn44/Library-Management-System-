<?php
include('header.php');
$numst=0;
$numad=0;
$numb=0;
$quan=0;
$avai=0;
$ret=0;
$lib=0;
$mess=0;
$sql="SELECT * FROM students";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($res))
{
$numst=$numst+1;
}
$sql="SELECT * FROM admins";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($res))
{
$numad=$numad+1;
}
$sql="SELECT * FROM books";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($res))
{
$numb=$numb+1;
$quan=$quan+$row['quantity'];
$avai=$avai+$row['available'];
}
$ret=$quan-$avai;
$sql="SELECT * FROM libops";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($res))
{
$lib=$lib+1;
}
$sql="SELECT * FROM messages WHERE senderun='".$_SESSION['user']."'";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($res))
{
	$mess++;
}
?>
<div class="container-fluid text-center">
	<div class="row text-center" style="padding: 10px;">
		<div class="col-sm-3 col-xs-6 text-center" style="padding: 10px;">
			<div class="dashitems text-center slider">
				Number of<br>Students
				<div style="font-size: 40px ;background-color: white;color: #f29818;border-radius: 0px 0px 20px 20px; margin: -5px;margin-top: 10px;"><?php echo $numst; ?></div>
			</div>
		</div>
		<div class="col-sm-3 col-xs-6 text-center" style="padding: 10px;">
			<div class="dashitems text-center slider">
				Number of<br>Admins
				<div style="font-size: 40px ;background-color: white;color: #f29818;border-radius: 0px 0px 20px 20px; margin: -5px;margin-top: 10px;"><?php echo $numad; ?></div>
			</div>
		</div>
		<div class="col-sm-3 col-xs-6 text-center" style="padding: 10px;">
			<div class="dashitems text-center slider">
				Number of Types<br>of Books 
				<div style="font-size: 40px ;background-color: white;color: #f29818;border-radius: 0px 0px 20px 20px; margin: -5px;margin-top: 10px;"><?php echo $numb; ?></div>
			</div>
		</div>
		<div class="col-sm-3 col-xs-6 text-center" style="padding: 10px;">
			<div class="dashitems text-center slider">
				Number of Books<br>in Stock
				<div style="font-size: 40px ;background-color: white;color: #f29818;border-radius: 0px 0px 20px 20px; margin: -5px;margin-top: 10px;"><?php echo $quan; ?></div>
			</div>
		</div>
	</div>
	<div class="row text-center" style="padding: 10px;">
		<div class="col-sm-3 col-xs-6 text-center" style="padding: 10px;">
			<div class="dashitems text-center slider">
				Total Number of Books<br>Available
				<div style="font-size: 40px ;background-color: white;color: #f29818;border-radius: 0px 0px 20px 20px; margin: -5px;margin-top: 10px;"><?php echo $avai; ?></div>
			</div>
		</div>
		<div class="col-sm-3 col-xs-6 text-center" style="padding: 10px;">
			<div class="dashitems text-center slider">
				Number of Books<br>Not Returned
				<div style="font-size: 40px ;background-color: white;color: #f29818;border-radius: 0px 0px 20px 20px; margin: -5px;margin-top: 10px;"><?php echo $ret; ?></div>
			</div>
		</div>
		<div class="col-sm-3 col-xs-6 text-center" style="padding: 10px;">
			<div class="dashitems text-center slider">
				Number of Books<br>Issued
				<div style="font-size: 40px ;background-color: white;color: #f29818;border-radius: 0px 0px 20px 20px; margin: -5px;margin-top: 10px;"><?php echo $lib; ?></div>
			</div>
		</div>
		<div class="col-sm-3 col-xs-6 text-center" style="padding: 10px;">
			<div class="dashitems text-center slider">
				Number of Messages<br>sent
				<div style="font-size: 40px ;background-color: white;color: #f29818;border-radius: 0px 0px 20px 20px; margin: -5px;margin-top: 10px;"><?php echo $mess; ?></div>
			</div>
		</div>	
	</div>
</div>
<?php
include('footer.php');
?>