<?php

$username = "root";
$password = "";
$server = "localhost";
$db = "health_beauty";

$con = mysqli_connect($server, $username, $password, $db);

if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

?>