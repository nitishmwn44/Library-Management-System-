<?php
include('header.php');
$error=["fname"=>"","lname"=>"","name"=>"","password"=>"","email"=>"","roll"=>""];
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
  if(empty($_POST['lname']))
  {
      $error["lname"]="Receiver's Username is required";
      $noe=$noe+1;
  } 
  else
  {
      $lname = $_POST['lname'];
      $sql="SELECT * FROM students WHERE name='$lname'";
      $res=mysqli_query($conn,$sql);
      if(mysqli_num_rows($res)==0)
      {
      	$error["lname"]="Receiver must be a Registered User.Check the Username";
      }
  }

  if(empty($_POST['name']))
  {
      $error["name"]='Subject is required';
      $noe=$noe+1;
  } 
  else
  {
      $name = $_POST['name'];
      if(!preg_match("/.{3,}/",$name))
      {
        $error["name"]='Subject should be atleast 3 characters long.';
        $noe=$noe+1;
      }
  }

  if(empty($_POST['password']))
  {
      $error["password"]='Message is required';
      $noe=$noe+1;
  } 
  else
  {
      $password = $_POST['password'];
      if(!preg_match("/^.{5,}$/",$password))
      {
        $error["password"]='Message should be atleast 5 characters long.';
        $noe=$noe+1;
      }
  }
  if($noe==0)
  {
  	$fname=$_SESSION['user'];
  	$roll=date("d-m-Y");
    $sql="INSERT INTO messages(senderun,receiverun,subject,message,isread,senton) VALUES('$fname','$lname','$name','$password','no','$roll');";
    mysqli_query($conn,$sql);

    ?>
          <div class="container text-center dibba fadein" style="text-align: center;align-self: center;">
          <div class="alert alert-success" role="alert" style="width: 100%; align-self: center;border-radius: 20px;border: 1px solid maroon;">
            <?php echo "Message Sent";?>  
          </div>
          </div><?php
          	$fname='';
			$lname='';
			$name='';
			$email='';
			$roll='';
			$password='';
  }
}
?>
<div class="text-center" style="padding-top: 10px;">
        <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        	<div style="color: white;font-size: 25px;" class="fadein">From</div>
          <input type="text" class="slidel" name="fname" placeholder="From" disabled="" value="<?php echo htmlspecialchars($_SESSION['user']);?>">
          <br>
          <br>
          <?php if ($error["fname"]!='') { ?>
          <div class="container text-center dibba fadein" style="text-align: center;align-self: center;">
          <div class="alert alert-danger " role="alert" style="width: 100%; align-self: center;border-radius: 20px;border: 1px solid maroon;">
            <?php echo htmlspecialchars($error["fname"]);?>  
          </div>
          </div><?php } ?>
          <input type="text" class="slider" name="lname" placeholder="To" value="<?php echo htmlspecialchars($lname);?>">
          <br>
          <br>
          <?php if ($error["lname"]!='') { ?>
          <div class="container text-center dibba fadein" style="text-align: center;align-self: center;">
          <div class="alert alert-danger " role="alert" style="width: 100%; align-self: center;border-radius: 20px;border: 1px solid maroon;">
            <?php echo htmlspecialchars($error["lname"]);?>  
          </div>
          </div><?php } ?>
          <input type="text" class="slidel" name="name" placeholder="Subject" value="<?php echo htmlspecialchars($name);?>">
          <br>
          <br>
          <?php if ($error["name"]!='') { ?>
          <div class="container text-center dibba fadein" style="text-align: center;align-self: center;">
          <div class="alert alert-danger " role="alert" style="width: 100%; align-self: center;border-radius: 20px;border: 1px solid maroon;">
            <?php echo htmlspecialchars($error["name"]);?>  
          </div>
          </div><?php } ?>
          <div style="color: white;font-size: 25px;" class="fadein">Type your Message Here</div>
          <textarea name="password" rows="8" cols="30" class="slider">
			
		  </textarea>
          <br>
          <br>

          <?php if ($error["password"]!='') { ?>
          <div class="container text-center dibba fadein" style="text-align: center;align-self: center;">
          <div class="alert alert-danger " role="alert" style="width: 100%; align-self: center;border-radius: 20px;border: 1px solid maroon;">
            <?php echo htmlspecialchars($error["password"]);?>  
          </div>
          </div><?php } ?>
          <div class="text-center">
          <input type="submit" name="submit" value="Send" class="butt slide">
          </div>
        </form>
    </div>
<?php
include('footer.php');
?>