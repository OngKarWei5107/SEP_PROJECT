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

<table border='1'>
    <th>Request ID</th>
    <th>Request Status</th>
<?php
  foreach($data as $row){
    echo "<tr>" 
    . "<td>".$row['RequestID']."</td>"
    . "<td>".$row['Request_Status']."</td>";
?> 
<td><form method="POST" action="">
    <button type="button" onclick="location.href='editRequest.php?ReqID=<?=$row['ReqID']?>&CustomerID=<?=$row['CustomerID']?>'" value="Edit"><i class="fa fa-edit"></i><input type="hidden" name="CustomerID" value="<?=$row['CustomerID']?>"><input type="hidden" name="RequestID" value="<?=$row['RequestID']?>"></button>&nbsp;&nbsp;<button class="btn" name="delete" ><i class="fa fa-trash"></i></button></form></td>
     <td><form method="POST" action="">
      <input type="button" onclick="location.href='viewRequest.php?ReqID=<?=$row['ReqID']?>'" value="View"></td>
   </form></td>
 
  <?php 
   echo "</tr>"; 
 } 
 ?>

</table>

</body>
</html>
