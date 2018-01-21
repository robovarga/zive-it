<?php

include_once "vendor/autoload.php";

use Tracy\Debugger;
use Symfony\Component\Yaml\Yaml;


Debugger::enable();

$config = Yaml::parseFile(__DIR__ . '/config.yaml');

$latte = new Latte\Engine;
$latte->setTempDirectory('tempdir');

$latteParameters = array(
    "photosCDN" => 'http://photos.betarmy.org/',
);

// connect to database

$dbOptions = $config['database'];


$database = new Dibi\Connection($dbOptions);



