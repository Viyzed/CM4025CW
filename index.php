<?php
include('sqlite.php');
include('search.php');
?>

<!doctype html>
<html>
<head>
	<title>CineBucket-List</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
</head>

<body> 
	<nav>
		<div id="title">
			<h4>CineBucket List</h4>
		</div>
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="list.php">My List</a></li>
			<li><a href="signup.php">Sign Up</a></li>
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

	<div id=scroll-pane"> </div>
		
	<div id="user-search">
		<form id=film-search>
			<input type="text" name="search"/>
			<button type="submit">Search</button>
			<button type"submit" name="add">Add to My List</button>
		</form>
	
		<img src=<?php echo $poster_url ?> alt=<?php echo($omdb_array['Title']); ?>/>
	</div>

</body>
</html>

