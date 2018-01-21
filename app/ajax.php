<?php

$array = array('status' => "DECIMATE!");

if ( !isset($_POST['do']) ) {
    $array['status'] = "ERROR";
    $array["message"] = "Parameter 'do' missing.";

    response($array, 404);
}

$action = $_POST['do'];

if ($action == "change-name") {

    $user = $database->fetch("SELECT * FROM faces WHERE id = ?;", $_POST['user-id']);

    if(!$user) {
        $array["status"] = "ERROR";
        $array["message"] = "user not exists.";

        response($array, 404);
    }

    $affectedRows = $database->query('UPDATE faces SET', [
        'name' => $_POST['user-name'],
    ], 'WHERE id = ?', $_POST['user-id']);

    $array['userId'] = $user->id;
    $array['userOldName'] = $user->name;
    $array['userNewName'] = $_POST['user-name'];


}elseif ($action == "fetch-faces") {

    $lastUpdated = $_POST['updated'];
    
    $array["lastUpdated"] = date("Y-m-d H:i:s");

    $users = $database->fetchAll("SELECT * FROM faces WHERE created >= ? ORDER BY created DESC;", $lastUpdated);
    
    $latteParameters = array(
        "photosCDN" => 'http://photos.betarmy.org/',
        "users" => $users,
    );

    $array["html"] = $latte->renderToString('templates/face.html', $latteParameters);

}


response($array);




function response($response, $code = 200) {
    header('Content-type: application/json');
    http_response_code($code);

    echo json_encode($response);

    exit();
}