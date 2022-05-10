<?php 
ob_start();
session_start();
include('connection.php');
if(!isset($_SESSION['user']))
header('Location: index.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Library Management System</title>


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style type="text/css">
            body {
    font-family: 'Poppins', sans-serif;
    background:  #edac32;
}

p {
    font-family: 'Poppins', sans-serif;
    font-size: 1.1em;
    font-weight: 300;
    line-height: 1.7em;
    color: #999;
}

a, a:hover, a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
}

.navbar {
    padding: 15px 10px;
    background: #f29818;
    border: none;
    border-radius: 0;
    margin-bottom: 40px;
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
}

.navbar-btn {
    box-shadow: none;
    outline: none !important;
    border: none;
    background-color: #ebbb38;
}

.line {
    width: 100%;
    height: 0.5px;
    background-color: white;

}

.wrapper {
    display: flex;
    align-items: stretch;
    perspective: 1500px;
}

#sidebar {
    min-width: 250px;
    max-width: 250px;
    background: #ebbb38;
    color: #fff;
    transition: all 0.6s cubic-bezier(0.945, 0.020, 0.270, 0.665);
    transform-origin: bottom left;
    border-right: 2px solid #f29818;
}

#sidebar.active {
    margin-left: -250px;
    transform: rotateY(100deg);
}

#sidebar .sidebar-header {
    padding: 20px;
    background: #f29818;
}

#sidebar ul.components {
    padding: 20px 0;
}

#sidebar ul p {
    color: #fff;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 1.5em;
    display: block;
    border-bottom: 1px solid #f29818;
}
#sidebar ul li a:hover {
    color: #ebbb38;
    background: #fff;
}

#sidebar ul li.active > a, a[aria-expanded="true"] {
    color: #fff;
    background: #f29818;
}


a[data-toggle="collapse"] {
    position: relative;
}

a[aria-expanded="false"]::before, a[aria-expanded="true"]::before {
    content: '\e259';
    display: block;
    position: absolute;
    right: 20px;
    font-family: 'Glyphicons Halflings';
    font-size: 0.6em;
}
a[aria-expanded="true"]::before {
    content: '\e260';
}


ul ul a {
    font-size: 1.35em !important;
    padding-left: 30px !important;
    border-top: 1px solid #ebbb38;
    background: #edac32;
}

ul.CTAs {
    padding: 20px;
}

ul.CTAs a {
    text-align: center;
    font-size: 0.9em !important;
    display: block;
    border-radius: 5px;
    margin-bottom: 5px;
}

a.download {
    background: #fff;
    color: #ebbb38;
}

a.article, a.article:hover {
    background: #f29818!important;
    color: #fff !important;
}

#content {
    padding: 20px;
    min-height: 100vh;
    transition: all 0.3s;
    width: 100%;
}

#sidebarCollapse {
    width: 40px;
    height: 40px;
    background: white;
    color: ;
    transition: 0.5s;
    border-radius: 5px;
}
#sidebarCollapse:hover {

    background: white;
    border: 2px solid white;
    background-color: #f29818;
    color: red;
}
.prof
{
    padding-right: 8px;
    padding-left: 8px;
    padding-top: 7px;
    padding-bottom: 4px;
    cursor: pointer;
    background-color:  white;
    color: #f29818;
    transition: 0.5s;
    border-radius: 5px;
}
.prof:hover
{
    margin-left:-8px;
    padding-right: 7px;
    padding-left: 7px;
    border: 2px solid white;
    border-right: 2px solid white;
    background-color: #f29818;
    color:white; 
}
#sidebarCollapse span {
    width: 80%;
    height: 2px;
    margin: 0 auto;
    display: block;
    background: #ebbb38;
    transition: all 0.8s cubic-bezier(0.810, -0.330, 0.345, 1.375);
    transition-delay: 0.2s;
}

#sidebarCollapse span:first-of-type {
    transform: rotate(45deg) translate(2px, 2px);
}
#sidebarCollapse span:nth-of-type(2) {
    opacity: 0;
}
#sidebarCollapse span:last-of-type {
    transform: rotate(-45deg) translate(1px, -1px);
}


#sidebarCollapse.active span {
    transform: none;
    opacity: 1;
    margin: 5px auto;
}
@media (max-width: 429px) 
{

}
@media (max-width: 768px) {
    #sidebar {
        margin-left: -250px;
        transform: rotateY(90deg);
    }
    #sidebar.active {
        margin-left: 0;
        transform: none;
    }
    #sidebarCollapse span:first-of-type,
    #sidebarCollapse span:nth-of-type(2),
    #sidebarCollapse span:last-of-type {
        transform: none;
        opacity: 1;
        margin: 5px auto;
    }
    #sidebarCollapse.active span {
        margin: 0 auto;
    }
    #sidebarCollapse.active span:first-of-type {
        transform: rotate(45deg) translate(2px, 2px);
    }
    #sidebarCollapse.active span:nth-of-type(2) {
        opacity: 0;
    }
    #sidebarCollapse.active span:last-of-type {
        transform: rotate(-45deg) translate(1px, -1px);
    }

}
#tools
{
    position: absolute;
    height: 300px;
    width: 200px;
    background-color: white;
    left:-100px;
    top:70px;
    z-index: 5;
    display: none;
    transition: 0.5s;
}
#tools:hover
{
    box-shadow: 0px 15px 18px 4px rgba(0,0,0,0.5);
}
#triangle{
    left: 30px;
    position: absolute;
    width: 0;
    height: 0;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent;
    border-bottom: 23px solid white;
    z-index: 1;
    display: none;
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
  #closeb
  {
    color:#f29818;
    position: absolute;
    right :7px;
    top: 5px;
    cursor: pointer;
    transition: 0.5s;
  }
  #closeb:hover
  {
    color:#ebbb38; 
  }
  .tb
  {
    font-size: 15px;
    width: 150px;
    padding: 5px;
    transition: 0.5s;
    background-color:#f29818;
    cursor: pointer; 
    margin-bottom: 7px;
    border-radius: 15px;
  }
  .tb:hover
  {
    background-color:white;
    color: #f29818;
    border: 2px solid #f29818;
  }
