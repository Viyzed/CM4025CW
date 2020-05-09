<?php 
include("sqlite.php"); 
include("errors.php");

//send the user to the signip form if they are not logged in
if(empty($_SESSION['username'])) {
	header('location: signup.php');
}

try {
	$db = new SQLite3('db/registration.sqlite');
} catch(PDOException $e) {
	echo $e->getMessage();
}

//Clean up lists table with NULL entires
$db->exec("DELETE FROM lists WHERE id IS NULL OR id = '' OR imdb_id IS NULL OR imdb_id = ''");

$result = array();
$apiUrls =  array();
$api_json = array();
$api_array = array();

$username = $_SESSION['username'];

$query = ("SELECT id FROM users WHERE username='".$username."' LIMIT 1");
$userId = $db->query($query);
$userId = $userId->fetchArray(SQLITE3_ASSOC)["id"];


$imdbIds = $db->query("SELECT imdb_id FROM lists WHERE id='".$userId."'");
$imdbArray = array();
$i = 0;

while($row = $imdbIds->fetchArray(SQLITE3_ASSOC)) {
	if(!isset($row['imdb_id'])) continue;

	$imdbArray[$i]['imdb_id'] = $row['imdb_id']; 

	$i++;
}


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

$result = array_unique($result);
$apiUrls = array_unique($apiUrls);

$l = 0;
foreach($apiUrls as $url) {
	$api_json[$l] = file_get_contents($url);
	$api_array[$l] = json_decode($api_json[$l], true);
	$l++;
}

$linkchoice;
if(isset($_GET['remove'])) {
	$linkchoice = $_GET['remove'];
	$db->exec("DELETE FROM lists WHERE id = '".$userId."' AND imdb_id = '".$linkchoice."'");
}

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
                        <h4>My List</h4>
                </div>
                <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#">MyList</a></li>
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

	<div id="list">
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
