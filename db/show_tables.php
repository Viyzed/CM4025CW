<?php

try {
	$db=new PDO('sqlite:registration.sqlite');

	$result = $db->query('SELECT * from users');
	foreach($result as $row) {
		print $row['id'];
		print $row['username'];
		print $row['password'];
	}

} catch (PDOException $e){
	echo $e->getMessage();
}

//now output the data to a simple html table...
 print "<table border=1>";
 print "<tr><td>username</td><td>password</td></tr>";
foreach($result as $row)
{
  print "<tr><td>".$row['username']."</td>";
  print "<td>".$row['password']."</td>";
}
print "</table>";

?>
	
