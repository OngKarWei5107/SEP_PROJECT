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

    <center><h1>Delivery</h1></center>


    <div class="container p-5">
        <div class="">
            <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead class="thead-dark">
                    <tr>
                    <th class="th-sm">Customer Name <i class="fa fa-sort"></i>
                    </th>
                    <th class="th-sm">Customer Address <i class="fa fa-sort">
                    </th>
                    <th class="th-sm">Customer Phone <i class="fa fa-sort">
                    </th>
                    <th class="th-sm">Action
                    </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($customerList as $customerList):?>
                    <tr>
                    <td><?php echo $customerList->custName ?></td>
                    <td><?php echo $customerList->address ?></td>
                    <td><?php echo $customerList->phone ?></td>
                    <td>
                        <a href="<?php echo site_url('deliveryAndPickupController/acceptServRequest/'.$customerList->serv_ID);?>" class="view" title="Accept" data-toggle="tooltip"><i class="material-icons">&#xe5ca;</i></a>
                        <a href="<?php echo site_url('deliveryAndPickupController/rejectServRequest/'.$customerList->serv_ID);?>" title="Reject" data-toggle="tooltip"><i class="material-icons">&#xe14c;</i></a>
                    </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
    </div>

    
 
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
  </body>

  <script>
        $(document).ready(function () {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
        });
  </script>


</html>