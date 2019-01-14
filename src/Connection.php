<?php

require SRC_PATH.DIRECTORY_SEPARATOR."QueryBuilder.php";

// set the connection variables as constants
DEFINE ('DB_HOST', '127.0.0.1');
DEFINE ('DB_USER', 'admin');
DEFINE ('DB_PASSWORD', 'password');
DEFINE ('DB_DATABASE', 'clientele');

//create a database connection
$dbConnection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if(!$dbConnection) {
    echo 'Unable to connect to MySQL!';
} else {
    $dbConnection = new QueryBuilder($dbConnection);
}