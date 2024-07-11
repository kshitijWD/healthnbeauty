<?php
// // Server
// $username = "healthn_db";
// $password = "o!g;pbY%Vbf5";
// $server = "localhost";
// $db = "healthn_db";

// localhost
$username = "root";
$password = "";
$server = "localhost";
$db = "healthn_db";

$con = mysqli_connect($server, $username, $password, $db);

if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

?>