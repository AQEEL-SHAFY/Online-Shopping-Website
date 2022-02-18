<?php
$dbhost = 'phpmyadmin.ecs.westminster.ac.uk';
$dbuser = 'w1832563';
$dbpass = 'OwjmIwMU0qH7';
$dbname = 'w1832563_0';
//create a DB connection 
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
//if the DB connection fails, display an error message and exit
if (!$conn)
{
 die('Could not connect: ' . mysqli_error($conn));
}
//select the database
mysqli_select_db($conn, $dbname);
?>