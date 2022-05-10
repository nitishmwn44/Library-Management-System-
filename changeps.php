<?php
include('headers.php');
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
      $error["fname"]='Original Password is required';
      $noe=$noe+1;
  } 
  else
  {
      $fname = $_POST['fname'];
  }

  if(empty($_POST['lname']))
  {
      $error["lname"]='New Password is required';
      $noe=$noe+1;
  } 
  else
  {
      $lname = $_POST['lname'];
      if(!preg_match("/^.{8,}$/",$lname))
      {
        $error["lname"]='New Password must be atleast 8 characters long.';
        $noe=$noe+1;
      }
  }

  if(empty($_POST['name']))
  {
      $error["name"]='Please Retype New Password';
      $noe=$noe+1;
  } 
  else
  {
      $name = $_POST['name'];
  }
}
?>
<?php 
	if(strcmp($lname,$name)!=0&&$noe==0&&$sub==1)
	{
		?>
        <div class="container text-center dibba fadein" style="text-align: center;align-self: center;">
        <div class="alert alert-danger " role="alert" style="width: 100%; align-self: center;border-radius: 20px;">
          Both the New passwords must match.
        </div>
      </div><?php	
	}
	elseif ($noe===0&&$sub===1) 
	{
		$sql="SELECT * FROM students WHERE name='".$_SESSION['user']."'";
		$res=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($res);
		if(strcmp($fname,$row['password'])!=0)
		{
		?>
        <div class="container text-center dibba fadein" style="text-align: center;align-self: center;">
        <div class="alert alert-danger " role="alert" style="width: 100%; align-self: center;border-radius: 20px;">
          Your Original Password is incorrect.
        </div>
      </div><?php	
		}
		else
		{
		$sql="UPDATE students SET password='".$lname."' WHERE name='".$_SESSION['user']."'";
		mysqli_query($conn,$sql);
		?>
        <div class="container text-center dibba fadein" style="text-align: center;align-self: center;">
        <div class="alert alert-success " role="alert" style="width: 100%; align-self: center;border-radius: 20px;">
          Your Password has been changed.  
        </div>
      </div><?php }
      } 
      ?>

<div class="text-center container-fluid" style="padding-top: 10px;">
        <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

          <input type="password" class="slidel" name="fname" placeholder="Original password" value="<?php echo htmlspecialchars($fname);?>">
          <br>
          <br>
          <?php if ($error["fname"]!='') { ?>
          <div class="container text-center dibba fadein" style="text-align: center;align-self: center;">
          <div class="alert alert-danger " role="alert" style="width: 100%; align-self: center;border-radius: 20px;border: 1px solid maroon;">
            <?php echo htmlspecialchars($error["fname"]);?>  
          </div>
          </div><?php } ?>
          <input type="password" class="slider" name="lname" placeholder="New password" value="<?php echo htmlspecialchars($lname);?>">
          <br>
          <br>
          <?php if ($error["lname"]!='') { ?>
          <div class="container text-center dibba fadein" style="text-align: center;align-self: center;">
          <div class="alert alert-danger " role="alert" style="width: 100%; align-self: center;border-radius: 20px;border: 1px solid maroon;">
            <?php echo htmlspecialchars($error["lname"]);?>  
          </div>
          </div><?php } ?>
          <input type="password" class="slidel" name="name" placeholder="Retype New Password" value="<?php echo htmlspecialchars($name);?>">
          <br>
          <br>
          <?php if ($error["name"]!='') { ?>
          <div class="container text-center dibba fadein" style="text-align: center;align-self: center;">
          <div class="alert alert-danger " role="alert" style="width: 100%; align-self: center;border-radius: 20px;border: 1px solid maroon;">
            <?php echo htmlspecialchars($error["name"]);?>  
          </div>
          </div><?php } ?>
          <div class="text-center">
          <input type="submit" name="submit" value="Change Password" class="butt slide">
          </div>
        </form>
      </div>
<?php
include('footers.php');
?>