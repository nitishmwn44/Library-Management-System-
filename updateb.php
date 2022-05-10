<?php
include('header.php');
$error=["fname"=>"","lname"=>"","name"=>"","password"=>"","email"=>"","roll"=>""];
$noe=0;
$sub=0;
$match=0;
$fname='';
$lname='';
$name='';
$password='';
if (isset($_POST['submit'])) 
{
  $sub=1;
  if(empty($_POST['fname']))
  {
      $error["fname"]='Quantity of books is Required';
      $noe=$noe+1;
  } 
  else
  {
      $fname = $_POST['fname'];
      if(!preg_match("/^[1-9][0-9]*$/",$fname))
      {
        $error["fname"]='Quatity must be a Number';
        $noe=$noe+1;
      }
  }
  if(empty($_POST['lname']))
  {
      $error["lname"]='Name of Book is required';
      $noe=$noe+1;
  } 
  else
  {
      $lname = $_POST['lname'];
      if(!preg_match("/^.{3,50}$/",$lname))
      {
        $error["lname"]='Name of Book must be atleast 3 Characters long';
        $noe=$noe+1;
      }
      else
      {
        $sql="SELECT * FROM books WHERE name='$lname'";
        $res=mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)==0)
        {
          $error["lname"]='Enter name of a book existing in library';
          $noe=$noe+1;
        }
        else
        {
          $match=$match+1;
        } 
      }
  }

  if(empty($_POST['name']))
  {
      $error["name"]='Edition of book is required';
      $noe=$noe+1;
  } 
  else
  {
      $name = $_POST['name'];
      if(!preg_match("/^[0-9]+[a-z]{2}/",$name))
      {
        $error["name"]='Edition of book must be in valid form like 1st.';
        $noe=$noe+1;
      }
      else
      {
        $sql="SELECT * FROM books WHERE edition='$name'";
        $res=mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)==0)
        {
          $error["name"]='Enter edition of a book existing in library';
          $noe=$noe+1;
        }
        else
        {
          $match=$match+1;
        }
      }
  }
  if($noe===0&&$match==2)
  {
    $sql="SELECT * FROM books WHERE name='$lname' AND edition='$name'";
    $res=mysqli_query($conn,$sql);
    if($row=mysqli_fetch_assoc($res))
    {
    if($_POST['op']==1)
    {
    	$sql="UPDATE books SET available=available+'$fname',quantity=quantity+'$fname' WHERE name='$lname' AND edition='$name'";
    	mysqli_query($conn,$sql);
	
    ?>
        <div class="container text-center dibba fadein" style="text-align: center;align-self: center;">
        <div class="alert alert-success " role="alert" style="width: 100%; align-self: center;border-radius: 20px;">
          Stock has been updated successfully
        </div>
      </div><?php
    }
    else
    {
    	if($row['available']-$fname>0)
    	{
    		$sql="UPDATE books SET available=available-'$fname',quantity=quantity-'$fname' WHERE name='$lname' AND edition='$name'";
    		mysqli_query($conn,$sql);
	
    		?>
        	<div class="container text-center dibba fadein" style="text-align: center;align-self: center;">
        	<div class="alert alert-success " role="alert" style="width: 100%; align-self: center;border-radius: 20px;">
         	 Stock has been updated successfully
        	</div>
      		</div><?php	
    	}
    	else
    	{
    		?>
        <div class="container text-center dibba fadein" style="text-align: center;align-self: center;">
        <div class="alert alert-danger " role="alert" style="width: 100%; align-self: center;border-radius: 20px;">
          Not much available books.
        </div>
      </div><?php 	
    	}
    }
    }
    else
    {
    	?>
        <div class="container text-center dibba fadein" style="text-align: center;align-self: center;">
        <div class="alert alert-danger " role="alert" style="width: 100%; align-self: center;border-radius: 20px;">
          No books of this Edition and Name are available
        </div>
      </div><?php	
    } 
  }
  else
  {
    ?>
        <div class="container text-center dibba fadein" style="text-align: center;align-self: center;">
        <div class="alert alert-danger " role="alert" style="width: 100%; align-self: center;border-radius: 20px;">
          No books of this Edition and Name are available
        </div>
      </div><?php  
  }
}
?>


<div class="text-center container-fluid" style="padding-top: 10px;">
        <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
          <div style="color: white;font-size: 25px;" class="slider">Select Operation</div>
          <br>
          <div class="slider" >
          <select name="op" class="drop" style="text-align: center;" >
          <option value="1">Add to Stock</option>
          <option value="2">Remove from Stock</option>
    	  </select>
    	  </div>
    	  <br>
    	  <input type="text" class="slidel" name="fname" placeholder="Quantity to be Added or Removed" value="<?php echo htmlspecialchars($fname);?>">
          <br>
          <br>
          <?php if ($error["fname"]!='') { ?>
          <div class="container text-center dibba fadein" style="text-align: center;align-self: center;">
          <div class="alert alert-danger " role="alert" style="width: 100%; align-self: center;border-radius: 20px;border: 1px solid maroon;">
            <?php echo htmlspecialchars($error["fname"]);?>  
          </div>
          </div><?php } ?>
          <input type="text" class="slider" name="lname" placeholder="Name of Book" value="<?php echo htmlspecialchars($lname);?>">
          <br>
          <br>
          <?php if ($error["lname"]!='') { ?>
          <div class="container text-center dibba fadein" style="text-align: center;align-self: center;">
          <div class="alert alert-danger " role="alert" style="width: 100%; align-self: center;border-radius: 20px;border: 1px solid maroon;">
            <?php echo htmlspecialchars($error["lname"]);?>  
          </div>
          </div><?php } ?>
          <input type="text" class="slidel" name="name" placeholder="Edition of Book" value="<?php echo htmlspecialchars($name);?>">
          <br>
          <br>
          <?php if ($error["name"]!='') { ?>
          <div class="container text-center dibba fadein" style="text-align: center;align-self: center;">
          <div class="alert alert-danger " role="alert" style="width: 100%; align-self: center;border-radius: 20px;border: 1px solid maroon;">
            <?php echo htmlspecialchars($error["name"]);?>  
          </div>
          </div><?php } ?>
          
          <div class="text-center">
          <input type="submit" name="submit" value="Update Stock" class="butt slide">
          </div>
        </form>
        <br>
        	<div style="color: white;font-size: 25px;" class="slider"><b>Note</b><br>Number of books to be removed must be less than or equal to the Available books,means no issued books can be removed until they are returned.</div>
      </div>
<?php
include('footer.php');
?>