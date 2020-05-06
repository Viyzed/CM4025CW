<?php include('sqlite.php'); ?>
<!doctype html>
<html>

<head>
	<title>User Signup</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
</head>

<body>

	<nav>
                <div id="title">
                        <h4>CineBucket List</h4>
                </div>
                <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="list.php">MyList</a></li>
			<li><a href="about.php">About</a></li>
                        <li><a href="signup.php">SignUp</a></li>
                </ul>
        </nav>

	<div id="header">
		<h2>Sign Up</h2>
	</div>

	<form method="post" action="signup.php">
		<!-- handle form errors -->
		<?php include('errors.php'); ?>
		<div id="user-input">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
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

