<!DOCTYPE html>
<!--	Author: Cameron Perkins/Chase Martin
		Date:	7/29/2020
		File:	add_film.php
		Purpose:Query to insert a film into database using html input
-->

<html>
<head>
	<title>MySQL Query</title>
	<link rel ="stylesheet" type="text/css" href="sample.css">
</head>

<body>

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


$title = $_POST['title'];
$description = $_POST['description'];
$release_year = $_POST['release_year'];
$language_id = $_POST['language_id'];
$rental_duration = $_POST['rental_duration'];
$rental_rate = $_POST['rental_rate'];
$length = $_POST['length'];
$replacement_cost = $_POST['replacement_cost'];
$rating = $_POST['rating'];
$special_features = $_POST['special_features'];

$userQuery = "INSERT INTO sakila.film (title,description,release_year,language_id,rental_duration,rental_rate,length,replacement_cost,rating,special_features) VALUES ('1st Grade FBI Agent','An undercover FBI agent must pretend to be a 1st grade teacher to catch the bad guy',2014,2,5,4.99,123,20.99,'PG-13','trailers')";

//$userQuery = "INSERT INTO film (title, description, release_year, language_id, rental_duration, length, replacement_cost, rating, special_features) VALUES ('$title', '$description', '$release_year', '$language_id', '$rental_duration', '$rental_rate', '$length', '$replacement_cost', '$rating', '$special_features') ";

$result = mysqli_query($connect, $userQuery);

if (!$result) 
{
	die("Could not successfully run query ($userQuery) from $db: " .	
		mysqli_error($connect) );
}
else
{
	print("	<h1>ADD A NEW FILM RECORD</h1>");
	print ("<p>The following record was added to the film table:</p>");
	print("<table border='1'>
			<tr><td>Title</td><td>$title</td></tr>
			<tr><td>Description</td><td>$description</td></tr>
			<tr><td>Release Year</td><td>$release_year</td></tr>		
			<tr><td>Language ID</td><td>$language_id</td></tr>
			<tr><td>Rental Duration</td><td>$rental_duration</td></tr>
			<tr><td>Rental Rate</td><td>$rental_rate</td></tr>
			<tr><td>Length</td><td>$length</td></tr>
			<tr><td>Replacement Cost</td><td>$replacement_cost</td></tr>
			<tr><td>Rating</td><td>$rating</td></tr>
			<tr><td>Special Features</td><td>$special_features</td></tr>
			</table>");
}


mysqli_close($connect);   // close the connection
 
?>

<input type= "button" name ="Back to Manager" value ="Back to the lab again" onClick="window.open('./manager.html')">
</body>
</html>