<?php include(src("layouts/header.php")); ?>
<section class="registration-section">
	<div class="container">
		<div class="row">
			<div class="grid-4 grid-offset-4">
				<h2>Registration</h2>
				<?php 
					if(!empty(session('errors'))){
						$errors = session('errors');
						echo $errors;
						sessionErase('errors');
					}
				 ?>
				<form action="signup" class="registration" id="registration" method="POST" name="regform" onsubmit="return validateForm()">
					<div class="form-group">
						<input type="text" name="name" id="name" class="input-control" placeholder="Your Name*" pattern="[a-zA-Z ]+">
						<span id="name-help"></span>
					</div>
					<div class="form-group">
						<input type="email" name="email" class="input-control" placeholder="Your Email*">
						<span id="email-help"></span>
					</div>
					<div class="form-group">
						<input type="password" name="password" class="input-control" placeholder="Password*">
						<span id="pass-help"></span>
					</div>
					<div class="form-group">
						<button type="submit" class="btn-primary btn-block">Registration</button>
					</div>
				</form>
			</div>
		</div><!-- /row -->
	</div><!-- /container -->
</section><!-- /login-section -->

<?php include(src("layouts/footer.php")); ?>