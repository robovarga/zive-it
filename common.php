<?php

include_once "vendor/autoload.php";

use Tracy\Debugger;

Debugger::enable();


$latte = new Latte\Engine;
$latte->setTempDirectory('tempdir');


// connect to database
dibi::connect([
    'driver'   => 'mysqli',
    'host'     => 'mariadb101.websupport.sk',
    'username' => 'usnynhbq',
    'database' => 'usnynhbq',
    'password' => 'KKZUSMp5ci',
    'port' => '3312'
]);




$parameters = [
    'items' => ['one', 'two', 'three'],
];

// kresli na výstup
$latte->render('index.html', $parameters);

echo "ok";