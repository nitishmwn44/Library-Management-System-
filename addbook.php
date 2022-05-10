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
      $error["fname"]='Name of book is required';
      $noe=$noe+1;
  } 
  else
  {
      $fname = $_POST['fname'];
      if(!preg_match("/^.{3,50}$/",$fname))
      {
        $error["fname"]='Name of book must be atleast 3 Chracters long';
        $noe=$noe+1;
      }
      else
      {
      	$sql="SELECT * FROM books WHERE name='$fname'";
        $res=mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)>0)
        {
          $match=$match+1;
        }	
      }
  }

  if(empty($_POST['lname']))
  {
      $error["lname"]='Name of Author is required';
      $noe=$noe+1;
  } 
  else
  {
      $lname = $_POST['lname'];
      if(!preg_match("/^[A-Z]([a-zA-Z]|\.){1,50}\s*/",$lname))
      {
        $error["lname"]='Name of Author must only contain letters and spaces and must be atleast 3 letters long.';
        $noe=$noe+1;
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
        if(mysqli_num_rows($res)>0)
        {
          $match=$match+1;
        }
      }
  }

  if(empty($_POST['password']))
  {
      $error["password"]='Quantity of book is required';
      $noe=$noe+1;
  } 
  else
  {
      $password = $_POST['password'];
      if(!preg_match("/^[1-9][0-9]*$/",$password))
      {
        $error["password"]='Quantity should be a Number';
        $noe=$noe+1;
      }
  }

  

  if($noe===0&&$match<2)
  {
    $sql="INSERT INTO books(name,author,edition,quantity,available) VALUES('$fname','$lname','$name','$password','$password');";
    if(mysqli_query($conn,$sql))
    {

    }
    else
    {
      die("failed");
    }
  }
}
?>
<?php 
	if($match==2&&$noe==0&&$sub==1)
	{
		?>
        <div class="container text-center dibba fadein" style="text-align: center;align-self: center;">
        <div class="alert alert-danger " role="alert" style="width: 100%; align-self: center;border-radius: 20px;">
          Book of same name and edition is registered.You can now only update the quantity.
        </div>
      </div><?php	
	}
	elseif ($noe===0&&$sub===1) 
	{ 
		?>
        <div class="container text-center dibba fadein" style="text-align: center;align-self: center;">
        <div class="alert alert-success " role="alert" style="width: 100%; align-self: center;border-radius: 20px;">
          The book has been added.  
        </div>
      </div><?php } 
      ?>

<div class="text-center container-fluid" style="padding-top: 10px;">
        <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

          <input type="text" class="slidel" name="fname" placeholder="Name of Book" value="<?php echo htmlspecialchars($fname);?>">
          <br>
          <br>
          <?php if ($error["fname"]!='') { ?>
          <div class="container text-center dibba fadein" style="text-align: center;align-self: center;">
          <div class="alert alert-danger " role="alert" style="width: 100%; align-self: center;border-radius: 20px;border: 1px solid maroon;">
            <?php echo htmlspecialchars($error["fname"]);?>  
          </div>
          </div><?php } ?>
          <input type="text" class="slider" name="lname" placeholder="Author of Book" value="<?php echo htmlspecialchars($lname);?>">
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
          <input type="text" class="slider" name="password" placeholder="Quantity of Books" value="<?php echo htmlspecialchars($password);?>">
          <br>
          <br>
          <?php if ($error["password"]!='') { ?>
          <div class="container text-center dibba fadein" style="text-align: center;align-self: center;">
          <div class="alert alert-danger " role="alert" style="width: 100%; align-self: center;border-radius: 20px;border: 1px solid maroon;">
            <?php echo htmlspecialchars($error["password"]);?>  
          </div>
          </div><?php } ?>
          <div class="text-center">
          <input type="submit" name="submit" value="Add" class="butt slide">
          </div>
        </form>
      </div>
<?php
include('footer.php');
?>