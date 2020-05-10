<?php include('sqlite.php') ?>
<!doctype html>
<html>

<head>
        <title>User Signin</title>
        <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>

<body>
	<!-- Navigation Pane -->
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
                <h2>Sign In</h2>
        </div>
	
	<!-- Take user input for singing into an already existing account -->
        <form method="post" action="signin.php">
		<?php include('errors.php')?>
                <div id="user-input">
                        <label>Username</label>
                        <input type="text" name="username">
                </div>
                <div id="user-input">
                        <label>Password</label>
                        <input type="password" name="password">
                </div>
                <div id="user-input">
                        <button type="submit" name="signin" id="btn">Sign In</button>
                </div>

                <p>Don't have an account? <a href="signup.php">Sign Up</a></p>

        </form>
</body>

</html>


