
<html>

<head>
    <meta charset="utf-8">
    <title>update Account</title>
    <?php require("includes/scripts.php"); ?>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
  </head>

<body>
    <?php require("includes/navCustomer.php"); ?>
        <br />
        <?php

        foreach ($data as $row) {
        ?>
        <form method="POST" >
            <div class="input-group mb-3 col-6">
                <div class="input-group-prepend ">
                    <span class="input-group-text">Username</span>
                </div>
                <input type="text" name="username" class="form-control" value="<?= $row->username ?>" readonly>
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
                <input type="text" name="phone" class="form-control" value="<?= $row->phone ?>">
            </div>

            <div class="input-group mb-3 col-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">Address</span>
                </div>
                <input type="text" name="address" class="form-control " placeholder="Address"
                    value="<?= $row->address ?>" >
            </div>

            <div class="input-group mb-3 col-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">Email</span>
                </div>
                <input type="text" name="email" class="form-control " placeholder="Email"
                    value="<?= $row->email ?>" readonly>
            </div>
            
            <button type="submit" class="btn btn-primary btn-lg btn-warning"
                onclick="return confirm('Are you sure you want to update?');" name="update" value="updateInfo">Update</button>

        </form>
        <?php } ?>
    </div>
</body>

</html>