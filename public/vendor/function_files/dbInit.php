<?php
$dbHost = Config::get("DB_HOST");
$dbUser = Config::get("DB_USER");
$dbPass = Config::get("DB_PASS");
$dbName = Config::get("DB_NAME");
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if(!$conn){
  $dbConn = false;
}else{
	$dbConn = true;
}
?>