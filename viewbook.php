<?php
include('header.php');
if (isset($_POST['submit'])) 
{
	$searchby=$_POST['searchby'];
	$cat=$_POST['cat'];
	$sql="SELECT * FROM books WHERE ".$cat." LIKE '%".$searchby."%'";
}
else
{
	$sql="SELECT * FROM books";
}
$res=mysqli_query($conn,$sql);
?>

<div class="container text-center" style="">
	<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		<div style="color: white;font-size: 25px;" class="slider">Select Category to Search by</div>
     	<br>
		<div class="slider" >
        <select name="cat" class="drop" style="text-align: center;" >
        <option value="name">Book Name</option>
        <option value="author">Author Name</option>
        <option value="edition">Edition</option>
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
        <th>Name of Book</th>
        <th>Author</th>
        <th>Edition</th>
        <th>Quantity</th>
        <th>Available</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($row=mysqli_fetch_assoc($res))
      {  
      echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["author"]."</td>";
        echo "<td>".$row["edition"]."</td>";
        echo "<td>".$row["quantity"]."</td>";
        echo "<td>".$row["available"]."</td>";
      echo "<tr>";
  	  }
      ?>
    </tbody>
  </table>
 </div>
<?php
include('footer.php');
?>