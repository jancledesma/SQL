<?php
//including the database connection file
include_once("config.php");
//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT 
oId,
uUsername,
cName,
pDescription,
pPrice


From orders_tbl o 
Inner Join products_tbl p 
ON o.pId = p.pId 

INNER Join customers_tbl c 
ON o.cId = c.cId

INNER Join users_tbl u
ON o.uId = u.uId
");
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="addUser.html">Register User</a><br/>
<a href="addProduct.html">Add New Product</a><br/>
<a href="addCustomer.html">Add New Customer</a><br/>
<a href="viewProducts.php">View Products</a>
<br/><br/>
	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Order ID</td>
		<td>User Name</td>
		<td>Customer Name</td>
		<td>Product Description</td>
		<td>Price</td>
		<td>Update</td>
		<!-- <td>Supplier</td> -->
	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['oId']."</td>";
		echo "<td>".$row['uUsername']."</td>";
		echo "<td>".$row['cName']."</td>";
		echo "<td>".$row['pDescription']."</td>";
		// echo "<td>".$row['category']."</td>";	
		// echo "<td>".$row['supplier']."</td>";	
		echo "<td>".$row['pPrice']."</td>";	
		echo "<td><a href=\"edit.php?oId=$row[oId]\">Edit</a> | <a href=\"delete.php?oId=$row[oId]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
	<a href="newTransaction.html">New Transaction</a>
</body>
</html>