<?php
session_start();
include("db.php");
$pagename="Sign Up Results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file 
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$address=$_POST['address'];
$postcode=$_POST['postcode'];
$tel=$_POST['tel'];
$email=$_POST['email'];
$password=$_POST['password'];
$passwordCon=$_POST['passwordCon'];

$query="INSERT INTO Users (userType, userFName, userSName, userAddress, userPostcode, userTellNo, userEmail, userPassword) 
VALUES ('C','$fname','$lname','$address','$postcode','$tel','$email','$password')";
//Capture the 7 inputs entered in the 7 fields of the form using the $_POST superglobal variable
//Store these details into a set of 7 new local variables
//Write a SQL query to insert a new user into users table 
//The SQL code for inserting a new record is 
//INSERT INTO table_name (field1, field2, field3) VALUES (value1, value2, value3)
//Execute the INSERT INTO SQL query
mysqli_query($conn, $query);
include("footfile.html"); //include head layout
echo "</body>";
?>
