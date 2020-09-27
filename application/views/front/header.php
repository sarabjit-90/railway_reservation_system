<!DOCTYPE html>
<html lang="en">
<head>
  <title>Railway Reservation System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/style.css');?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    
  </style>
  <style>
</style>
</head>
<body class="appBody">

<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Railway Reservation System</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <!--ul class="nav navbar-nav navbar-right">
        <li onclick="document.getElementById('id01').style.display='block'"><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul-->
      <ul class="nav navbar-nav navbar-right">
    
        <?php if(!empty($this->session->userdata('user'))){ ?>
            
            <li ><a href="<?php echo base_url('logout'); ?>"><span class="glyphicon glyphicon-log-in"></span> logout</a></li>

        <?php  }else{ ?>
            <li onclick="document.getElementById('id01').style.display='block'"><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <?php  } ?>
      </ul>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul>


    </div>
  </div>
</nav>
 



<div id="id01" class="modal">
  
  <form class="modal-content animate cusWdt" action="<?php echo base_url('login') ?>" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      
    </div>

    <div class="containerModal">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
      <div class="mdl_btn">
        <input type="submit" type="submit" value="login">
        <button  class="cancelbtn">Cancel</button>
      </div>
      
    </div>
  </form>
</div>
