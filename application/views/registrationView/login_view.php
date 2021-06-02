<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<?php require("src/scripts.php"); ?>
</head>
<body>
	<?php require("src/nav.php"); ?>
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
	<?php require("src/footer.php"); ?>
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