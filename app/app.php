<?php

include_once __DIR__ . "/common.php";


/* AJAX check  */
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    
    $array = array('status' => "DECIMATE!");
    
    if ( isset($_POST['user-id']) ) {
        $user = $database->fetch("SELECT * FROM faces WHERE id = ?;", $_POST['user-id']);

        if(!$user) {
            $array["status"] = "ERROR";
            $array["message"] = "user not exists.";\

            header('Content-type: application/json');
            http_response_code(403);
            echo json_encode($array);
            exit();
        }

        $affectedRows = $database->query('UPDATE faces SET', [
            'name' => $_POST['user-name'],
        ], 'WHERE id = ?', $_POST['user-id']);

        $array['userId'] = $user->id;
        $array['userOldName'] = $user->name;
        $array['userNewName'] = $_POST['user-name'];
    }


    header('Content-type: application/json');
    echo json_encode($array);

	exit();
}



// Query: Select all faces from database
$faces = $database->fetchAll('SELECT * FROM faces');

$latteParameters['users'] = $faces;

$latte->render('templates/home.html', $latteParameters);