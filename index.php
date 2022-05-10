<!DOCTYPE html>
<html lang="en">
<head>
  <title>Library Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="imagehover.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">
    .main-bg
    {
      background: url(imag/lib.jpg) no-repeat center;
      background-size: cover;
      -webkit-background-size: cover;
     -moz-background-size: cover;
      -o-background-size: cover;
     -ms-background-size: cover;
     min-height: 100vh;
    }
    .logi
    {
      background-color:#e0c475;
      color: white;
      border-radius: 30px;
      transition: 0.5s;
      cursor: pointer;
      padding: 20px;
      font-size: 25px;
    }
    .logi:hover {
      background-color: #f7c843;
    box-shadow: 5px 0px 40px rgb(77, 78, 79);
    padding: 10px;
    padding-top: 20px;
    padding-bottom: 20px;
    font-size: 35px;
  }
  .slide {
    animation-name: slide;
    -webkit-animation-name: slide;
    animation-duration: 1s;
    -webkit-animation-duration: 1s;
    visibility: visible;
  }
@keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(30%);
    } 
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(30%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  .slidel {
    animation-name: slidel;
    -webkit-animation-name: slidel;
    animation-duration: 1s;
    -webkit-animation-duration: 1s;
    visibility: visible;
  }
@keyframes slidel {
    0% {
      opacity: 0;
      transform: translateX(-20%);
    } 
    100% {
      opacity: 1;
      transform: translateX(0%);
    }
  }
  @-webkit-keyframes slidel {
    0% {
      opacity: 0;
      -webkit-transform: translateX(-20%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateX(0%);
    }
  }
  .slider {
    animation-name: slider;
    -webkit-animation-name: slider;
    animation-duration: 1s;
    -webkit-animation-duration: 1s;
    visibility: visible;
  }
@keyframes slider {
    0% {
      opacity: 0;
      transform: translateX(20%);
    } 
    100% {
      opacity: 1;
      transform: translateX(0%);
    }
  }
  @-webkit-keyframes slider {
    0% {
      opacity: 0;
      -webkit-transform: translateX(20%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateX(0%);
    }
  }
  </style>
</head> 
<body>
  <div class="main-bg" style="text-align: center;padding-bottom: 50px;">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container text-center" style="width: 70% ;background-color:#ebbb38;border-radius: 25px; padding-bottom: 50px;">
      <h1 class="slide" style="color: white;">
        Library Login Page
      </h1> 
      <hr>
      <div class="row">
        <div class="col-sm-6 slidel" style="padding: 10px; padding-right: 30px;padding-left: 30px;">
          <a href="adminl.php" style="color: white;text-decoration: none;">
          <div class="logi">
            <img src="imag/admin.jpg" style="width: 60%;border-radius: 25px;">
            <br>
            <hr>
            Admin Login
          </div>  
          </a>
        </div>
        <div class="col-sm-6 slider" style="padding: 10px;padding-right: 30px;padding-left: 30px;">
          <a href="studl.php" style="color: white;text-decoration: none;">
          <div class="logi">
            <img src="imag/student.png" style="width: 57.5%;border-radius: 25px;">
            <br>
            <hr>
            Student Login 
          </div>
          </a> 
        </div>
      </div>
    </div>  
  </div>

<script>
$(document).ready(function(){
  
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    
    if (this.hash !== "") {
      
      event.preventDefault();

      
      var hash = this.hash;

      
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
       
        window.location.hash = hash;
      });
    } 
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>
</body>
</html>