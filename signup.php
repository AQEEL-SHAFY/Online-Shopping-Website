<?php
$pagename="Sign Up"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file 
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page


echo "<form action=signup_process.php  method=post>";
echo "<table style='border: 0px'>";
echo "<tr style='border: 0px'>";
echo "<td style='border: 0px'>First Name:</td>";
echo "<td style='border: 0px'><input type='text' name='fname' size=35>";
echo "</tr>";

echo "<tr style='border: 0px'>";
echo "<td style='border: 0px'>Last Name:</td>";
echo "<td style='border: 0px'><input type='text' name='lname' size=35>";
echo "</tr>";

echo "<tr style='border: 0px'>";
echo "<td style='border: 0px'>Address:</td>";
echo "<td style='border: 0px'><input type='text' name='address' size=35>";
echo "</tr>";

echo "<tr style='border: 0px'>";
echo "<td style='border: 0px'>Postcode:</td>";
echo "<td style='border: 0px'><input type='text' name='postcode' size=35>";
echo "</tr>";

echo "<tr style='border: 0px'>";
echo "<td style='border: 0px'>Tel No:</td>";
echo "<td style='border: 0px'><input type='text' name='tel' size=35>";
echo "</tr>";

echo "<tr style='border: 0px'>";
echo "<td style='border: 0px'>Email Address:</td>";
echo "<td style='border: 0px'><input type='text' name='email' size=35>";
echo "</tr>";

echo "<tr style='border: 0px'>";
echo "<td style='border: 0px'>Password:</td>";
echo "<td style='border: 0px'><input type='password' name='password' size=35>";
echo "</tr>";

echo "<tr style='border: 0px'>";
echo "<td style='border: 0px'>Confirm Password:</td>";
echo "<td style='border: 0px'><input type='password' name='passwordCon' size=35>";
echo "</tr>";

echo "<tr style='border: 0px'>";
echo "<td style='border: 0px'><input id='submitbtn' type='submit' value='Sign Up'></td>";
echo "<td style='border: 0px'><input id='submitbtn' type='reset' value='Clear Form'></td>";
echo "</tr>";

echo "</table>";
echo "</form>";

include("footfile.html"); //include head layout
echo "</body>";
?>
