<?php

include_once "common.php";




$parameters = [
    'items' => ['one', 'two', 'three'],
];

$latte->render('templates/home.html', $parameters);