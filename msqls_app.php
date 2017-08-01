<?php
  $serverName = "JAMESBRAZNELL\SQLEXPRESS";
$connectionInfo=array("Database"=>"SQLI");
 
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn ) {
echo 'Connection established<br><br>';
}else{
echo 'Connection failed<br><br>';
     die( print_r( sqlsrv_errors(), true));
}

$sql = "SELECT * FROM USERS WHERE USERNAME = 'User1'";

$results = sqlsrv_query( $conn, $sql);
if( $results === false ) {
     die( print_r( sqlsrv_errors(), true));
}

if( sqlsrv_fetch( $results ) === false) {
     die( print_r( sqlsrv_errors(), true));
}

$user = sqlsrv_get_field( $results, 0);
echo "$user: ";

$pass = sqlsrv_get_field( $results, 1);
echo $pass;

sqlsrv_close( $conn );        
?>