
<html>

<head>
     <meta charset="utf-8">
    <title>Manage Account</title>
    <?php require("includes/scripts.php"); ?>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
  </head>

<body>
     <?php require("includes/navCustomer.php"); ?>
        <br />
        <?php
       
        foreach($data as $row){
        ?>
        <form method="POST" >
            <div class="input-group mb-3 col-6">
                <div class="input-group-prepend ">
                    <span class="input-group-text">Username</span>
                </div>
                <input type="text" name="name" class="form-control" value="<?= $row->username ?>" readonly>
            </div>

            <div class="input-group mb-3 col-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">Password</span>
                </div>
                <input type="password" name="password" class="form-control" value="<?= $row->password ?>" readonly>
            </div>

            <div class="input-group mb-3  col-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">Contact No</span>
                </div>
                <input type="text" name="telno" class="form-control" value="<?= $row->phone ?>" readonly>
            </div>

            <div class="input-group mb-3 col-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">Address</span>
                </div>
                <input type="text" name="address_line_1" class="form-control " placeholder="Address"
                    value="<?= $row->address ?>" readonly>
            </div>

            <div class="input-group mb-3 col-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">Email</span>
                </div>
                <input type="text" name="email" class="form-control " placeholder="Email"
                    value="<?= $row->email ?>" readonly>
            </div>
            <?php echo "<a href='updateAccount?username=".$this->session->userdata('username')."'>Update</a>";
            ?>
        </form>
        <?php } ?>
    </div>
</body>

</html>