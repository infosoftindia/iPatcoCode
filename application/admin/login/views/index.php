

<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="" />
		<link rel="shortcut icon" href="./assets/img/favicon.ico" />
		<title>Admin Login</title>
		<?=$css?>
	</head>
	<body class="login-bg">
		<?php
			// $options = [
				// 'cost' => 12 // the default cost is 10
			// ];
			// echo $hash = password_hash('123456', PASSWORD_DEFAULT, $options);
		?>
		<div class="container">
			<div class="login-screen row align-items-center">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="login-container">
						<div class="row no-gutters">
							<div class="col-xl-4 col-lg-5 col-md-6 col-sm-12" id="section_admin_login">
								<form action="<?=admin_url('login.php')?>" method="POST">
									<div class="login-box">
										<!--<a href="" class="login-logo">
											<img src="./assets/img/unify.png" alt="iPatco CMS" />
										</a>-->
										<?=alert('danger', 'error')?>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text input-group-addon" id="username"><i class="icon-account_circle"></i></span>
											</div>
											<input type="text" class="form-control" placeholder="Username" aria-label="username" aria-describedby="username" name="email">
										</div>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text input-group-addon" id="password"><i class="icon-verified_user"></i></span>
											</div>
											<input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password" name="password">
										</div>
										<div class="actions clearfix">
											<a href="javascript:forgot_password()">Lost password?</a>
											<button type="submit" class="btn btn-primary">Login</button>
										</div>
										<div class="or"></div>
										<div class="mt-4">
											<a href="<?=site_url()?>" class="additional-link">Back to Site</a>
										</div>
									</div>
								</form>
							</div>
							<div class="col-xl-4 col-lg-5 col-md-6 col-sm-12" id="section_forgot_password" style="display: none;">
								<form action="">
									<div class="login-box">
										<a href="" class="login-logo">
											<img src="./assets/img/unify.png" alt="iPatco CMS" />
										</a>
										<h5>Forgot Password?</h5>
										<p class="info">In order to receive your access code by email, please enter the address you provided during the registration process.</p>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text input-group-addon" id="email"><i class="icon-account_circle"></i></span>
											</div>
											<input type="email" class="form-control" placeholder="Email Address">
										</div>
										<div class="actions clearfix">
											<a href="javascript:back_to_login()">Back to Login</a>
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
									</div>
								</form>
							</div>
							<div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
								<div class="login-slider"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer class="main-footer no-bdr fixed-btm">
			<div class="container">
				Copyright &copy; <?=date('Y')?> iPatco CMS
			</div>
		</footer>
		<script>
			function forgot_password() {
				document.getElementById("section_admin_login").style.display = 'none';
				document.getElementById("section_forgot_password").style.display = 'block';
			}
			function back_to_login() {
				document.getElementById("section_admin_login").style.display = 'block';
				document.getElementById("section_forgot_password").style.display = 'none';
			}
		</script>
	</body>
</html>

