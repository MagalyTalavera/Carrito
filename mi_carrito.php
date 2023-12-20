<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['submit'])) {
	if (!empty($_SESSION['cart'])) {
		foreach ($_POST['quantity'] as $key => $val) {
			if ($val == 0) {
				unset($_SESSION['cart'][$key]);
			} else {
				$_SESSION['cart'][$key]['quantity'] = $val;
			}
		}
		echo "<script>alert('Su carrito se ha actualizado');</script>";
	}
}
// Code for Remove a Product from Cart
if (isset($_POST['remove_code'])) {

	if (!empty($_SESSION['cart'])) {
		foreach ($_POST['remove_code'] as $key) {

			unset($_SESSION['cart'][$key]);
		}
		echo "<script>alert('Su carrito se ha actualizado');</script>";
	}
}
// code for insert product in order table


if (isset($_POST['ordersubmit'])) {

	if (strlen($_SESSION['login']) == 0) {
		header('location:login.php');
	} else {

		$quantity = $_POST['quantity'];
		$pdd = $_SESSION['pid'];
		$value = array_combine($pdd, $quantity);


		foreach ($value as $qty => $val34) {



			mysqli_query($con, "insert into orders(userId,productId,quantity) values('" . $_SESSION['id'] . "','$qty','$val34')");
			header('location:payment-method.php');
		}
	}
}

// code for billing address updation
if (isset($_POST['update'])) {
	$baddress = $_POST['billingaddress'];
	$bstate = $_POST['bilingstate'];
	$bcity = $_POST['billingcity'];
	$bpincode = $_POST['billingpincode'];
	$query = mysqli_query($con, "update users set billingAddress='$baddress',billingState='$bstate',billingCity='$bcity',billingPincode='$bpincode' where id='" . $_SESSION['id'] . "'");
	if ($query) {
		echo "<script>alert('La dirección de facturación ha sido actualizada.');</script>";
	}
}


