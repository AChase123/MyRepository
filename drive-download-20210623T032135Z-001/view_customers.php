<!DOCTYPE html>
<!--	Author: Cameron Perkins/Chase Martin
		Date:	7/29/2020
		File:	view_customers.php
		Purpose: View Customer list by query from sakila database
-->

<html>
<head>
	<title>MySQL Query</title>
	<link rel ="stylesheet" type="text/css" href="sample.css">
</head>

<body>

<input type= "button" name ="Back to Manager" value ="Back" onClick="window.open('./manager.html')">

<?php


$server = "localhost";
$user = "root";
$pw = "";
$db = "sakila";

$connect=mysqli_connect($server, $user, $pw, $db);

if( !$connect) 
{
	die("ERROR: Cannot connect to database $db on server $server 
	using user name $user (".mysqli_connect_errno().
	", ".mysqli_connect_error().")");
}
$userQuery = "SELECT * FROM customer";
$addressQuery = "SELECT * FROM address INNER JOIN customer ON address.address_id = customer.address_id";
$cityQuery = "SELECT * FROM city INNER JOIN address ON city.city_id = address.city_id";
$rentalQuery = "SELECT * FROM rental";
$filmsQuery = "SELECT * FROM film";

$result = mysqli_query($connect, $userQuery);
$addressResult = mysqli_query($connect, $addressQuery);
$cityResult = mysqli_query($connect, $cityQuery);
$rentalResult = mysqli_query($connect, $rentalQuery);
$filmsResult = mysqli_query($connect, $filmsQuery);

if (!$result) 
{
	die("Could not successfully run query ($userQuery) from $db: " .	
		mysqli_error($connect) );
}

if (mysqli_num_rows($result) == 0) 
{
	print("No records found with query $userQuery");
}
else 
{ 
	print("<h1>List of Customer Data</h1>");

	print("<table border = \"1\">");
	print("<tr><th>First Name</th><th>Last Name</th>
		 <th>Address</th><th>City</th>
		 <th>District</th><th>Postal Code</th><th>Film Titles</th></tr>");

	while ($row = mysqli_fetch_assoc($result))
	{

$row = mysqli_fetch_assoc($result);
$addressRow = mysqli_fetch_assoc($addressResult);
$cityRow = mysqli_fetch_assoc($cityResult);
$rentalRow = mysqli_fetch_assoc($rentalResult);
$filmRow = mysqli_fetch_assoc($filmsResult);
		print ("<tr><td>".$row['first_name']."</td><td>"
				 .$row['last_name']."</td><td>"
				.$addressRow['address']."</td><td>"
				.$cityRow['city']."</td><td>"
				.$addressRow['district']."</td><td>"
				.$addressRow['postal_code']."</td><td>"
				.$filmRow['title']."</td></tr>");
	}

	print("</table");
}

mysqli_close($connect);   // close the connection
 
 //http://localhost/3220/hw81st/manager.html
 
?>
</body>
</html>