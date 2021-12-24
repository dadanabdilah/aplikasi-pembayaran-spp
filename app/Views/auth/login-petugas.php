<!DOCTYPE html>
<html>
<head>
	<title><?=$title?></title>
	<meta charset="utf-8">
	<link href="/assets/bootstrap/css/bootstrap.css" rel="stylesheet"/>
	<link href="/assets/css/signin.css" rel="stylesheet"/>
	<style>
		.bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}
		@media (min-width: 768px) {
			.bd-placeholder-img-lg {
				font-size: 3.5rem;
			}
		}
	</style>

</head>
<body class="text-center">
	<form class="form-signin" method="POST" action="/petugas">
		<img class="mb-4" style="height: 90px" src="/logo.jpg" class="img-thumbnail">

		<h1 class="h3 mb-3 font-weight-normal">Silahkan Login</h1>
		<?php if (session()->get('status') !='') { ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?=session()->get('status');?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php }?>
		<label for="inputUser" class="sr-only">Username</label>
		<input type="text" value="<?= session()->getFlashdata('username') !='' ? session()->getFlashdata('username') : '' ?>" name="iusername" id="username" class="form-control" placeholder="Username" autofocus>
		
		<label for="inputPassword" class="sr-only">Password </label>
		<input type="password" name="ipassword" id="password" class="form-control" placeholder="Password">
		
		<button class="btn btn-lg btn-dark btn-block" type="submit">Sign in</button>
		<!-- <p class="mt-5 mb-3 text-muted">&copy; RPL SMKN 2 Kuningan - 2021</p> -->
	</form>
	<script src="/assets/sbadmin/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>