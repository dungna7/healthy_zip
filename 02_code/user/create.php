<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '/../data_config.php';
include_once 'users.php';

$database = new Database();
$db = $database->getConnection();
 
$user = new User($db);
 
// get posted data
//var_dump($_POST['email']);
//$data = json_decode(file_get_contents("php://input"));
// set user property values
$user->name = $_POST['name'];
$user->email = $_POST['email'];
$user->permision = $_POST['permision'];
 // create the user
if($user->create()){
    echo '{';
        echo '"message": "user was created."';
    echo '}';
}
 
// if unable to create the user, tell the user
else{
    echo '{';
        echo '"message": "Unable to create user."';
    echo '}';
}
?>