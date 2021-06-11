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
<h2>My Request</h2>
<td><form method="POST" action="">
<table border='1'>
    <th>Request ID</th>
    <th>type</th>
    <th>brand</th>
    <th>symptom</th>
    <th>Request Status</th>
<?php
  foreach($data as $row){
    echo "<tr>" 
    . "<td>".$row->reqID."</td>"
    . "<td>".$row->type."</td>"
    . "<td>".$row->brand."</td>"
    . "<td>".$row->symptom."</td>"
    . "<td>".$row->ReqStatus."</td>";

?> 
    </table>
   </form></td>
 
  <?php 
   echo "</tr>"; 
 } 
 ?>

</table>

</body>
</html>
