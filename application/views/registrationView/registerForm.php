<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration Form</title>
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

	<div class="container">
		<div class="container h-100">
			<div class="row h-100 justify-content-center align-items-center">
				<div class="card login-form">
					<div class="card-body">
						<h3 class="card-title text-center">Registration</h3>
						<form action="#" id="form" novalidate>
							<div class="form-row">
								<div class="col-sm-12">
									<div class="form-group">
										<label for="name">Full Name</label>
										<input name="name" placeholder="Name" class="form-control" type="text">
										<div class="invalid-feedback"></div>
									</div>
									<div class="form-group">
										<label for="email">Email</label>
										<input name="email" placeholder="Email" class="form-control" type="email">
										<div class="invalid-feedback"></div>
									</div>
									<div class="form-group">
										<label for="password">Password</label>
										<input name="password" placeholder="Password" class="form-control" type="password">
										<div class="invalid-feedback"></div>
									</div>
									<div class="form-group">
										<label for="contact_no">Contact No.</label>
										<input name="contact_no" placeholder="Contact No." class="form-control" type="text">
										<div class="invalid-feedback"></div>
									</div>
									<div class="form-group">
										<label for="address">Address</label>
										<input name="address" placeholder="Address" class="form-control" type="text">
										<div class="invalid-feedback"></div>
									</div>

									<button type="button" id="btnSave" class="btn btn-primary btn-block" onclick="save()">Sign Up</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require("includes/footer.php"); ?>
</body>
</html>

<?php echo $this->session->flashdata('msg');?>

<script>
	$(document).ready(function() {
	    $("input").keydown(function(){
	    	$(this).removeClass('is-invalid');
	    	$(this).next().empty();
	    });
	    $("select").change(function(){
	    	$(this).removeClass('is-invalid');
	    	$(this).next().empty();
	    });
	});

	function save()
	{
		var url = "<?php echo site_url('register/registerCust')?>";

	$('#btnSave').html('Registering...'); //change button text
	$('#btnSave').attr('disabled',true); //set button disable

	// ajax adding data to database
	var formData = new FormData($('#form')[0]);
	$.ajax({
		url : url,
		type: "POST",
		data: formData,
		contentType: false,
		processData: false,
		dataType: "JSON",
		success: function(data)
		{
			if(data.status) //if success close modal and reload ajax table
			{
				alert("Successfully registered!");
				window.location.href = "<?php echo site_url('login/')?>";
			}
			else
			{
				for (var i = 0; i < data.inputerror.length; i++)
				{
					$('[name="'+data.inputerror[i]+'"]').addClass("is-invalid"); //select input and add is-invalid class
					$('[name="'+data.inputerror[i]+'"]').next().html(data.error_string[i]); //select error div and set text error string
				}
			}
			$('#btnSave').html('Register'); //change button text
			$('#btnSave').attr('disabled',false); //set button disable
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
			alert('Failed to register');
			$('#btnSave').html('Register'); //change button text
			$('#btnSave').attr('disabled',false); //set button disable
		}
	});

}
</script>
