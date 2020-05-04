<!doctype html>
<html>

<head>
        <title>User Signin</title>
        <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>

<body>
        <div id="header">
                <h2>Sign In</h2>
        </div>

        <form method="post" action="signin.php">
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


