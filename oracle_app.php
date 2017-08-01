<?php
echo "version 1" . "<br><br>";

$username = 'ops$1007022';
$password = 'jbraznell123';

$conn = oci_connect($username, $password, '(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = oradb-srv.wlv.ac.uk)(PORT = 1522)) (CONNECT_DATA = (SID=orcle12c)))');

// Prepare the statement
$results = oci_parse($conn, "SELECT * FROM SQLI where USERNAME = 'user1'");

// Perform the logic of the query
$r = oci_execute($results);

// Fetch the results of the query
while ($row = oci_fetch_array($results, OCI_ASSOC+OCI_RETURN_NULLS)) {

    foreach ($row as $item) {
        print ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "\n";
    }

}

?>