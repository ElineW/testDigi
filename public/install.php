<?php

require "config.php";
try {
	$connection = new PDO("mysql:host=$host", $username, $password, $options);
	$sql = "CREATE DATABASE test;

	use test;
	
	CREATE TABLE users (
		id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		firstname VARCHAR(30) NOT NULL,
		lastname VARCHAR(30) NOT NULL,
		email VARCHAR(50) NOT NULL,
		tlf VARCHAR(20),
		fdato VARCHAR(50),
		date TIMESTAMP
	);";

	$connection->exec($sql);
	
	echo "Database and table users created successfully.";
} catch(PDOException $error) {
	echo $sql . "<br>" . $error->getMessage();
};

?>