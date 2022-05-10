<?php
session_start();
include('connection.php');
  ?>
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
  .tabl
  {
    background-color: #e0c475;
    padding: 10px;
    font-size: 20px;
    color: white;
    border-radius: 20px 0px 0px 20px;
      }
  .tabr
  {
    background-color: #e0c475;
    padding: 10px;
    font-size: 20px;
    color: white;
    border-radius: 0px 20px 20px 0px;

  }
  .tabm
  {
    background-color: #e0c475;
    padding: 10px;
    font-size: 20px;
    color: white;
    border-left: 3px solid #f29818;
    border-right: 3px solid #f29818;

  }
  .butt
  {
    height: 50px;
    width: 200px;
    background-color: #f29818;
    color: white ;
    font-size: 20px;
    transition: 0.5s;
    border: 0px;
    border-radius: 15px;
  }
  .butt:hover
  {
    color: #f29818;
    background-color: white;
    font-size: 25px;
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

.slidet {
    animation-name: slidet;
    -webkit-animation-name: slidet;
    animation-duration: 1s;
    -webkit-animation-duration: 1s;
    visibility: visible;
  }
@keyframes slidet {
    0% {
      opacity: 0;
      transform: translateY(-20%);
    } 
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slidet {
    0% {
      opacity: 0;
      -webkit-transform: translateY(-20%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }


  .slider {
    animation-name: slider;
    -webkit-animation-name: slider;
    animation-duration: 1s;
    -webkit-animation-duration: 1s;
    visibility: visible;
  }
  .inactive
  {
    cursor: pointer;
    transition: 0.5s;
    background-color: #edac32;
    font-size: 20px;
  }
  .inactive:hover
  {
    margin-top: -3px;
    background-color:white;
    color: #edac32;
    font-size: 25px;
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
.fadein {
    animation-name: fadein;
    -webkit-animation-name: fadein;
    animation-duration: 1s;
    -webkit-animation-duration: 1s;
    visibility: visible;
  }
@keyframes fadein {
    0% {
      opacity: 0;
    } 
    100% {
      opacity: 1;
    }
  }
  @-webkit-keyframes fadein {
    0% {
      opacity: 0;
    } 
    100% {
      opacity: 1;
    }
  }
  @keyframes fadeinn {
    0% {
      opacity: 0;
    } 
    100% {
      opacity: 0.5;
    }
  }
  @-webkit-keyframes fadeinn {
    0% {
      opacity: 0;
    } 
    100% {
      opacity: 0.5;
    }
  }
  @keyframes rfadeinn {
    0% {
      opacity: 0.5;
    } 
    100% {
      opacity: 0;
    }
  }
  @-webkit-keyframes rfadeinn {
    0% {
      opacity: 0.5;
    } 
    100% {
      opacity: 0;
    }
  }
  .vibrate {
    animation-name: vibrate;
    animation-duration: 0.5s;
    animation-iteration-count: infinite;
  }
@keyframes vibrate {
    0% 
    {
      transform:translateX(0%);
    }
    25%
    {
      transform:translateX(2%);
    }
    50%
    {
      transform:translateX(0%);
    }
    75%
    {
      transform:translateX(-2%);
    } 
    100% {
      transform:translateX(0%);
    }
  }
  input[type="text"]
  {
    transition: 0.5s;
    text-align: center;
    width: 50%;
    height: 50px;
    font-size: 20px; 
    background-color: #fac478;
    margin: 0px;border: 0px; 
    border-radius: 20px;
  }
  input[type="text"]:focus
  {
    border-color: #ed5509;
    width: 60%;
    background-color: white;
  box-shadow: 5px 0px 40px #ed5509;
  border-radius: 20px;
  outline: none;
  }
  input[type="password"]
  {
    transition: 0.5s;
    text-align: center;
    width: 50%;
    height: 50px;
    font-size: 20px; 
    background-color: #fac478;
    margin: 0px;border: 0px; 
    border-radius: 20px;
  }
  input[type="password"]:focus
  {
    border-color: #ed5509;
    width: 60%;
    background-color: white;
  box-shadow: 5px 0px 40px #ed5509;
  border-radius: 20px;
  outline: none;
  }
  .dibba
  {
    width: 70% ;
    
    transition: 0.5s;
  }
@media screen and (max-width: 855px) {
.inactive
  {
    cursor: pointer;
    transition: 0.5s;
    background-color: #edac32;
    font-size: 15px;
  }
  .inactive:hover
  {
    margin-top: -3px;
    background-color:white;
    color: #edac32;
    font-size: 20px;
  }
  .tabm
  {
    font-size: 15px;  
  }
  }
@media screen and (max-width: 768px) 
  {
    .dibba
  {
    width: 95%;
  }
  input[type="text"]
  {
    width: 80%;
  }
  input[type="text"]:focus
  {
    width: 90%;
  }
  input[type="password"]
  {
    width: 80%;
  }
  input[type="password"]:focus
  {
    width: 90%;
  }
  .tabl
  {




    border-radius: 20px 20px 0px 0px;
      }
  .tabr
  {

    border-radius: 0px 0px 20px 20px;

  }
  .tabm
  {

    border: 0px;
    border-top: 3px solid #f29818;
    border-bottom:  3px solid #f29818;

  }
}
#toolbox
  {
  	height: 60px;
  	width: 60px;
  	background-color: #f29818;
  	border-radius: 2em;
  	position: fixed;
  	text-align: center;
  	top: 47%;left: 20px;
  	transition: 0.5s;
  	cursor: pointer;
  	z-index: 10;
  	color: white;	
  }
  #toolbox:hover
  {
  	height: 70px;
  	width: 70px;
  	border-radius: 3em;
  	padding-top: 5px;
  	background-color: white;
  	border: 1px solid #f29818; 
  	color: #f29818;
  }
  #toolcl
  {
  	height: 60px;
  	width: 60px;
  	background-color: #d13219;
  	border-radius: 2.5em;
  	position: fixed;
  	text-align: center;
  	top: 47%;left: 20px;
  	transition: 0.5s;
  	cursor: pointer;
  	z-index: 10;
  	color: white;
  	display: none;
  }
  #toolcl:hover
  {
  	height: 70px;
  	width: 70px;
  	border-radius: 3em;
  	padding-top: 5px;
  	background-color: white;
  	border: 1px solid #d13219; 
  	color: #d13219;
  }
  #blur
  {
  	position: fixed;
  	height: 100%;
  	width: 100%;
  	background-color: grey;
  	opacity: 0.5;
  	z-index: 5;
  	transition: 0.5s;
  	display: none;
  	animation-name: fadeinn;
    -webkit-animation-name: fadeinn;
    animation-duration: 1s;
    -webkit-animation-duration: 1s;
  }
  #revblur
  {
  	position: fixed;
  	height: 100%;
  	width: 100%;
  	background-color: grey;
  	opacity: 0;
  	z-index: 5;
  	transition: 0.5s;
  	display: none;
  	animation-name: rfadeinn;
    -webkit-animation-name: rfadeinn;
    animation-duration: 1s;
    -webkit-animation-duration: 1s;
  }
  #tools
  {
  	width: 70%;
  	position:fixed;
  	z-index: 15;
  	top: 17%;
  	display: none;
  }
  .tool
  {
  	padding: 30px;
  	cursor: pointer;
  	transition: 0.5s;
  	background-color:#f29818;
  	border-radius: 20px;
  	height: 100%; 
  }
  .tool:hover
  {
  	padding: 10px;
  	background-color: #d13219; 
  }
  </style>
</head> 
<body>
	<div id="blur"></div>
	<div id=revblur></div>
	<div id="toolcl" class="slidel" onclick="closetools()">
		<span class="glyphicon glyphicon-remove" style="font-size: 3em;position: relative;top: 8.5px;left: 0.5px;"></span>
	</div>
	<div id="toolbox" class="slidel" onclick="opentools()">
		<span class="glyphicon glyphicon-th" style="font-size: 3em;position: relative;top: 7px;left: 2px;"></span>
	</div>
	<div class="container text-center">
	<div class="container text-center" id="tools">
		<div class="row text-center">
			<div class="col-sm-3 text-center slidel" style="padding: 20px;">
				<div class="tool">
					<img src="imag/html.png" width="80%">	
				</div>
			</div>
			<div class="col-sm-3 text-center slidet" style="padding: 20px;">
				<div class="tool">
					<img src="imag/html.png" width="80%">	
				</div>
			</div>
			<div class="col-sm-3 text-center slidet" style="padding: 20px;">
				<div class="tool">
					<img src="imag/html.png" width="80%">	
				</div>
			</div>
			<div class="col-sm-3 text-center slider" style="padding: 20px;">
				<div class="tool">
					<img src="imag/html.png" width="80%">	
				</div>
			</div>
		</div>
		<div class="row text-center">
			<div class="col-sm-3 text-center slidel" style="padding: 20px;">
				<div class="tool">
					<img src="imag/html.png" width="80%">	
				</div>
			</div>
			<div class="col-sm-3 text-center slide" style="padding: 20px;">
				<div class="tool">
					<img src="imag/html.png" width="80%">	
				</div>
			</div>
			<div class="col-sm-3 text-center slide" style="padding: 20px;">
				<div class="tool">
					<img src="imag/html.png" width="80%">	
				</div>
			</div>
			<div class="col-sm-3 text-center slider" style="padding: 20px;">
				<div class="tool">
					<img src="imag/html.png" width="80%">	
				</div>
			</div>
		</div>
	</div>
	</div>
	<div>
		<?php echo "Hello ".$_SESSION["user"];  ?>	
	</div>
	<script src="stud.js"></script>
</body>
</html>