<?php
include('headers.php');
if (isset($_POST['submit'])) 
{
	$searchby=$_POST['searchby'];
	$cat=$_POST['cat'];
	$sql="SELECT * FROM libops WHERE ".$cat." LIKE '%".$searchby."%' AND studname='".$_SESSION['user']."'";
}
else
{
	$sql="SELECT * FROM libops WHERE studname='".$_SESSION['user']."'";
}
$res=mysqli_query($conn,$sql);
?>

<div class="container text-center" style="">
	<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		<div style="color: white;font-size: 25px;" class="slider">Select Category to Search by</div>
     	<br>
		<div class="slider" >
        <select name="cat" class="drop" style="text-align: center;" >
        <option value="bookname">Name of Book</option>
        <option value="bookedi">Edition of Book</option>
        <option value="issued">Issue Date</option>
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

<div class="table-responsive slide">          
  <table class="table">
    <thead>
      <tr>
        <th>Issue ID</th>
        <th>Name of Book</th>
        <th>Edition of Book</th>
        <th>Issue Date</th>
        <th>Return Date</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($row=mysqli_fetch_assoc($res))
      {  
      echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["bookname"]."</td>";
        echo "<td>".$row["bookedi"]."</td>";
        echo "<td>".$row["issued"]."</td>";
        if($row["returnd"]=='')
        {
          echo "<td>Not Returned Yet</td>";
        }
        else
        {
          echo "<td>".$row["returnd"]."</td>";  
        }
      echo "<tr>";
  	  }
      ?>
    </tbody>
  </table>
 </div>
<?php
include('footers.php');
?>