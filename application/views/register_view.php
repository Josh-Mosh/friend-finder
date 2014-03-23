<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="assets/css/login_register.css">
</head>
<body>

	<div id='container'>
		<div id='header'>
			<h1 id='title'>Friend Finder</h1>
			<h2>Register</h2>
		</div>
		<div id='register'>
			<form action='<?= base_url('register/registration') ?>' method='post'>
				<p>First Name: <input type='text' name='first_name'></p>
				<p>Last Name: <input type='text' name='last_name'></p>
				<p>Email Address: <input type='text' name='email'></p>
				<p>Password: <input type='password' name='password'></p>
				<p>Confirm Password: <input type='password' name='confirm_password'></p>
				<input type='submit' value='Register'>
			</form>
		</div>

		<div id ='error'>
		<?php
			echo $this->session->flashdata('errors');
		?>
		</div>
		<div id='footer'>
			<p>Already a member? <a href="<?= base_url('login') ?>">Login Here</a></p>
		</div>
	</div>
</body>
</html>