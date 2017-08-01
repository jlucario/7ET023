<?php
 echo "version 3";
 print("<br><br>");
 
//Database credentials
$dbServName = "localhost";
$dbUserName = "1007022";
$dbPassword = "thomas123";
$dbName = "db1007022";

//Establish connection to database
$con = new mysqli($dbServName, $dbUserName, $dbPassword, $dbName);

//Check connection to database
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

//Perform query on database
$sql = "SELECT * FROM `SQLI` WHERE `User` = 'user1'";  
$result = $con->query($sql);

//Check query on database
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["User"]. "<br>" . "Pass: " . $row["Pass"]. "<br>";
    }
} else {
    echo "0 results";
}
$con->close();
?>