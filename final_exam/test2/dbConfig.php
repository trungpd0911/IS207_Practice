<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "IS207_final_2";
// create connection
$con = new mysqli($localhost, $username, $password, $dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

return $con;
