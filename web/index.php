<?php

require('../vendor/autoload.php');
include "views/header.php"; 
include "views/index.html";

<ul>
	<li><a href="create.php"><strong>Create</strong></a> - add a user</li>
	<li><a href="read.php"><strong>Read</strong></a> - find a user</li>
</ul>
 ?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  

	<title>Simple Database App</title>

	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<h1>Simple Database App</h1>

	<ul>
		<li><a href="create.php"><strong>Create</strong></a> - add a user</li>
		<li><a href="read.php"><strong>Read</strong></a> - find a user</li>
	</ul>

</body>
</html>

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE TabellDigi (
  navn VARCHAR(30) NOT NULL,
  etternavn VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  telefon VARCHAR(20),
  fodselsdato TIMESTAMP
  )";

  if ($conn->query($sql) === TRUE) {
    echo "TabellDigi er opprettet suksessfullt";
  } else {
    echo "Feil ved oppretting av tabell: " . $conn->error;
  }

  $conn->close();

$app = new Silex\Application();
$app['debug'] = true;



// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));
$app->run();
