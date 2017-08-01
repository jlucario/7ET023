<?php
echo "version 6" . "<br><br>";

$host="localhost"; // Host name 
$username="1007022"; // Mysql username 
$password="thomas123"; // Mysql password 
$db_name="db1007022"; // Database name 
$tbl_name="SQLI"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

// Performs select query
$sql="SELECT * FROM $tbl_name WHERE User='$myusername' and Pass='$mypassword'";
$result=mysql_query($sql);

// Counts the number of rows
$count=mysql_num_rows($result);

// If there is a result go forward
if($count>=1){

// Go to "login_success.php"
header("location:mysql_yes.php");
}
else {
echo "Incorrect login credentials";
}
?>