.table
{
    background-color: white;
    padding: 30px;
    border-radius: 15px;
    transition: 0.5s;
}
thead
{
    background-color:#f29818; 
    border-radius: 15px;
}
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
  .slideu {
    animation-name: slideu;
    -webkit-animation-name: slideu;
    animation-duration: 1s;
    -webkit-animation-duration: 1s;
    visibility: visible;
  }
  @keyframes slideu {
    0% {
      opacity: 0;
      transform: translateY(-30%);
    } 
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slideu {
    0% {
      opacity: 0;
      -webkit-transform: translateY(-30%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
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
  .drop
  {
    transition: 0.5s;
    padding-left: 10px;
    text-align: center;
    height: 50px;
    font-size: 20px; 
    background-color: #fac478;
    margin: 0px;border: 0px; 
    border-radius: 20px;
  }
  .drop:focus
  {
    border-color: #ed5509;
    background-color: white;
    box-shadow: 5px 0px 40px #ed5509;
    border-radius: 20px;
    outline: none; 
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
  textarea
  {
    width: 80%; 
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
  #profi
  {
    color:#f29818;
    font-size: 2em;
    border: 5px solid #f29818;
    padding: 10px;
    border-radius: 3em;
    cursor: pointer;
    transition: 0.5s;
  }
  #profi:hover
  {
    color:#ebbb38; 
  }
  .dashitems
  {
    background-color: #f29818;
    color:white;
    transition: 0.5s;
    padding: 5px;
    border-radius: 20px; 
    font-size: 20px;
  }
  .dashitems:hover
  {
    box-shadow: 5px 0px 40px #ed5509;  
  }
  textarea
  {
    transition: 0.5s;
    width: 50%;
    font-size: 20px; 
    background-color: #fac478;
    margin: 0px;border: 0px; 
    border-radius: 20px;
    padding: 20px;
  }
  textarea:focus
  {
    border-color: #ed5509;
    background-color: white;
  box-shadow: 5px 0px 40px #ed5509;
  border-radius: 20px;
  outline: none;
  }


        </style>
    </head>
    <body>



        <div class="wrapper">
            <nav id="sidebar">
                <div class="sidebar-header" style="padding: 10px;">
                    <h3 style="font-size: 25px;text-align: center;">Library Management System</h3>
                </div>

                <ul class="list-unstyled components" style="padding-top: 0px;">
                    <li>
                        <a href="studdash.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="#mprof" data-toggle="collapse" aria-expanded="false">Manage Profile</a>
                        <ul class="collapse list-unstyled" id="mprof">
                            <li><a href="eprofs.php">Edit Profile</a></li>
                            <li><a href="changeps.php">Change Password</a></li>
                            <li><a href="vprofs.php">View Profile</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="viewissue.php">View Issued Books</a>
                    </li>
                    <li>
                        <a href="checkavai.php">Check Availability of Books</a>
                    </li>
                    <li>
                        <a href="studmess.php">Send Messages</a>
                    </li>
                    <li>
                        <a href="sents.php">Sent Messages</a>
                    </li>
                    <li>
                        <a href="#messa" data-toggle="collapse" aria-expanded="false">Received Messages</a>
                        <ul class="collapse list-unstyled" id="messa">
                            <li><a href="received.php">Unread</a></li>
                            <li><a href="receivedall.php">All</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>


            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid text-center">

                        <div  class="container text-center" style="float: left;width:80px;">
                            <button type="button" id="sidebarCollapse" class="navbar-btn">
                                <span id="span1"></span>
                                <span id="span2"></span>
                                <span id="span3"></span>
                            </button>
                        </div>
                        <div class="container text-center" style="color: white;font-size: 25px;float: right;padding-top: 12px;width:80px;position:relative;">
                            <span class="prof" onclick="opent()">
                                <span class="glyphicon glyphicon-user"></span>  
                            </span>
                            <div id="triangle" class="fadein" style="animation-duration: 1s;"></div>
                            <div id="tools" class="fadein text-center" style="padding: 20px;">
                                <a href="vprofs.php"><span class="glyphicon glyphicon-user" id="profi"></span></a>
                                <h3 style="color: #f29818;"><?php echo $_SESSION['user'];  ?></h3>
                                <span class="glyphicon glyphicon-remove" id="closeb" onclick="closet()"></span>
                                <a href="eprofs.php"><div class="tb">Edit Profile</div></a>
                                <a href="changeps.php"><div class="tb">Change Password</div></a>
                                <a href="logout.php"><div class="tb">Logout</div></a>
                            </div>
                        </div>
                        
                    </div>
                </nav>