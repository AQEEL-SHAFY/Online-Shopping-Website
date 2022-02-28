<?php
session_start();
include("db.php");
mysqli_report(MYSQLI_REPORT_OFF);
$pagename = "Sign Up Results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>" . $pagename . "</title>"; //display name of the page as window title
echo "<body>";
include("headfile.html"); //include header layout file 
echo "<h4>" . $pagename . "</h4>"; //display name of the page on the web page
//Capture the 7 inputs entered in the 7 fields of the form using the $_POST superglobal variable
//Store these details into a set of 7 new local variables
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];
$postcode = $_POST['postcode'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordCon = $_POST['passwordCon'];
//Write a SQL query to insert a new user into users table 
//The SQL code for inserting a new record is 
//INSERT INTO table_name (field1, field2, field3) VALUES (value1, value2, value3)
$reg = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
//if the mandatory fields in the form (all fields) are not empty (hint: use the empty function)
if (empty($fname) || empty($fname) || empty($lname) || empty($address) || empty($postcode) || empty($tel) || empty($email) || empty($password) || empty($passwordCon)) {
    echo "<p><b>Sign Up failed!</b></p>";
    echo "<br><p>All mandatory fields need to be filled in </p>";
    echo "<br><p>Go Back to <a href=signup.php>sign up</a></p>";
}
//if the 2 entered passwords do not match
elseif ($password != $passwordCon) {
    //Display error passwords not matching message
    //Display a link back to register page
    echo "<p><b>Sign Up failed!</b></p>";
    echo "<br><p>The password you entered dosen't match</p>";
    echo "<br><p>Please, Enter the correct password</p>";
    echo "<br><p>Go Back to <a href=signup.php>sign up</a></p>";
} elseif (!preg_match($reg, $email)) {
    //define regular expression 
    //if email matches the regular expression (hint: use preg_match)
    echo "<p><b>Sign Up failed!</b></p>";
    echo "<br><p>Email not valid</p>";
    echo "<br><p>Please, Enter the correct email address</p>";
    echo "<br><p>Go Back to <a href=signup.php>sign up</a></p>";
} else {
    //Write SQL query to insert a new user into users table and execute SQL query
    // Execute INSERT INTO SQL query, if SQL execution is correct
    $query = "INSERT INTO Users (userType, userFName, userSName, userAddress, userPostcode, userTellNo, userEmail, userPassword) 
            VALUES ('C','$fname','$lname','$address','$postcode','$tel','$email','$password')";

    if (mysqli_query($conn, $query)) {
        //Display signup confirmation message
        //Display a link to login page
        echo "<p><b>Sign Up Successfull!</b></p>";
        echo "<br><p>To continue, please <a href=login.php>login</a></p>";
    }
    //else, if the SQL execution is erroneous, there is a problem
    else {
        //Display generic error message
        //Return the SQL execution error number using the error detector (hint: use mysqli_errno($conn))
        echo "<p><b>Sign Up failed!</b></p>";
        echo "<br><p>SQL Error No: " . mysqli_errno($conn) . "</p>";
        echo "<br><p>SQL Error Msg: " . mysqli_error($conn) . "</p>";

        //if error detector returns number 1062 i.e. unique constraint on the email is breached 
        //(meaning that the user entered an email which already existed)
        if (mysqli_errno($conn) == 1062) {
            //Display email already taken error message & display a link back to signup page
            echo "<br><p>Email already in use</p>";
            echo "<br><p>Please try using another email address</p>";
        }
        //if error detector returns number 1064 i.e. invalid characters such as ' and \ have been entered 
        if (mysqli_errno($conn) == 1064) {
            //Display invalid characters error message & display a link back to signup page
            echo "<br><p>Invalid characters entered in the form</p>";
            echo "<br><p>Make sure you avoid the followng characters" . $invalidchars . "</p>";
            echo "<br><p>Go Back to <a href=signup.php>sign up</a></p>";
        }
    }
}




//Execute the INSERT INTO SQL query

include("footfile.html"); //include head layout
echo "</body>";
