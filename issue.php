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
      $error["fname"]='Username of Student is required';
      $noe=$noe+1;
  } 
  else
  {
      $fname = $_POST['fname'];
      if(!preg_match("/^.{3,50}$/",$fname))
      {
        $error["fname"]='Username must be atleast 3 Chracters long';
        $noe=$noe+1;
      }
      else
      {
      	$sql="SELECT * FROM students WHERE name='$fname'";
        $res=mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)==0)
        {
          $error["fname"]='Enter Username of an existing user';
          $noe=$noe+1;
        }	
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

  $password=date("d-m-Y");

  if($noe===0&&$match==2)
  {
    $sql="SELECT * FROM books WHERE name='$lname' AND edition='$name'";
    $res=mysqli_query($conn,$sql);
    if($row=mysqli_fetch_assoc($res))
    {
    if($row['available']>0)
    {
      $sql="UPDATE books SET available=available-1 WHERE name='$lname' AND edition='$name'";
      mysqli_query($conn,$sql);
      $sql="INSERT INTO libops(studname,bookname,bookedi,issued,returnd) VALUES('$fname','$lname','$name','$password','');";
      mysqli_query($conn,$sql);
      ?>
        <div class="container text-center dibba fadein" style="text-align: center;align-self: center;">
        <div class="alert alert-success " role="alert" style="width: 100%; align-self: center;border-radius: 20px;">
          Book has been Issued successfully
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

          <input type="text" class="slidel" name="fname" placeholder="Username of Student" value="<?php echo htmlspecialchars($fname);?>">
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
          <div style="color: white;font-size: 25px;" class="slider">Issue Date (Today's Date)</div>
          <br>
          <input type="text" class="slider" name="password" placeholder="Quantity of Books" value="<?php echo date("d-m-Y"); ?>" disabled="">
          <br>
          <br>
          <div class="text-center">
          <input type="submit" name="submit" value="Issue" class="butt slide">
          </div>
        </form>
      </div>
<?php
include('footer.php');
?>