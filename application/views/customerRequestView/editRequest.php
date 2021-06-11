<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="utf-8">
    <title>Manage Account</title>
    <?php require("includes/scripts.php"); ?>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
  </head>
<body>
<?php require("includes/navCustomer.php"); ?>
<h2>Request Repair Service</h2>
<form method="POST" action="">
  <table style="width:100%">
    <?php
      foreach($data as $row){
    ?>
    <tr>
      <td><label for="type">Device Type:</label></td>
       <td><input type="text" id="brand" name="type" value="<?=$row['Device_Type']?>" readonly><br><br></td><br><br>
    </tr>
    <tr>
      <td><label for="brand">Device Brand & Model:</label></td>
      <td><input type="text" id="brand" name="brand" value="<?=$row['Device_Model']?>"><br><br></td><br><br>
    </tr>
    <tr>
      <td><label for="symptom">Symptom/ Defect Type:</label></td>
      <td><input type="text" id="symptom" name="symptom" value="<?=$row['Defect_Type']?>"><br><br></td>
    </tr>
    <tr>
      <td><label for="messages">Message:</label></td>
      <td><input type="text" id="messages" name="messages" value="<?=$row['Message']?>"><br><br></td>
    </tr>
    <?php } ?>
</table><br><br><br>
<input type="hidden" name="CustomerID" value="<?=$row['CustomerID']?>"><input type="submit" name="update" value="UPDATE">&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" onclick="location.href='editRequest.php'" value="BACK">
</form>

</body>
</html>
