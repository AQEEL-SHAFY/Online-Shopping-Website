<?php
session_start();
$pagename="LOGIN"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file 
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
//The form should direct the user to a login_process.php file (specify this file in the action attribute) and post the values to that file (use the post method).
//The form should be made of 2 text fields to capture the user’s email address and password.
//The form should appear within a HTML table for greater readability
echo "<form action=login_process.php  method=post>";
echo "<table style='border: 0px'>";
echo "<tr style='border: 0px'>";
echo "<td style='border: 0px'>Email:</td>";
echo "<td style='border: 0px'><input type='text' name='email' size=35>";
echo "</tr>";

echo "<tr style='border: 0px'>";
echo "<td style='border: 0px'>Password:</td>";
echo "<td style='border: 0px'><input type='text' name='password' size=35>";
echo "</tr>";

echo "<tr style='border: 0px'>";
echo "<td style='border: 0px'><input id='submitbtn' type='reset' value='Clear Form'></td>";
echo "<td style='border: 0px'><input id='submitbtn' type='submit' value='Log In'></td>";
echo "</tr><br>";

echo "</table>";
echo "</form>";
include("footfile.html"); //include head layout
echo "</body>";
?>
