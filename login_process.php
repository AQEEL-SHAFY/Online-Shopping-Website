<?php
session_start();
include("db.php");
$pagename = "Your Login Results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>" . $pagename . "</title>"; //display name of the page as window title
echo "<body>";
include("headfile.html"); //include header layout file 
echo "<h4>" . $pagename . "</h4>"; //display name of the page on the web page
//Capture the 2 inputs entered in the form (email and password) using the $_POST superglobal variable
//Assign these values to 2 new local variables $email and $password
//Display the content of these 2 variables to ensure that the values have been posted properly


$email = $_POST['email'];
$password = $_POST['password'];

echo "<p>Email entered:" . $email . "</p>";
echo "<p>Password entered:" . $password . "</p>";

//if either mandatory email or password fields in the form are empty (hint: use the empty function)
if (empty($email) || empty($password)) {
    //Display error "Both email and password fields need to be filled in" message and link to login page
    echo "<p>Login Failed!</p>";
    echo "<p>Both email and password fields need to be filled in</p>";
    echo "<p>Make sure you provide all the reqired details<p>";
    echo "<p>Go back to <a href='login.php'>login</a></p>";
} else {
    $SQL = "SELECT * FROM Users WHERE userEmail='".$email."'";
	$exeSQL = mysqli_query($conn,$SQL) or die (mysqli_error($conn));
    $nbrecs = mysqli_num_rows($exeSQL); 
    $arrayu = mysqli_fetch_array($exeSQL); 
   
    //SQL query to retrieve the record from the users table for which the email matches login email (in form)
    //execute the SQL query & fetch results of the execution of the SQL query and store them in $arrayu 
    //also capture the number of records retrieved by the SQL query using function mysqli_num_rows and store it 
    //in a variable called $nbrecs
    //if the number of records is 0 (i.e. email retrieved from the DB does not match $email login email in form
    if ($nbrecs == 0) {
        //display error message "Email not recognised, login again"
        echo "<p>Login Failed!</p>";
        echo "<p>Email not recognised</p>";
        echo "<p>Go back to <a href='login.php'>login</a></p>";
    }else
{
  
    //if password retrieved from the database (in arrayu) does not match $password
    if($arrayu['userPassword'] != $password)
    {
    //display error message "Password not recognised, login again"
    echo "<p><b>Login failed!</b>"; //display login error
    echo "<br>Password not valid</p>";
    echo "<br><p> Go back to <a href=login.php>login</a></p>";
    }
    else
    {
    //display login success message and store user id, user type, name into 4 session variables i.e.
    echo "<p><b>Login success</b></p>"; 
    $_SESSION['userid'] = $arrayu['userId']; 
    $_SESSION['fname'] = $arrayu['userFName']; 
    $_SESSION['sname'] = $arrayu['userSName']; 
    $_SESSION['usertype'] = $arrayu['userType'];
    //create $_SESSION['userid'], $_SESSION['usertype'], $_SESSION['fname'], $_SESSION['sname'],
    echo "<p> Welcome, ".$_SESSION['fname']." ".$_SESSION['sname']."</p>";//Greet the user by displaying their name using $_SESSION['fname'] and $_SESSION['sname']
    if ($_SESSION['usertype']=='C') //if user type is C, they are a customer
    {
    echo "<p>User Type: homteq Customer</p>";
    }
    if ($_SESSION['usertype']=='A') //if user type is A, they are an admin
    {
    echo "<p>User type: homteq Administrator</p>";
    }

    echo "<br><p>Continue shopping for <a href=index.php>Home Tech</a>";
    echo "<br>View your <a href=basket.php>Smart Basket</a></p>";

    //Welcome them as a customer by using $_SESSION['usertype '] 
    }
    }
}



include("footfile.html"); //include head layout
echo "</body>";

