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
<?php require("includes/navStaff.php"); ?>
<h2>Request Repair Service Details</h2>

  <table style="width:150%">
    <?php
      foreach($data as $row){
    ?> 
    <tr>
      <td><label for="type">Request ID:</label></td>
      <td><?=$row['RequestID']?><br><br>
      </td>
      <td><label for="symptom">Symptom/ Defect Type:</label></td>
      <td><?=$row['Defect_Type']?><br><br>
    </tr>
    <tr>
       <td><label for="reqtime">Request Time/Date:</label></td>
      <td><?=$row['Request_Time']?><br><br>
      <td><label for="message">Message:</label></td>
      <td><?=$row['Message']?><br><br></td><br><br>
    </tr>
    <tr>
      <td><label for="dtype">Device Type:</label></td>
      <td><?=$row['Device_Type']?><br><br></td>
      <td><label for="cost">Estimate Cost:</label></td>
      <td><?=$row['Estimate_Cost']?><br><br></td>
    </tr>
    <tr>
      <td><label for="brand">Device Brand & Model:</label></td>
      <td><?=$row['Device_Model']?><br><br></td>
      <td><label for="stat">Status:</label></td>
      <td><?=$row['Request_Status']?><br><br></td>
    </tr>
    <?php } ?>
</table><br><br><br>
<input type="button" onclick="location.href='viewRequest.php'" value="BACK">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" onclick="location.href='#'" value="CHECKOUT">

</body>
</html>
