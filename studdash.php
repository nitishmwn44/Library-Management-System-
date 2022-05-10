<?php
include('headers.php');
$quan=0;
$ib=0;
$nret=0;
$ret=0;
$sql="SELECT * FROM libops where studname='".$_SESSION['user']."'";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($res))
{
	$ib++;
	if($row['returnd']=='')
		$nret++;
}
$ret=$ib-$nret;
$received=0;
$read=0;
$nread=0;
$sql="SELECT * FROM messages where receiverun='".$_SESSION['user']."'";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($res))
{
	$received++;
	if($row['isread']=='no')
		$nread++;
}
$read=$received-$nread;
$sent=0;
$sql="SELECT * FROM messages where senderun='".$_SESSION['user']."'";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($res))
{
	$sent++;
}
?>
<div class="container-fluid text-center">
	<div class="row text-center" style="padding: 10px;">
		<div class="col-sm-3 col-xs-6 text-center" style="padding: 10px;">
			<div class="dashitems text-center slider">
				Number of Books<br>Issued
				<div style="font-size: 40px ;background-color: white;color: #f29818;border-radius: 0px 0px 20px 20px; margin: -5px;margin-top: 10px;"><?php echo $ib; ?></div>
			</div>
		</div>
		<div class="col-sm-3 col-xs-6 text-center" style="padding: 10px;">
			<div class="dashitems text-center slider">
				Number of Books<br>Returned
				<div style="font-size: 40px ;background-color: white;color: #f29818;border-radius: 0px 0px 20px 20px; margin: -5px;margin-top: 10px;"><?php echo $ret; ?></div>
			</div>
		</div>
		<div class="col-sm-3 col-xs-6 text-center" style="padding: 10px;">
			<div class="dashitems text-center slider">
				Number of Books<br>Not Returned
				<div style="font-size: 40px ;background-color: white;color: #f29818;border-radius: 0px 0px 20px 20px; margin: -5px;margin-top: 10px;"><?php echo $nret; ?></div>
			</div>
		</div>
		<div class="col-sm-3 col-xs-6 text-center" style="padding: 10px;">
			<div class="dashitems text-center slider">
				Number of Messages<br>Received
				<div style="font-size: 40px ;background-color: white;color: #f29818;border-radius: 0px 0px 20px 20px; margin: -5px;margin-top: 10px;"><?php echo $received; ?></div>
			</div>
		</div>
	</div>
	<div class="row text-center" style="padding: 10px;">
		<div class="col-sm-3 col-xs-6 text-center" style="padding: 10px;">
			<div class="dashitems text-center slider">
				Number of Messages<br>Sent
				<div style="font-size: 40px ;background-color: white;color: #f29818;border-radius: 0px 0px 20px 20px; margin: -5px;margin-top: 10px;"><?php echo $sent; ?></div>
			</div>
		</div>
		<div class="col-sm-3 col-xs-6 text-center" style="padding: 10px;">
			<div class="dashitems text-center slider">
				Number of Messages<br>Read
				<div style="font-size: 40px ;background-color: white;color: #f29818;border-radius: 0px 0px 20px 20px; margin: -5px;margin-top: 10px;"><?php echo $read; ?></div>
			</div>
		</div>
		<div class="col-sm-3 col-xs-6 text-center" style="padding: 10px;">
			<div class="dashitems text-center slider">
				Number of Messages<br>Unread
				<div style="font-size: 40px ;background-color: white;color: #f29818;border-radius: 0px 0px 20px 20px; margin: -5px;margin-top: 10px;"><?php echo $nread; ?></div>
			</div>
		</div>
	</div>
</div>
<?php
include('footers.php');
?>