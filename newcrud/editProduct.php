<?php
// including the database connection file
include_once("config.php");
if(isset($_POST['updateProduct']))
{	
	$pId = $_POST['pId'];
	
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
			echo "<font color='red'>Description field is empty.</font><br/>";
		}
		
		if(empty($pPrice)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}

		if(empty($pStock)) {
			echo "<font color='red'>Stock field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 	
		//updating the table
		$sql = "UPDATE products_tbl SET pName=:pName, pDescription=:pDescription, pPrice=:pPrice, pStock=:pStock WHERE pId=:pId";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':pId', $pId);
		$query->bindparam(':pName', $pName);
		$query->bindparam(':pDescription', $pDescription);
		$query->bindparam(':pPrice', $pPrice);
		$query->bindparam(':pStock', $pStock);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':id' => $id, ':pName' => $pName, ':pDescription' => $pDescription, ':pPrice' => $pPrice, ':pStock' => $pStock, ':supplier' => $supplier));
				
		//redirectig to the display page. In our case, it is index.php
		header("Location: viewProducts.php");
	}
}
?>
<?php
//getting id from url
$pId = $_GET['pId'];
//selecting data associated with this particular id
$sql = "SELECT * FROM products_tbl WHERE pId=:pId";
$query = $dbConn->prepare($sql);
$query->execute(array(':pId' => $pId));
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$pName = $row['pName'];
	$pDescription = $row['pDescription'];
	$pPrice = $row['pPrice'];
	$pStock = $row['pStock'];
}
?>
<html>
<head>	
	<title>Edit Product</title>
</head>

<body>
	<a href="viewProducts.php">Back</a>
	<br/><br/>
	
	<form name="form5" method="post" action="editProduct.php">
		<table border="0">
			<tr> 
				<td>Product Name</td>
				<td><input type="text" name="pName" value="<?php echo $pName;?>"></td>
			</tr>
			<tr> 
				<td>Description</td>
				<td><input type="text" name="pDescription" value="<?php echo $pDescription;?>"></td>
			</tr>
			<tr> 
				<td>Price</td>
				<td><input type="text" name="pPrice" value="<?php echo $pPrice;?>"></td>
			</tr>
			<tr> 
				<td>Stock</td>
				<td><input type="text" name="pStock" value="<?php echo $pStock;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="pId" value=<?php echo $_GET['pId'];?>></td>
				<td><input type="submit" name="updateProduct" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>