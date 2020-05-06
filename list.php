<?php 
include("sqlite.php"); 
include("store.php");
include("errors.php");
?>

<!doctype html>
<html>
<head>
	<title>My List</title>
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

	<div id="session">
                <?php if(isset($_SESSION['success'])): ?>
                        <div id="error success">
                                <h3>
                                        <?php
                                                echo $_SESSION['success'];
                                                unset($_SESSION['success']);
                                        ?>
                                </h3>
                        <div>
                <?php endif ?>

                <?php if(isset($_SESSION['username'])): ?>
                        <p><strong><?php echo $_SESSION['username']; ?></strong></p>
                        <p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
                <?php endif ?>

        </div>

</body>
</html>
