<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/style.css');?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style type="text/css">body {min-width: 100vw;min-height: 100vh;}</style>
</head>
<body>
<div class="login_outer">
  <div class="login_inner">
    <div class="container">
      <h2>Admin Login</h2>
      <h2><?php echo $this->session->flashdata('invalid_login'); ?></h2> 
      <form action="" method="post">
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" required placeholder="Enter email" name="email">
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" id="pwd" required placeholder="Enter password" name="password">
        </div>
          
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>
