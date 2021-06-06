<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Welcome</title>
    <?php require("includes/scripts.php"); ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
  </head>
  <body>
    <?php require("includes/navRider.php"); ?>
    <center><h1>Customer Info</h1></center>
    <div class="container p-5" >
        <?php foreach ($result as $result):?>
            <div class="row">
                <div class="col-md-4">
                    <label>Customer Name :</label>
                </div>
                <div class="col-md-6">
                    <p><?php echo set_value('custName', $result->custName); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>Customer Address :</label>
                </div>
                <div class="col-md-6">
                    <p><?php echo set_value('address', $result->address); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>Customer Phone :</label>
                </div>
                <div class="col-md-6">
                    <p><?php echo set_value('phone', $result->phone); ?></p>
                </div>
            </div>
            <form action="<?php echo site_url('deliveryAndPickupController/updateStatus/').$result->serv_ID;?>" method="post">
            <div class="row">
                <div class="col-md-4">
                    <label>Status :</label>
                </div>
                <div class="col-md-6">
                    <select name="status" id="status">
                        <option>Preparing</option>
                        <option>On the way to your location</option>
                        <option>Success</option>
                    </select>
                    <div class="from-group">
                        <input type="submit" value="Update" class="btn btn-primary"></input>
                    </div>
                </div>
            </div>
            </form>
        <?php endforeach ?>
    </div>
 
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
  </body>
</html>