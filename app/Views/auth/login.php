<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login Siswa</title>
	<link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="/assets/login-temp/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/login-temp/css/login.css">
</head>
<body>
	<main>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm login-section-wrapper">
					<div class="brand-wrapper">
						<!-- <img src="/logo.jpg" alt="logo" class="logo"> -->
					</div>
					<div class="login-wrapper my-auto">
						<h1 class="login-title">Log in</h1>
						<?php if (session()->getFlashdata('status') !='') { ?>
			              <div class="alert alert-danger alert-dismissible fade show" role="alert">
			                <?=session()->getFlashdata('status');?>
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                  <span aria-hidden="true">&times;</span>
			                </button>
			              </div>
			            <?php }?>
						<form method="POST" action="/login">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="test" name="iusername" id="iusername" value="<?= session()->getFlashdata('username') !='' ? session()->getFlashdata('username') : '' ?>" class="form-control" placeholder="Masukan username" required>
							</div>
							<div class="form-group mb-4">
								<label for="password">Password</label>
								<input type="password" name="ipassword" id="ipassword" class="form-control" placeholder="Masukan passsword" required>
							</div>
							<button name="login" id="login" class="btn btn-block login-btn" type="submit">Login</button>
						</form>
						<a href="#!" class="forgot-password-link">Forgot password?</a>
						<!-- <p class="login-wrapper-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p> -->
					</div>
				</div>
				<div class="col-sm-6 px-0 d-none d-sm-block pt-5">
					<!-- <img src="/foto-scada.jpg" style="height: 100%; width: 100%;" alt="login image" class="login-img"> -->
					<h4 class="text-center text-bold mt-5">Aplikasi SPP SMK Negeri 2 Kuningan</h4>
					<p class="pl-5 pr-5">Selamat datang ini adalah aplikasi informasi pemabayaran SPP siswa SMK Negeri 2 Kuningan.<br>Gunakan uang SPP dengan bijak, jangan pake uang spp untuk jajan.</p>
				</div>
			</div>
		</div>
	</main>
	<script src="/assets/sbadmin/vendor/js/jquery.min.js"></script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script> -->
	<script src="/assets/sbadmin/vendor/js/bootstrap.min.js"></script>
</body>
</html>
