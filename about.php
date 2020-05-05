<?php include("sqlite.php") ?>

<!doctype html>
<html>
<head>
	<title>About</title>
        <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>

<body>
        <nav>
                <div id="title">
                        <h4>CineBucket List</h4>
                </div>
                <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="list.php">My List</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="signup.php">Sign Up</a></li>
                </ul>
        </nav>

	<h1 id="about-title">About thie Website</h1>
	<br>
        <h2 id="OMDb-title">This site uses the OMDb API</h2>
	<br>
        <p id="about-text">The OBDb (Open Movie Database) is a Web Service to get information on films (posters, titles, stars, directors, release dates, etc.) that uses a RESTful architecture to serve its resources.<br><br>The requests are made by URL and the responses are in JSON.<br><br>It is developed by Brian Fritz: <a href="https://www.patreon.com/omdb">https://www.patreon.com/omdb</a></p>


</body>
</html>
