<html>
<head>
	<title>Add User</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");
if(isset($_POST['Submit'])) {	
	$uUsername = $_POST['uUsername'];
	$uPassword = $_POST['uPassword'];
	$uDateAdded = $_POST['uDateAdded'];

		
	// checking empty fields
	if(empty($uUsername) || empty($uPassword) || empty($uDateAdded)) {
				
		if(empty($uUsername)) {
			echo "<font color='red'>Username field is empty.</font><br/>";
		}
		
		if(empty($uPassword)) {
			echo "<font color='red'>Password field is empty.</font><br/>";
		}
		
		if(empty($uDateAdded)) {
			echo "<font color='red'>DateAdded field is empty.</font><br/>";
		}		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO users_tbl(uUsername, uPassword, uDateAdded) VALUES(:uUsername, :uPassword, :uDateAdded)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':uUsername', $uUsername);
		$query->bindparam(':uPassword', $uPassword);
		$query->bindparam(':uDateAdded', $uDateAdded);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $uUsername, ':uPassword' => $uPassword, ':uDateAdded' => $uDateAdded, ':' => $, ':' => $));
		
		//display success message
		echo "<font color='green'>User added successfully.";
		echo "<br/><a href='index.php'>Back to Home Page</a>";
	}
}
?>
</body>
</html>