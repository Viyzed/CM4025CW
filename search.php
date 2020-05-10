<?php 

//API URL components to craft API request
$api_key = "&apikey=ec5edf38";
$imdbId;
$userId = 0;
$poster_height = "&h=600";
$poster_url = "";
$omdb_array = array();

//If the search box has text, take the submit from the Search button and insert the user-entered text into the URL as the film title
//user-entered variable is not sanitised because the text is not stored on the database or diaplayed on the page, but sent as an API request
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
//Once Search is clicked, empty seach box and if search box remains empty and the Add button is clicked, take the returned film ID and store it
//in the user's list
} elseif(empty($_GET['search'])) {
		$username = $_SESSION['username'];
		$userId = $db->querySingle("SELECT id FROM users WHERE username ='$username' LIMIT 1");
		$imdbId = $_SESSION['imdbId'];
		$query = "INSERT INTO lists(id, imdb_id) VALUES('$userId', '$imdbId')";
	        $db->exec($query);
		
}

?>

