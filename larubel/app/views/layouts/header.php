<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sustainable Tourism Development in Bangladesh</title>
	<link rel="stylesheet" href="<?php echo url('assets/css/lassi.css') ?>">
	<link rel="stylesheet" href="<?php echo url('assets/css/style.css') ?>">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="grid-4">
				<a href="home" class="logo">
					<img src="<?php echo url('assets/img/logo.png') ?>" alt="logo">
				</a>
			</div>
			<div class="grid-4 grid-offset-4">
				
					<div class="login-registration">
						<?php 

						if(!session('user')){
							echo '<a href="' . url('user/signup') . '"class="btn-primary">Registration</a>';
							echo '<a href="'. url('user/login')  . '" class="btn-danger">Login</a>';
						}else{
							echo '<a href="'. url('user/logout')  . '" class="btn-danger">Logout</a>';
						}

						?>
					</div>
				
			</div>
		</div>
	</div><!-- /container-fluid -->
	<nav class="navbar">
		<button class="toggle">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<div class="menu-example">
			<div class="container">
				<ul class="nav">
					<li><a href="<?php echo url(''); ?>">HOME</a></li>
					<li class="submenu">
						<a href="#">TOURIST PLACES<span class="down">&darr;</span></a>
						<ul>
							<li><a href="#">Item 1</a></li>
							<li><a href="#">Item 2</a></li>
							<li><a href="#">Item 3</a></li>
							<li><a href="#">Item 4</a></li>
						</ul>
					</li>
					<li class="submenu">
						<a href="#">TOURIST GUIDE<span class="down">&darr;</span></a>
						<ul>
							<li><a href="#">Item 1</a></li>
							<li><a href="#">Item 2</a></li>
							<li><a href="#">Item 3</a></li>
							<li><a href="#">Item 4</a></li>
						</ul>
					</li>
					<li><a href="#">HOTEL &amp; TRANSPORT</a></li>
					<li><a href="#">TOURIST POLICE</a></li>
					<li><a href="#">ABOUT US</a></li>
				</ul>
			</div>
		</div>
	</nav>