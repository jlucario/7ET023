<?php
echo "version 1" . "<br><br>";

$serverName = "JAMESBRAZNELL\SQLEXPRESS";
$connectionInfo=array("Database"=>"SQLI");
 
/* Connect using Windows Authentication. */
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn ) {
echo 'Connection established<br><br>';
}else{
echo 'Connection failed<br><br>';
     die( print_r( sqlsrv_errors(), true));
}

// username and password sent from form 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

// Performs select query
$sql="SELECT * FROM USERS WHERE USERNAME='$myusername' and PASSWORD='$mypassword'";
$results=sqlsrv_query( $conn, $sql);

if( sqlsrv_fetch( $results ) === false) {
     die( print_r( sqlsrv_errors(), true));
}

// If there is a result go forward
if($results>=1){

// Go to "msqls_yes.php"
header("location:msqls_yes.php");
}
else {
echo "Incorrect login credentials";
}
?>