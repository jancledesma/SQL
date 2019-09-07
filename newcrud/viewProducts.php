<?php
//including the database connection file
include_once("config.php");
//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM products_tbl WHERE 1 ");
?>

<html>
<head>	
	<title>Products page</title>
</head>

<body>
<a href="index.php">Back to Home</a><br/>
<br/><br/>
	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Product ID</td>
		<td>Product Name</td>
		<td>Product Description</td>
        <td>Price</td>
        <td>Stock</td>
		<td>Update</td>
		<!-- <td>Supplier</td> -->
	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['pId']."</td>";
		echo "<td>".$row['pName']."</td>";
		echo "<td>".$row['pDescription']."</td>";
        echo "<td>".$row['pPrice']."</td>";
        echo "<td>".$row['pStock']."</td>";
		echo "<td><a href=\"editProduct.php?pId=$row[pId]\">Edit</a> | <a href=\"deleteProduct.php?pId=$row[pId]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>