<?php include('mysql.php'); ?>
<!doctype html>
<html>

<head>
	<title>User Signup</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
</head>

<body>
	<div id="header">
		<h2>Sign Up</h2>
	</div>

	<form method="post" action="signup.php">
		<!-- handle form errors -->
		<?php include('errors.php'); ?>
		<div id="user-input">
			<label>Username</label>
			<input type="text" name="username">
		</div>
		<div id="user-input">
                        <label>Password</label>
                        <input type="password" name="password">
                </div>
		<div id="user-input">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirm">
                </div>
		<div id="user-input">
                        <button type="submit" name="signup" id="btn">Sign Up</button>
                </div>
 		
		<p>Already have an account? <a href="signin.php">Sign In</a></p>

	</form>
</body>

</html>

