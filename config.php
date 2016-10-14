<?php
$servername = "confmiss2016.mysql.uhserver.com";
$username = "confmiss2016";
$password = "@JesusReina2016";
$dbname = "confmiss2016";

/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "	";*/

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} ?>