<?php
require __DIR__ . '/../../../src/bootstrap.php';
require_once __DIR__ . '/../../controller/userProfileController/cusProfileController.php';

$cus = new cusProfileController();
$data = $cus->viewCusProfile();


?>

<html>

<head>
    <title></title>
</head>

<body>
    <div class="mx-auto" style="width: 90%;">
        <?php require __DIR__ . '/../../src/navbar.php' ?>
        <h5>Customer Homepage > Profile</h5>
        <a href="../viewServiceView/CusHomePage.php">
            <span class="material-icons md-48 text-primary my-3">
                arrow_back
            </span>
        </a>
        <br />
        <?php
        foreach ($data as $row) {
        ?>
        <form method="POST">
            <div class="input-group mb-3 col-6">
                <div class="input-group-prepend ">
                    <span class="input-group-text">Username</span>
                </div>
                <input type="text" name="name" class="form-control" value="<?= $row['username'] ?>" readonly>
            </div>

            <div class="input-group mb-3 col-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">Password</span>
                </div>
                <input type="password" name="password" class="form-control" value="<?= $row['password'] ?>" readonly>
            </div>

            <div class="input-group mb-3  col-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">Contact No</span>
                </div>
                <input type="text" name="telno" class="form-control" value="<?= $row['phone'] ?>" readonly>
            </div>

            <div class="input-group mb-3 col-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">Address</span>
                </div>
                <input type="text" name="address_line_1" class="form-control " placeholder="Address"
                    value="<?= $row['address'] ?>" readonly>
            </div>

            <div class="input-group mb-3 col-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">Email</span>
                </div>
                <input type="text" name="email" class="form-control " placeholder="Email"
                    value="<?= $row['email'] ?>" readonly>
            </div>
            
            <button type="submit" class="btn btn-primary btn-lg btn-warning"
                onclick="updateInfo.php" name="edit">Edit</button>

        </form>
        <?php } ?>
    </div>
</body>

</html>