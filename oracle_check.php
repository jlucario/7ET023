<?php
echo "version 1" . "<br><br>";

$username = 'ops$1007022';
$password = 'jbraznell123';

$conn = oci_connect($username, $password, '(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = oradb-srv.wlv.ac.uk)(PORT = 1522)) (CONNECT_DATA = (SID=orcle12c)))');

// username and password sent from form 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

// Performs select query
$sql="SELECT * FROM SQLI WHERE USERNAME='$myusername' and PASSWORD='$mypassword'";
$result=oci_parse($conn, $sql);

// Counts the number of rows
$count=mysql_num_rows($result);

// If there is a result go forward
if($result>=1){

// Go to "login_success.php"
header("location:oracle_yes.php");
}
else {
echo "Incorrect login credentials";
}




?>