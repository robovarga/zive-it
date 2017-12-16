<?php

include_once "common.php";


$faces_query = dibi::query('SELECT * FROM faces');
$faces = $faces_query->fetchAll();

$latteParameters['users'] = $faces;

$latte->render('templates/home.html', $latteParameters);