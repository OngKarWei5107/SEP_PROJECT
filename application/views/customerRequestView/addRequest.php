<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="utf-8">
    <title>Manage Request</title>
    <?php require("includes/scripts.php"); ?>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
  </head>
<body>
<?php require("includes/navCustomer.php"); ?>
<h2>Request Repair Service</h2>
<form method="POST" action="">
  <table style="width:100%">
    <tr>
      <td><label for="type">Device Type:</label></td>
      <td><select name="type" id="type">
          <option value="Laptop">Laptop</option>
          <option value="SmartPhone">SmartPhone</option>
          <option value="PC">PC</option>
          <option value="Tablets">Tablets</option>
          </select><br><br>
      </td>
    </tr>
    <tr>
      <td><label for="brand">Device Brand & Model:</label></td>
      <td><input type="text" id="brand" name="brand"><br><br></td><br><br>
    </tr>
    <tr>
      <td><label for="symptom">Symptom/ Defect Type:</label></td>
      <td><input type="text" id="symptom" name="symptom"><br><br></td>
    </tr>
    <tr>
      <td><label for="message">Message:</label></td>
      <td><input style="width:200px; height:100px;" type="text" id="messages" name="messages"><br><br></td>
    </tr>
</table><br><br>
<input type="submit" name="request" value="Request">&nbsp;&nbsp;&nbsp;
<input type="reset" name="reset" value="Clear">
</form>

</body>
</html>
