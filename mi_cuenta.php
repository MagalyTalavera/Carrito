<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
	header('location:login.php');
} else {
	if (isset($_POST['update'])) {
		$name = $_POST['name'];
		$contactno = $_POST['contactno'];
		$query = mysqli_query($con, "update users set name='$name',contactno='$contactno' where id='" . $_SESSION['id'] . "'");
		if ($query) {
			echo "<script>alert('Tu información ha sido actualizada.');</script>";
		}
	}


	date_default_timezone_set('Asia/Kolkata'); // change according timezone
	$currentTime = date('d-m-Y h:i:s A', time());


	if (isset($_POST['submit'])) {
		$sql = mysqli_query($con, "SELECT password FROM  users where password='" . md5($_POST['cpass']) . "' && id='" . $_SESSION['id'] . "'");
		$num = mysqli_fetch_array($sql);
		if ($num > 0) {
			$con = mysqli_query($con, "update students set password='" . md5($_POST['newpass']) . "', updationDate='$currentTime' where id='" . $_SESSION['id'] . "'");
			echo "<script>alert('Contraseña cambiada con éxito !!');</script>";
		} else {
			echo "<script>alert('
			La contraseña actual no coincide !!');</script>";
		}
	}

?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="keywords" content="MediaCenter, Template, eCommerce">
		<meta name="robots" content="all">

		<title>My Account</title>

		<!-- Bootstrap Core CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">

		<!-- Customizable CSS -->
		<link rel="stylesheet" href="assets/css/main.css">
		<link rel="stylesheet" href="assets/css/green.css">
		<link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

		<!-- Demo Purpose Only. Should be removed in production -->
		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="assets/images/favicon.ico">
		<script type="text/javascript">
			function valid() {
				if (document.chngpwd.cpass.value == "") {
					alert("Current Password Filed is Empty !!");
					document.chngpwd.cpass.focus();
					return false;
				} else if (document.chngpwd.newpass.value == "") {
					alert("New Password Filed is Empty !!");
					document.chngpwd.newpass.focus();
					return false;
				} else if (document.chngpwd.cnfpass.value == "") {
					alert("Confirm Password Filed is Empty !!");
					document.chngpwd.cnfpass.focus();
					return false;
				} else if (document.chngpwd.newpass.value != document.chngpwd.cnfpass.value) {
					alert("Password and Confirm Password Field do not match  !!");
					document.chngpwd.cnfpass.focus();
					return false;
				}
				return true;
			}
		</script>

	</head>

	<body class="cnt-home">
		<header class="header-style-1">

			<!-- ============================================== TOP MENU ============================================== -->
			<?php include('includes/top-header.php'); ?>
			<!-- ============================================== TOP MENU : END ============================================== -->

			<!-- ============================================== NAVBAR : END ============================================== -->

		</header>
		<!-- ============================================== HEADER : END ============================================== -->

<style>
	input{
		font-size: 16px !important;
	}
	label{
		font-size: 16px !important;
		color: black !important;

	}
	button{

font-size: 14px !important;
}
</style>

		<div class="body-content outer-top-bd">
			<div class="container">
				<div class="sign-in-page inner-bottom-sm">
					<div class="row">
						<!-- panel-body  -->


						<div class="col-md-6 col-sm-6 sign-in">


						<div class="panel-body">
							<div class="row">
								<h4>Informacion Personal</h4>
								<div class="col-md-12 col-sm-12 already-registered-login">

									<?php
									$query = mysqli_query($con, "select * from users where id='" . $_SESSION['id'] . "'");
									while ($row = mysqli_fetch_array($query)) {
									?>

										<form class="register-form" role="form" method="post">
											<div class="form-group">
												<label class="info-title" for="name">Nombre Completo<span>*</span></label>
												<input type="text" class="form-control unicase-form-control text-input" value="<?php echo $row['name']; ?>" id="name" name="name" required="required">
											</div>



											<div class="form-group">
												<label class="info-title" for="exampleInputEmail1">Correo Electrónico <span>*</span></label>
												<input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="<?php echo $row['email']; ?>" readonly>
											</div>
											<div class="form-group">
												<label class="info-title" for="Contact No.">Contacto <span>*</span></label>
												<input type="text" class="form-control unicase-form-control text-input" id="contactno" name="contactno" required="required" value="<?php echo $row['contactno']; ?>" maxlength="10">
											</div>
											<button type="submit" name="update" class="btn-upper btn btn-primary checkout-page-button">ACTUALIZAR</button>
										</form>
									<?php } ?>
								</div>
								<!-- already-registered-login -->

							</div>
							</div>
						</div>
						<!-- panel-body  -->





						<!-- panel-body  -->
						<div class="col-md-6 col-sm-6 sign-in">


						<div class="panel-body">
						<div class="row">
								<h4>Cambiar Contraseña</h4>
								<div class="col-md-12 col-sm-12 already-registered-login">
						     
							 <form class="register-form" role="form" method="post" name="chngpwd" onSubmit="return valid();">
		 <div class="form-group">
								 <label class="info-title" for="Current Password">Contraseña Actual<span>*</span></label>
								 <input type="password" class="form-control unicase-form-control text-input" id="cpass" name="cpass" required="required">
							   </div>
		 
		 
		 
								 <div class="form-group">
								 <label class="info-title" for="New Password">Nueva Contraseña <span>*</span></label>
					  <input type="password" class="form-control unicase-form-control text-input" id="newpass" name="newpass">
							   </div>
							   <div class="form-group">
								 <label class="info-title" for="Confirm Password">Confirmar Contraseña <span>*</span></label>
								 <input type="password" class="form-control unicase-form-control text-input" id="cnfpass" name="cnfpass" required="required" >
							   </div>
							   <button type="submit" name="submit" class="btn-upper btn btn-primary checkout-page-button">CAMBIAR CONTRASEÑA </button>
							 </form> 
		 
		 
		 
		 
									   </div>
						</div>
						<!-- panel-body  -->
					</div>
				</div>
			</div>
		</div>
		<?php include('includes/footer.php'); ?>
		<script src="assets/js/jquery-1.11.1.min.js"></script>

		<script src="assets/js/bootstrap.min.js"></script>

		<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
		<script src="assets/js/owl.carousel.min.js"></script>

		<script src="assets/js/echo.min.js"></script>
		<script src="assets/js/jquery.easing-1.3.min.js"></script>
		<script src="assets/js/bootstrap-slider.min.js"></script>
		<script src="assets/js/jquery.rateit.min.js"></script>
		<script type="text/javascript" src="assets/js/lightbox.min.js"></script>
		<script src="assets/js/bootstrap-select.min.js"></script>
		<script src="assets/js/wow.min.js"></script>
		<script src="assets/js/scripts.js"></script>

		<!-- For demo purposes – can be removed on production -->

		<script src="switchstylesheet/switchstylesheet.js"></script>

		<script>
			$(document).ready(function() {
				$(".changecolor").switchstylesheet({
					seperator: "color"
				});
				$('.show-theme-options').click(function() {
					$(this).parent().toggleClass('open');
					return false;
				});
			});

			$(window).bind("load", function() {
				$('.show-theme-options').delay(2000).trigger('click');
			});
		</script>
	</body>

	</html>
<?php } ?>