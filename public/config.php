<?php

/** 
 * Configuration for database connection
 *
 */ 

include$url = "vendor/bin/heroku-php-apache2 web/")

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$conn = new mysqli($server, $username, $password, $db);
?>


