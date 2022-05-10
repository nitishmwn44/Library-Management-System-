<?php
include('header.php');
$error=["fname"=>"","lname"=>"","name"=>"","password"=>"","email"=>"","roll"=>""];
$sql="SELECT * FROM admins WHERE name='".$_SESSION['user']."'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);
$id=$row['id'];
$noe=0;
$sub=0;
$fname='';
$lname='';
$name='';
$email='';
$roll='';
$password='';
if (isset($_POST['submit'])) 
{
  $sub=1;
  if(empty($_POST['fname']))
  {
      $error["fname"]='First Name is required';
      $noe=$noe+1;
  } 
  else
  {
      $fname = $_POST['fname'];
      if(!preg_match("/^[a-zA-Z]{3,50}$/",$fname))
      {
        $error["fname"]='First Name must only contain alphabets and should be atleast 3 characters long.';
        $noe=$noe+1;
      }
  }

  if(empty($_POST['lname']))
  {
      $error["lname"]='Last Name is required';
      $noe=$noe+1;
  } 
  else
  {
      $lname = $_POST['lname'];
      if(!preg_match("/^[a-zA-Z]{3,50}$/",$lname))
      {
        $error["lname"]='Last Name must only contain alphabets and should be atleast 3 characters long.';
        $noe=$noe+1;
      }
  }

  if(empty($_POST['name']))
  {
      $error["name"]='Username is required';
      $noe=$noe+1;
  } 
  else
  {
      $name = $_POST['name'];
      if(!preg_match("/.{3,}/",$name))
      {
        $error["name"]='Username should be atleast 3 characters long.';
        $noe=$noe+1;
      }
      else
      {
        $sql="SELECT * FROM students WHERE name='$name'";
        $res=mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)>0)
        {
          $error["name"]='This Username is already taken.';
          $noe=$noe+1; 
        }
      }
  }


  if(empty($_POST['email']))
  {
      $error["email"]='Email is required';
      $noe=$noe+1;
  } 
  else
  {
      $email = $_POST['email'];
      if(!filter_var($email, FILTER_VALIDATE_EMAIL))
      {
        $error["email"]='Email should be a valid Email address.';
        $noe=$noe+1;
      }
  }

  

  if($noe===0)
  {
  	$_SESSION['user']=$name;
    $sql="UPDATE admins SET fname='$fname',lname='$lname',name='$name',email='$email' WHERE id=$id";
    mysqli_query($conn,$sql);
    header('Location: editp.php?y=1');
  }
}
  ?>


	<div class="container-fluid text-center">
		<?php
		if(isset($_GET['y']))
		{

			?>
        <div class="container text-center dibba fadein" style="text-align: center;align-self: center;">
        <div class="alert alert-success " role="alert" style="width: 100%; align-self: center;border-radius: 20px;">
          Details Succesfully Changed  
        </div>
      </div><?php } ?>

		
		<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
          <input type="text" class="slidel" name="fname" placeholder="First Name" value="<?php echo htmlspecialchars($fname);?>">
          <br>
          <br>
          <?php if ($error["fname"]!='') { ?>
          <div class="container text-center dibba fadein" style="text-align: center;align-self: center;">
          <div class="alert alert-danger " role="alert" style="width: 100%; align-self: center;border-radius: 20px;border: 1px solid maroon;">
            <?php echo htmlspecialchars($error["fname"]);?>  
          </div>
          </div><?php } ?>
          <input type="text" class="slider" name="lname" placeholder="Last Name" value="<?php echo htmlspecialchars($lname);?>">
          <br>
          <br>
          <?php if ($error["lname"]!='') { ?>
          <div class="container text-center dibba fadein" style="text-align: center;align-self: center;">
          <div class="alert alert-danger " role="alert" style="width: 100%; align-self: center;border-radius: 20px;border: 1px solid maroon;">
            <?php echo htmlspecialchars($error["lname"]);?>  
          </div>
          </div><?php } ?>
          <input type="text" class="slidel" name="name" placeholder="Username" value="<?php echo htmlspecialchars($name);?>">
          <br>
          <br>
          <?php if ($error["name"]!='') { ?>
          <div class="container text-center dibba fadein" style="text-align: center;align-self: center;">
          <div class="alert alert-danger " role="alert" style="width: 100%; align-self: center;border-radius: 20px;border: 1px solid maroon;">
            <?php echo htmlspecialchars($error["name"]);?>  
          </div>
          </div><?php } ?>
          <input type="text" class="slider" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email);?>">
          <br>
          <br>
          <?php if ($error["email"]!='') { ?>
          <div class="container text-center dibba fadein" style="text-align: center;align-self: center;">
          <div class="alert alert-danger " role="alert" style="width: 100%; align-self: center;border-radius: 20px;border: 1px solid maroon;">
            <?php echo htmlspecialchars($error["email"]);?>  
          </div>
          </div><?php } ?>
          <div class="text-center">
          <input type="submit" name="submit" value="Edit" class="butt slide">
          </div>
        </form>
    </div>
<?php	

include('footer.php');
?>