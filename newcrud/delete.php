<?php

//including the database connection file
include("config.php");


//getting oId of the data from url
$oId = $_GET['oId'];


//deleting the row from table
$sql = "DELETE FROM orders_tbl WHERE oId=:oId";
$query = $dbConn->prepare($sql);
$query->execute(array(':oId' => $oId));


//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>