<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPwd = "";
$dbName = "business_db";

$conn = "";

try {
    $conn = mysqli_connect($serverName, 
                           $dbUsername, 
                           $dbPwd, 
                           $dbName);
} catch (mysqli_sql_exception) {
    echo "Could not connect!";
}
