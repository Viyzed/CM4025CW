<?php

try {
	$ldb=new PDO('sqlite:lists.sqlite');
	$db=new SQLite3('registration.sqlite');

	$results = $db->query('SELECT * from users');
	while($row = $results->fetchArray()) {
		$row = (object) $row;
		echo $row->username."</br>";
	}

} catch (PDOException $e){
	echo $e->getMessage();
}

	
