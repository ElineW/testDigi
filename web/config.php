<?php

/**
 * Configuration for database connection
 *
 */

$host       = "pacific-element-168211:europe-west1:testdigi";
$username   = "root";
$password   = "root";
$dbname     = "test"; // will use later
$dsn        = "mysql:host=$host;dbname=$dbname"; // will use later
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );