<?php

$response = array('status' => "DECIMATE!");

if ( !isset($_POST['do']) ) {
    $response['status'] = "ERROR";
    $response["message"] = "Parameter 'do' missing.";

    response($response, 404);
}

$action = $_POST['do'];

if ($action == "change-name") {

    $user = $database->fetch("SELECT * FROM faces WHERE id = ?;", $_POST['user-id']);

    if(!$user) {
        $response["status"] = "ERROR";
        $response["message"] = "User not exists.";

        response($response, 404);
    }

    $affectedRows = $database->query('UPDATE faces SET', [
        'name' => $_POST['user-name'],
    ], 'WHERE id = ?', $_POST['user-id']);

    $response['userId'] = $user->id;
    $response['userOldName'] = $user->name;
    $response['userNewName'] = $_POST['user-name'];


}elseif ($action == "fetch-faces") {

    $lastUpdated = $_POST['updated'];
    
    $response["lastUpdated"] = date("Y-m-d H:i:s");

    $users = $database->fetchAll("SELECT * FROM faces WHERE created >= ? ORDER BY created DESC;", $lastUpdated);
    
    $latteParameters = array(
        "photosCDN" => $config['photosCND'],
        "users" => $users,
    );

    $response["html"] = $latte->renderToString('templates/face.html', $latteParameters);

}


response($response);




function response($response, $code = 200) {
    header('Content-type: application/json');
    http_response_code($code);

    echo json_encode($response);

    exit();
}