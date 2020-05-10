<?php include("sqlite.php") ?>

<!doctype html>
<html>
<head>
	<title>About</title>
        <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>

<body>
        <nav>
		<!-- Navigation Pane -->
                <div id="title">
                        <h4>CineBucket List</h4>
                </div>
                <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="list.php">MyList</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="signup.php">SignUp</a></li>
                </ul>
        </nav>
	
	<!-- About Page Text -->
	<div id="container">
		<h1 id="about-title">About thie Website</h1>
		<br><hr>
        	<h2 id="OMDb-title">This site uses the OMDb API</h2>
		<br>
        	<p id="about-text">The OBDb (Open Movie Database) is a Web Service to get information on films (posters, titles, stars, directors, release dates, etc.) that uses a RESTful architecture to serve its resources.<br><br>The requests are made by URL and the responses are in JSON.<br><br>It is developed by Brian Fritz: <a href="https://www.patreon.com/omdb">patreon.com/BrianFritz</a><br><br>The home page of the API can be found at: <a href="https://www.omdbapi.com/">OBDb.com</a></p>
		<br><hr><br>
		<h2>This site is hosted on an Apache2 Server</h2>
		<br>
		<p id="about-text">The Apache Software Foundation allows use of their server software under the <a href="https://www.apache.org/licenses/LICENSE-2.0">Apache License Version 2.0.</a></p>
	</div>

</body>
</html>
