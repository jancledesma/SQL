<html>
<head>
	<title>Add Customer</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");
if(isset($_POST['Submit'])) {	
	$cName = $_POST['cName'];
	$cContact = $_POST['cContact'];
    $cAddress = $_POST['cAddress'];
    $cDateAdded = $_POST['cDateAdded'];

		
	// checking empty fields
	if(empty($cName) || empty($cContact) || empty($cAddress) || empty($cDateAdded)) {
				
		if(empty($cName)) {
			echo "<font color='red'>Customer Name field is empty.</font><br/>";
		}
		
		if(empty($cContact)) {
			echo "<font color='red'>Contact No. field is empty.</font><br/>";
		}
		
		if(empty($cAddress)) {
			echo "<font color='red'>Adress field is empty.</font><br/>";
        }		
        if(empty($cDateAdded)) {
            echo "<font color='red'>Date Added field is empty.</font><br/>";
        }
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO customers_tbl(cName, cContact, cAddress, cDateAdded) VALUES(:cName, :cContact, :cAddress, :cDateAdded)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':cName', $cName);
		$query->bindparam(':cContact', $cContact);
        $query->bindparam(':cAddress', $cAddress);
        $query->bindparam(':cDateAdded', $cDateAdded);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $cName, ':cContact' => $cContact, ':cAddress' => $cAddress, ':' => $, ':' => $));
		
		//display success message
		echo "<font color='green'>Customer added successfully.";
		echo "<br/><a href='index.php'>Back to Home Page</a>";
	}
}
?>
</body>
</html>