<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<?php require("includes/scripts.php"); ?>
</head>
<body>
	<div class="mx-auto" style="width: 90%">
	 <nav class="navbar navbar-expand-sm bg-light rounded my-3" style="height: 10%;">
        <ul class="navbar-nav navbar-left mr-auto">
            <li class="nav-brand"><a style="font-family: 'Pacifico', cursive; font-size: 30px;" class="nav-link"
                    >DERCS</a></li>
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
									<div class="sign-up">
										Login as Staff <a href="<?php echo site_url('loginStaff/');?>">Click here</a>
									</div>
									<div class="sign-up">
										Login as Rider <a href="<?php echo site_url('loginRider/');?>">Click here</a>
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
