<?php 

$api_key = "&apikey=ec5edf38";
$imdbId = "";
$poster_height = "&h=600";
$poster_url = "";
$omdb_array = array();
global $add;

if(!empty($_GET['search']) && $add==false) {
		$omdb_api = "http://www.omdbapi.com/?t=";
		$poster_api = "http://img.omdbapi.com/?i=";

		$omdb_url = $omdb_api . $_GET['search'] . $api_key; 
		$omdb_url = str_replace(' ', '+', $omdb_url);
	
		$omdb_json = file_get_contents($omdb_url);
		$omdb_array = json_decode($omdb_json, true);
	
		$imdbId = $omdb_array['imdbID'];
	
	
		$poster_url = $poster_api . $imdbId . $poster_height . $api_key;
}

?>

