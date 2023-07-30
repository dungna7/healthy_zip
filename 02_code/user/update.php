<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once './../data_config.php';
include_once 'users.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare user object
$user = new user($db);
 
// get id of user to be edited
// $data = json_decode(file_get_contents("php://input"));
 
// set ID property of user to be edited
$user->id = $_GET['id'];
 
// set user property values
$user->name = $_POST['name'];
$user->address = $_POST['address'];
// update the user
if($user->update()){
    echo '{';
        echo '"message": "user was updated."';
    echo '}';
}
 
// if unable to update the user, tell the user
else{
    echo '{';
        echo '"message": "Unable to update user."';
    echo '}';
}
?>