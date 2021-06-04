<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Welcome</title>
    <?php require("includes/scripts.php"); ?>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
  </head>
  <body>
    <?php require("includes/navRider.php"); ?>

      <div class="container">
        <div class="row">


 
          <div class="jumbotron">
          <h1><center>Welcome Back <?php echo $this->session->userdata('username');?></center></h1>
          </div>
 
        </div>
        </div>

    
 
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
  </body>
</html>