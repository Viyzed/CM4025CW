<?php
include('sqlite.php');
include('search.php');
global $omdb_array;
?>

<!doctype html>
<html>
<head>
	<title>CineBucket-List</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
</head>

<body>
	<!-- Navigation Pane --> 
	<nav>
		<div id="title">
			<h4>CineBucket List</h4>
		</div>
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="list.php">MyList</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="signup.php">SignUp</a></li>
		</ul>
	</nav>

	<!-- User session (username and logout button) -->
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

	<!-- Search film by title to get poster and add to list table of database  -->
	<div id="index-container">
		<div id="user-search">	
			<h2 id="instruct">Enter the title of a film and Search.</h2>
			<form id=film-search>
				<input id="txt" type="text" name="search"/>
				<button id="btn" type="submit" name="btnSearch">Search</button>
			</form>
			<form id="film-add">
				<button id="btn" type="submit" name="btnAdd">Add to My List</button>
			</form>
		</div>
		<object data=<?php echo $poster_url ?> type="image/jpg"></object>
	</div>
</body>
</html>

