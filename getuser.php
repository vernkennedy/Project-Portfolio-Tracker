
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>


<?php

						 // Create connection
		$myconnection = new mysqli("localhost", "root", "", "dbtuts");
		// Retrieve information from the database
		$myinformation = $myconnection->query("SELECT * FROM users ");

				 // output data of each record
				 while($record = $myinformation->fetch_assoc()) {
					
				  echo "<tr>";
    echo "<td>" . $row['user_id'] . "</td>";
    echo "<td>" . $row['projectName'] . "</td>";
    echo "<td>" . $row['projectType'] . "</td>";
    echo "<td>" . $row['cost'] . "</td>";
    echo "<td>" . $row['duration'] . "</td>";


?>
