<?php

require('../vendor/autoload.php');

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

// Register view rendering
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

// Our web handlers

$app->get('/', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('index.twig');
});
;

$app->run();
