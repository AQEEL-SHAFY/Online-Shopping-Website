<?php
session_start();
include("db.php");
$pagename="Smart Basket"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file 
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

if(ISSET($_POST['h_prodid'])){

//capture the ID of selected product using the POST method and the $_POST superglobal variable
//and store it in a new local variable called $newprodid
$newprodid=$_POST['h_prodid'];

//capture the required quantity of selected product using the POST method and $_POST superglobal variable 
//and store it in a new local variable called $reququantity

$reququantity=$_POST['p_quantity'];  
//Display id of selected product
// echo "<p>ID of selected product: ".$newprodid;
//Display quantity of selected product\
// echo "<p>Quantity of selected product: ".$reququantity;

//create a new cell in the basket session array. Index this cell with the new product id.
//Inside the cell store the required product quantity 
$_SESSION['basket'][$newprodid]=$reququantity;
echo "<p><b>1 item added</b>";
    
}
else{
    echo "<p><b>Basket Unchanged<b></p>";
}

//Create a variable $total and initialize it to zero
$total=0;
$subtotal=0;
//Create a HTML table with a header to display the content of the shopping basket 
echo "<table id='baskettable'>";
echo"<tr>";
echo"<th>Product Name</th>";
echo"<th>Product Price</th>";
echo"<th>Product Quantity</th>";
echo"<th>Subtotal</th>";
echo"</tr>";

//i.e. the product name, the price, the selected quantity and the subtotal
if (ISSET($_SESSION['basket'])) 
{
    foreach($_SESSION['basket'] as $index=>$value){
        $SQL="SELECT prodName, prodPrice, prodQuantity FROM Product WHERE prodId=".$index;
        $exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
        $arrayp=mysqli_fetch_array($exeSQL);
        echo "<tr>";
			echo "<th>".$arrayp["prodName"]."</th>";
			echo "<th>$".$arrayp["prodPrice"]."</th>";
			echo "<th>".$value."</th>";
			$subtotal=$arrayp["prodPrice"]*$value;	
			echo "<th>$".$subtotal."</th>";
			// echo "<th>$".$subtotal."</th>";
          
		echo"</tr>";  		
         $total=$total+$subtotal;
     
    //SQL query to retrieve from Product table details of selected product for which id matches $index
    //execute query and create array of records $arrayp
    //create a new HTML table row
    //display product name using array of records $arrayp 
    //display product price using the array of records $arrayp
    //display selected quantity of product retrieved from the cell of session array and now in $value
    //calculate subtotal, store it in a local variable $subtotal and display it
    //increase total by adding the subtotal to the current total
}
echo "<tr>";
    echo "<th colspan='3'>Total</th>";
    echo "<th>$".$total."</th>";
echo"</tr>";
echo"</table>";

    }
    else
    {
        echo"<p>Empty Basket";
    }

    
include("footfile.html"); //include head layout
echo "</body>";
?>
