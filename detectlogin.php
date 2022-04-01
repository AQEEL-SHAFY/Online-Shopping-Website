<?php
//if the session user id $_SESSION['userid'] is set (i.e. if the user has logged in successfully)
if(isset($_SESSION['userid']))
{
//display first name and surname on the right hand-side, right under the navigation bar
echo "<p style='float:right'><i><b>Account: ".$_SESSION['fname']." ".$_SESSION['sname']."</b></i></p>";
}
?>