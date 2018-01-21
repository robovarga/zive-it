<?php

include_once __DIR__ . "/common.php";


/* AJAX check  */
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    
    include_once __DIR__ . "/ajax.php";

	exit();
}



// Query: Select all faces from database
$faces = $database->fetchAll('SELECT * FROM faces ORDER BY created DESC');

$latteParameters['users'] = $faces;
$latteParameters['currentTimestamp'] = date("Y-m-d H:i:s");

$latte->render('templates/home.html', $latteParameters);