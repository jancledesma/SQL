<html>
<head>
	<title>Add Product</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");
if(isset($_POST['Submit'])) {	
	$pName = $_POST['pName'];
	$pDescription = $_POST['pDescription'];
    $pPrice = $_POST['pPrice'];
    $pStock = $_POST['pStock'];

		
	// checking empty fields
	if(empty($pName) || empty($pDescription) || empty($pPrice) || empty($pStock)) {
				
		if(empty($pName)) {
			echo "<font color='red'>Product Name field is empty.</font><br/>";
		}
		
		if(empty($pDescription)) {
			echo "<font color='red'>Product Description field is empty.</font><br/>";
		}
		
		if(empty($pPrice)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
        }		
        if(empty($pStock)) {
            echo "<font color='red'> Stock field is empty.</font><br/>";
        }
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO products_tbl(pName, pDescription, pPrice, pStock) VALUES(:pName, :pDescription, :pPrice, :pStock)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':pName', $pName);
		$query->bindparam(':pDescription', $pDescription);
        $query->bindparam(':pPrice', $pPrice);
        $query->bindparam(':pStock', $pStock);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $pName, ':pDescription' => $pDescription, ':pPrice' => $pPrice, ':' => $, ':' => $));
		
		//display success message
		echo "<font color='green'>Product added successfully.";
		echo "<br/><a href='index.php'>Back to Home Page</a>";
	}
}
?>
</body>
</html>