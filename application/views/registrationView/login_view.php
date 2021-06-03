<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User Login</title>
	<?php require("includes/scripts.php"); ?>
	<link rel="stylesheet" type="text/css" href="../../includes/login.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="mx-auto" style="width: 90%">
	 <nav class="navbar navbar-expand-sm bg-light rounded my-3" style="height: 10%;">
        <ul class="navbar-nav navbar-left mr-auto">
            <li class="nav-brand"><a style="font-family: 'Pacifico', cursive; font-size: 30px;" class="nav-link"
                    >DERCS - Computer Repair Management System</a></li>
        </ul>

        <ul class="navbar-nav mr-2">
                <li class="nav-item justify-content-center align-self-center pl-md-5">
                	<a style="font-size: 20px;" class="nav-link" href="<?php echo site_url('register/');?>">SIGN UP</a>
                </li>
                <li class="nav-item justify-content-center align-self-center mr-5">
                    <a style="font-size: 20px;" class="nav-link" href="<?php echo site_url('login/');?>">LOG IN</a>
                </li>
       	</ul>
    </nav>
	</div>
	
	<div class="main-content">
		<div class="container">
			<div class="container h-100">
				<div class="row h-100 justify-content-center align-items-center">
					<div class="card login-form">
						<div class="card-body">
							<h3 class="card-title text-center">Log in to Your Account</h3>
							<div class="card-text">
								<div class="alert alert-info" id="errorAlert" role="alert" hidden>
								</div>
								<form class="form-signin form" action="<?php echo site_url('login/auth');?>" method="post">
									<div class="form-group">
										<label for="email">Email address</label>
										<input type="email" name="email" id="email" class="form-control form-control-sm">
									</div>
									<div class="form-group">
										<label for="password">Password</label>
										<input type="password" name="password" id="password" class="form-control form-control-sm">
									</div>
									<button type="submit" id="loginBtn" class="btn btn-primary btn-block">Sign in</button>
									<div class="sign-up">
										Don't have an account? <a href="<?php echo site_url('register/');?>">Register here</a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require("includes/footer.php"); ?>
</body>
</html>

<script>
	$(document).ready(function() {
			var userId = "<?php echo $this->session->flashdata('user-id');?>";
			var loginError = "<?php echo $this->session->flashdata('login-error');?>";

			console.log("Last inserted user_id: " + userId);

			if(loginError){
				$('#errorAlert').attr("hidden",false);
				$('#errorAlert').html(loginError);
			}

		});

	</script>
