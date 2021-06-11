<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Welcome</title>
    <?php require("includes/scripts.php"); ?>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
  </head>
  <body>
    <?php require("includes/navCustomer.php"); ?>

    <center><h1>Check Delivery & Pickup Progress</h1></center>


    <div class="container p-5">
        <div class="">
            <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead class="thead-dark">
                    <tr>
                    <th class="th-sm">Rider Plat No <i class="fa fa-sort"></i>
                    </th>
                    <th class="th-sm">Rider Contact <i class="fa fa-sort">
                    </th>
                    <th class="th-sm">Service <i class="fa fa-sort">
                    </th>
                    <th class="th-sm">Progress <i class="fa fa-sort">
                    </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($progress as $progress):?>
                    <tr>
                    <td><?php echo $progress->rider_platNo ?></td>
                    <td><?php echo $progress->rider_contact ?></td>
                    <td><?php echo $progress->serv_name ?></td>
                    <td><?php echo $progress->status ?></td>
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