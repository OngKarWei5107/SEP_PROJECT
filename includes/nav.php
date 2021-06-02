<?php
if(isset($_SESSION["user_type"]) && $_SESSION["user_type"] == customer){

	echo '<nav class="navbar navbar-expand-sm bg-dark navbar-dark">';
	echo '	<!-- Brand -->';
	echo '	<a class="navbar-brand" href="">Dercs Computer Repair Shop Management System</a>';
	echo '';
	echo '	<!-- Links -->';
	echo '	<ul class="navbar-nav ml-auto">';
	echo '		<li class="nav-item">';
	echo '			<a class="nav-link" href=""><i class="fa fa-user-circle mr-1"></i><span>Profile</span></a>';
	echo '		</li>';
	echo '		<li class="nav-item">';
	echo '			<a class="nav-link" href="'. site_url("login/logout") .'">Sign Out</a>';
	echo '		</li>';
	echo '	</ul>';
	echo '</nav>';

}else if(isset($_SESSION["user_type"]) && $_SESSION["user_type"] == staff){

	echo '<nav class="navbar navbar-expand-sm bg-dark navbar-dark">';
	echo '	<!-- Brand -->';
	echo '	<a class="navbar-brand" href="">Dercs Computer Repair Shop Management System</a>';
	echo '';
	echo '	<!-- Links -->';
	echo '	<ul class="navbar-nav ml-auto">';
	echo '		<li class="nav-item">';
	echo '			<a class="nav-link" href=""><i class="fa fa-user-circle mr-1"></i><span>Profile</span></a>';
	echo '		</li>';
	echo '		<li class="nav-item">';
	echo '			<a class="nav-link" href="'. site_url("login/logout") .'">Sign Out</a>';
	echo '		</li>';
	echo '	</ul>';
	echo '</nav>';

}else if(isset($_SESSION["user_type"]) && $_SESSION["user_type"] == rider){

	echo '<nav class="navbar navbar-expand-sm bg-dark navbar-dark">';
	echo '	<!-- Brand -->';
	echo '	<a class="navbar-brand" href="">Dercs Computer Repair Shop Management System</a>';
	echo '';
	echo '	<!-- Links -->';
	echo '	<ul class="navbar-nav ml-auto">';
	echo '		<li class="nav-item">';
	echo '			<a class="nav-link" href=""><i class="fa fa-user-circle mr-1"></i><span>Profile</span></a>';
	echo '		</li>';
	echo '		<li class="nav-item">';
	echo '			<a class="nav-link" href="'. site_url("login/logout") .'">Sign Out</a>';
	echo '		</li>';
	echo '	</ul>';
	echo '</nav>';

}else{

	echo '<nav class="navbar navbar-expand-sm bg-dark navbar-dark">';
	echo '	<!-- Brand -->';
	echo '	<a class="navbar-brand" href="index.php">Dercs Computer Repair Shop Management System</a>';
	echo '';
	echo '	<!-- Links -->';
	echo '	<ul class="navbar-nav ml-auto">';
	echo '		<li class="nav-item">';
	echo '			<a class="nav-link" href=""><i class="fa fa-user-circle mr-1"></i><span>Profile</span></a>';
	echo '		</li>';
	echo '		<li class="nav-item">';
	echo '			<a class="nav-link" href="'. site_url("login/") .'">Sign In</a>';
	echo '		</li>';
	echo '	</ul>';
	echo '</nav>';

}
?>

<!-- <script>
	function setSession(variable, value){
		$.post( "setSession.php?variable=" + variable + "&value=" + value, function( data ) {
			$( ".result" ).html( data );
		});
	}
</script> -->