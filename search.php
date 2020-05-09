<?php 

/*include("sqlite.php");*/

$api_key = "&apikey=ec5edf38";
$imdbId;
$userId = 0;
$poster_height = "&h=600";
$poster_url = "";
$omdb_array = array();

if(!empty($_GET['search'])) {
		$omdb_api = "http://www.omdbapi.com/?t=";
		$poster_api = "http://img.omdbapi.com/?i=";

		$omdb_url = $omdb_api . $_GET['search'] . $api_key; 
		$omdb_url = str_replace(' ', '+', $omdb_url);
	
		$omdb_json = file_get_contents($omdb_url);
		$omdb_array = json_decode($omdb_json, true);
	
		$imdbId = $omdb_array['imdbID'];
		$_SESSION['imdbId'] = $imdbId;
	
		$poster_url = $poster_api . $imdbId . $poster_height . $api_key;
} elseif(empty($_GET['search'])) {
		$username = $_SESSION['username'];
		$userId = $db->querySingle("SELECT id FROM users WHERE username ='$username' LIMIT 1");
		$imdbId = $_SESSION['imdbId'];
		$query = "INSERT INTO lists(id, imdb_id) VALUES('$userId', '$imdbId')";
	        $db->exec($query);
		
}

?>