// code for Shipping address updation
if (isset($_POST['shipupdate'])) {
	$saddress = $_POST['shippingaddress'];
	$sstate = $_POST['shippingstate'];
	$scity = $_POST['shippingcity'];
	$spincode = $_POST['shippingpincode'];
	$query = mysqli_query($con, "update users set shippingAddress='$saddress',shippingState='$sstate',shippingCity='$scity',shippingPincode='$spincode' where id='" . $_SESSION['id'] . "'");
	if ($query) {
		echo "<script>alert('La dirección de envío ha sido actualizada.');</script>";
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

	<title>My Cart</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
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
	<!-- Demo Purpose Only. Should be removed in production : END -->


	<!-- Icons/Glyphs -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>

	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">

	<!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

</head>

<body class="cnt-home">



	<!-- ============================================== HEADER ============================================== -->
	<header class="header-style-1">
		<?php include('includes/top-header.php'); ?>

	</header>
	<style>
		.cart-grand-total {
			color: black !important;

		}

		a:hover {
			color: #106eea !important;


		}

		input {
			font-size: 16px !important;
		}

		label {
			font-size: 16px !important;
			color: black !important;

		}

		textarea {

			font-size: 16px !important;
		}

		#input-carrito {
			font-size: 12px !important;
		}

		#input-carrito1 {
			font-size: 12px !important;

		}

		#input-carrito1:hover {

			color: white !important;
		}
	</style>

	<!-- ============================================== HEADER : END ============================================== -->
	

	<div class="body-content outer-top-xs">
		<div class="container">
			<div class="row inner-bottom-sm">
				<div class="shopping-cart">
					<div class="col-md-12 col-sm-12 shopping-cart-table ">
						<div class="table-responsive">
							<form name="cart" method="post">
								<?php
								if (!empty($_SESSION['cart'])) {
								?>
									<table class="table table-bordered">
										<thead>
											<tr>
												<th class="cart-romove item">Eliminar</th>
												<th class="cart-description item">Imagen</th>
												<th class="cart-product-name item">Nombre del Producto</th>

												<th class="cart-qty item">Cantidad</th>
												<th class="cart-sub-total item">Precio por Unidad</th>
												<th class="cart-sub-total item">Costo de Envio</th>
												<th class="cart-total last-item">Total</th>
											</tr>
										</thead><!-- /thead -->
										<tfoot>
											<tr>
												<td colspan="7">
													<div class="shopping-cart-btn">
														<span class="">
															<a id="input-carrito1" href="index.php" class="btn btn-upper btn-primary outer-left-xs">Seguir Comprando</a>
															<input id="input-carrito" type="submit" name="submit" value="ACTUALIZAR CARRITO DE COMPRAS" class="btn btn-upper btn-primary pull-right outer-right-xs">
														</span>
													</div><!-- /.shopping-cart-btn -->
												</td>
											</tr>
										</tfoot>
										<tbody>
											<?php
											$pdtid = array();
											$sql = "SELECT * FROM products WHERE id IN(";
											foreach ($_SESSION['cart'] as $id => $value) {
												$sql .= $id . ",";
											}
											$sql = substr($sql, 0, -1) . ") ORDER BY id ASC";
											$query = mysqli_query($con, $sql);
											$totalprice = 0;
											$totalqunty = 0;
											if (!empty($query)) {
												while ($row = mysqli_fetch_array($query)) {
													$quantity = $_SESSION['cart'][$row['id']]['quantity'];
													$subtotal = $_SESSION['cart'][$row['id']]['quantity'] * $row['productPrice'] + $row['shippingCharge'];
													$totalprice += $subtotal;
													$_SESSION['qnty'] = $totalqunty += $quantity;

													array_push($pdtid, $row['id']);
													//print_r($_SESSION['pid'])=$pdtid;exit;
											?>

													<tr>
														<td class="romove-item"><input type="checkbox" name="remove_code[]" value="<?php echo htmlentities($row['id']); ?>" /></td>
														<td class="cart-image">
															<a class="entry-thumbnail" href="detail.html">
																<img src="admin/productimages/<?php echo $row['id']; ?>/<?php echo $row['productImage1']; ?>" alt="" width="114" height="146">
															</a>
														</td>
														<td class="cart-product-name-info">
															<h4 class='cart-product-description'><a href="product-details.php?pid=<?php echo htmlentities($pd = $row['id']); ?>"><?php echo $row['productName'];

																																												$_SESSION['sid'] = $pd;
																																												?></a></h4>
															<div class="row">
																<div class="col-sm-4">
																	<div class="rating rateit-small"></div>
																</div>
																<div class="col-sm-8">
																	<?php $rt = mysqli_query($con, "select * from productreviews where productId='$pd'");
																	$num = mysqli_num_rows($rt); {
																	?>
																		<div class="reviews">
																			( <?php echo htmlentities($num); ?> Comentarios )
																		</div>
																	<?php } ?>
																</div>
															</div><!-- /.row -->

														</td>
														<td class="cart-product-quantity">
															<div class="quant-input">
																<div class="arrows">
																	<div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
																	<div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
																</div>
																<input type="text" value="<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>" name="quantity[<?php echo $row['id']; ?>]">

															</div>
														</td>
														<td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo "S/" . " " . $row['productPrice']; ?>.00</span></td>
														<td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo "S/" . " " . $row['shippingCharge']; ?>.00</span></td>

														<td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php echo ($_SESSION['cart'][$row['id']]['quantity'] * $row['productPrice'] + $row['shippingCharge']); ?>.00</span></td>
													</tr>

											<?php }
											}
											$_SESSION['pid'] = $pdtid;
											?>

										</tbody><!-- /tbody -->
									</table><!-- /table -->

						</div>
					</div><!-- /.shopping-cart-table -->

					<div class="col-md-4 col-sm-12 estimate-ship-tax">

					</div>

					<div class="col-md-4 col-sm-12 estimate-ship-tax">
						
					</div>
					<div class="col-md-4 col-sm-12 cart-shopping-total">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>

										<div class="cart-grand-total">
											Total<span class="inner-left-md"><?php echo $_SESSION['tp'] = "$totalprice" . ".00"; ?></span>
										</div>
									</th>
								</tr>
							</thead><!-- /thead -->
							<tbody>
								<tr>
									<td>
										<div class="cart-checkout-btn pull-right">
										
											<h3 id="" type="" name="" onClick="whatsap(ss)" >COMPRAR MEDIANTE:</h3>
											<center>
											<a href=" https://w.app/EndWCY"><i  style="font-size:30px; color: #25d366;"class="bi bi-whatsapp"></i></a>
											
											<a href="https://web.telegram.org/a/#777000"><i style="font-size: 30px; color:  #2AABEE;" class="bi bi-telegram"></i></a>
											<i style="font-size: 30px; color: (64, 93, 230);"class="bi bi-instagram"></i>
											</center>
										</div>
									</td>

								</tr>
							</tbody><!-- /tbody -->
						</table>
					<?php } else {
									echo "
									Su cesta está vacía";
								} ?>
					</div>
				</div>
			</div>
			</form>

		</div>
	</div>


	<script>



	</script>
	<?php include('includes/footer.php'); ?>
	<script src="pago.js"></script>
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
	<!-- For demo purposes – can be removed on production : End -->



	<!---Modal---->

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>