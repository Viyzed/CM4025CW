<?php 
include("sqlite.php"); 
include("errors.php");

//send the user to the signip form if they are not logged in
if(empty($_SESSION['username'])) {
	header('location: signup.php');
}

//Clean up lists table with NULL entires
$db->exec("DELETE FROM lists WHERE id IS NULL OR id = '' OR imdb_id IS NULL OR imdb_id = ''");

//Array variables to store results from the database and get API responses and parse them to PHP Array objects
$result = array();
$apiUrls =  array();
$api_json = array();
$api_array = array();

$username = $_SESSION['username'];

//Get the user's ID in the users table of the database
$query = ("SELECT id FROM users WHERE username='".$username."' LIMIT 1");
$userId = $db->query($query);
$userId = $userId->fetchArray(SQLITE3_ASSOC)["id"];

//Get the IDs of the films the current user has stored in the lists table of the database
$imdbIds = $db->query("SELECT imdb_id FROM lists WHERE id='".$userId."'");
$imdbArray = array();

$i = 0;
while($row = $imdbIds->fetchArray(SQLITE3_ASSOC)) {
	if(!isset($row['imdb_id'])) continue;

	$imdbArray[$i]['imdb_id'] = $row['imdb_id']; 

	$i++;
}

//Use the film IDs to craft API calls to get the film posters and JSON data on the film
$j = 0;
foreach($imdbArray as $element) {
	if($element['imdb_id'] == null) {
		unset($imdbArray[$j]);
	} else {
		$result[$j] ="http://img.omdbapi.com/?i=".$element['imdb_id']."&h=600&apikey=ec5edf38";
		$apiUrls[$j] = "http://www.omdbapi.com/?i=".$element['imdb_id']."&apikey=ec5edf38";
	}
	$j++;
}

//Parse the API JSON response to an Array
$result = array_unique($result);
$apiUrls = array_unique($apiUrls);
$l = 0;
foreach($apiUrls as $url) {
	$api_json[$l] = file_get_contents($url);
	$api_array[$l] = json_decode($api_json[$l], true);
	$l++;
}

//Remove the selected film from the databse if the remove button is clicked for the selected film
if(isset($_GET['remove'])) {
        $linkchoice = $_GET['remove'];
        $db->exec("DELETE FROM lists WHERE id = '".$userId."' AND imdb_id = '".$linkchoice."'");
        header("Location: list.php");
}

?>

<!doctype html>
<html>
<head>
	<title>My List</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
</head>

<body>
	<!-- Navigation Pane -->
	<nav>
                <div id="title">
                        <h4>My List</h4>
                </div>
                <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#">MyList</a></li>
			<li><a href="about.php">About</a></li>
                        <li><a href="signup.php">SignUp</a></li>
                </ul>
        </nav>
	
	<!-- User Session (username and logout button) -->
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

	<!-- list container (gets user's films from the database and displays the posters as well as information) -->
	<div id="list">
		<!-- php included to loop through the array of films retrieved from the database and add them to the html list -->
		<ol> <?php $index = 0;
			foreach($result as $url) {
				?><li> <div id="desc">
					<a>
					<object data=<?php echo($url); ?> type="image/jpg"></object>
					</a><?php ?>
					<a>Title: <?php echo($api_array[$index]['Title']);  ?></a>	
					<a>Released: <?php echo($api_array[$index]['Released']); ?></a>
					<a>Runtime: <?php echo($api_array[$index]['Runtime']); ?></a>
					<a>Genre: <?php echo($api_array[$index]['Genre']); ?></a>
					<a>Director: <?php echo($api_array[$index]['Director']); ?></a>
					<a href="list.php?remove=<?php echo($api_array[$index]['imdbID'])?>" style="color: red;">remove</a>
					<?php $index++; ?>
					</div>
				</li>
					
			<?php } ?>
		</ol>
	</div>

</body>
</html>
