<html>

<head>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php require("includes/scripts.php"); ?>
    <link rel="stylesheet" type="text/css" href="../../includes/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
    .material-icons.md-48 {
        font-size: 48px;
        color: rgba(0, 0, 0, 0.54);
    }
    </style>


</head>

<body>
    <nav class="navbar navbar-expand-sm bg-light rounded my-3" style="height: 10%;">
        <ul class="navbar-nav navbar-left mr-auto">
            <li class="nav-brand"><a style="font-family: 'Pacifico', cursive; font-size: 30px;" class="nav-link"
                    href="<?php echo site_url('page/rider');?>">DERCS</a></li>
        </ul>
        <ul class="navbar-nav mr-2">
            <li class="nav-item justify-content-center align-self-center px-4">
                <a style="font-size: 20px;" class="nav-link" href="<?php echo site_url('');?>">Manage Delivery & Pickup</a>
            </li>
            <li class="nav-item justify-content-center align-self-center px-5">
                <a style="font-size: 20px;" class="nav-link" href="<?php echo site_url('registrationController/logout');?>">Log Out</a>
            </li>
        </ul>
    </nav>
</body>

</html>
