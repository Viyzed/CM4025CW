<?php 
	
	$username = "";
	$errors = array();
	
	//open connection to mySQL Db
	$db = mysqli_connect('localhost', 'root', '', 'registration');
	
	//HTTP post request through the Sign Up button
	if (isset($_POST['signup'])) {
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		$password_confirm = mysql_real_escape_string($_POST['password_confirm']);

		//check that all fields are populated and passwords match
		if(empty($username) {
			array_push($errors, "Username box is empty.");
		}	
		if(empty($password) {
                        array_push($errors, "Password box is empty.");
                }
		if($password != $password_confirm) {
			array_push($errors, "Passwords do not match.");
		} 

		//add the user to the Db
		if(count($errors) == 0) {
			//encrypt the password with md5 hash
			$password_hash = md5($password);
			$query = "INSERT INTO users (username, password) VALUES ('$username', '$password_hash')";
			mysqli_query($db, $query); 
		}
	}	
?>

