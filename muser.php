<?php
include('header.php');
if (isset($_POST['submit'])) 
{
	$searchby=$_POST['searchby'];
	$cat=$_POST['cat'];
	$sql="SELECT * FROM students WHERE ".$cat." LIKE '%".$searchby."%'";
}
else
{
	$sql="SELECT * FROM students";
}
$res=mysqli_query($conn,$sql);
?>

<div class="container text-center" style="">
	<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		<div style="color: white;font-size: 25px;" class="slider">Select Category to Search by</div>
     	<br>
		<div class="slider" >
        <select name="cat" class="drop" style="text-align: center;" >
        <option value="roll">Roll Number</option>
        <option value="fname">First Name</option>
        <option value="lname">Last Name</option>
        <option value="name">Username</option>
        <option value="email">Email</option>
        <option value="id">ID</option>
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
        <th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Username</th>
        <th>Password</th>
        <th>Email</th>
        <th>Roll Number</th>
        <th>Status</th>
        <th>Toggle Status<th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($row=mysqli_fetch_assoc($res))
      {  
      echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["fname"]."</td>";
        echo "<td>".$row["lname"]."</td>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["password"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "<td>".$row["roll"]."</td>";
        echo "<td>".$row["status"]."</td>";
        echo "<td><a href='toggler.php?x=".$row["id"]."'><div class='tb' style='text-align:center;'>Toggle</div></td>";
      echo "<tr>";
  	  }
      ?>
    </tbody>
  </table>
 </div>
<?php
include('footer.php');
?>