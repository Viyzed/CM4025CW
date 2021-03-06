<?php
	//Start PHP session
	session_start(); 
	
	$errors = array();
	$username = "";
	$query = "";
	
	//open sqlite Db
	try {
		$db = new SQLite3('db/registration.sqlite');
	} catch(PDOException $e) {
		echo $e->getMessage();
	}

	//HTTP post request through the Sign Up button
	if (isset($_POST['signup'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password_confirm = $_POST['password_confirm'];
		
		//check that all fields are populated and passwords match
		if(empty($username)) {
			array_push($errors, "Username box is empty.");
		}	
		if(empty($password)) {
                        array_push($errors, "Password box is empty.");
                }
		if($password != $password_confirm) {
			array_push($errors, "Passwords do not match.");
		}

		//sanitise username variable
		$username = filter_var($username, FILTER_SANITIZE_STRING); 
		
		//add the user to the Db
		if(count($errors) == 0) {
			//encrypt the password with md5 hash
			$password_hash = md5($password);
			$query = "INSERT INTO users(username, password) VALUES('$username', '$password_hash')";
			$db->exec($query);
			$_SESSION['username'] = $username;
			$_SESSION['success'] = ("You are logged in as: ");
			header('location: index.php'); //redirect to the home page
		}
	}

	//sign in
	if(isset($_POST['signin'])) {
		$username = $_POST['username'];
                $password = $_POST['password'];

                //check that all fields are populated and passwords match
                if(empty($username)) {
                        array_push($errors, "Username box is empty.");
                }
                if(empty($password)) {
			array_push($errors, "Password box is empty.");
                }            

		//sanitise username variable
                $username = filter_var($username, FILTER_SANITIZE_STRING);
		
		if(count($errors) == 0) {
			$password_hash = md5($password); //encrypt password
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password_hash'";
                        $count = $db->querySingle($query);
			if($count > 0) {
				//sing user in
                        	$_SESSION['username'] = $username;
                        	$_SESSION['success'] = ("You are logged in as: ");
                        	header('location: index.php'); //redirect to the home page
			} else {
				array_push($errors, "The username/password is incorrect.");
			}
		}
	}

	//log out
	if(isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header('location: index.php');
	}

?>

