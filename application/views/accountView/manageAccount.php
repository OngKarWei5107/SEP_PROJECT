<html>
<head>
<meta charset="utf-8">
    <title>update Account</title>
    <?php require("includes/scripts.php"); ?>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
  </head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>

 
<body>
   <?php require("includes/navStaff.php"); ?>
<table width="600" border="0" cellspacing="5" cellpadding="5">
  <tr style="background:#CCC">
    <th>Customer ID</th>
    <th>full name</th>
    <th>username</th>
    <th>email</th>
    <th>phone</th>
    <th>address</th>
    <th>Action</th>
  </tr>
  <?php
  $i=1;
  foreach($data as $row)
  {
  echo "<tr>";
  echo "<td>".$i."</td>";
  echo "<td>".$row->custName."</td>";
  echo "<td>".$row->username."</td>";
  echo "<td>".$row->email."</td>";
  echo "<td>".$row->phone."</td>";
  echo "<td>".$row->address."</td>";
  echo "<td><a href='editAccount?custID=".$row->custID."'>Edit</a>&nbsp;&nbsp;&nbsp;<a href='deleteAccount?custID=".$row->custID."'>Delete</a>&nbsp;&nbsp;&nbsp;<a href='banAccount?custID=".$row->custID."'>Ban</a></td>";
  echo "</tr>";
  $i++;
  }
   ?>
</table>
</body>
</html>