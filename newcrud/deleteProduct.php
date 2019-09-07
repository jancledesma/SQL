<?php

//including the database connection file
include("config.php");


//getting pId of the data from url
$pId = $_GET['pId'];


//deleting the row from table
$sql = "DELETE FROM orders_tbl WHERE pId=:pId";
$query = $dbConn->prepare($sql);
$query->execute(array(':pId' => $pId));


//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>