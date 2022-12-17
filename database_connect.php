<?php

// Variables to connect to the database.
$host = "localhost";
$username = "root";
$password = "Jazzeniah3%";
$database = "test";

// Create the connection.
$mysqli = new mysqli($host, $username, $password, $database);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

?>