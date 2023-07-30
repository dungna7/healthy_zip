<?php
 
// include database and object files
include_once './../data_config.php';
include_once 'recommended.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$recommended = new Recommended($db);
$recommended->limit = isset($_GET['limit']) ? $_GET['limit'] : 8;
$recommended->offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
// query products
$stmt = $recommended->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
// var_dump($stmt);die;
if($num>0){
 
    // products array
    $recommended_arr=array();
    $recommended_arr["data"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $recommended_item=array(
            "id" => $id,
            "type" => $type,
            "title" => $title,
            "image_path" => $image_path,
            "content" => $content,
            "created" => $created,
            "is_delete" => $is_delete,
            "hash_tag" => $hash_tag,
        );
 
        array_push($recommended_arr["data"], $recommended_item);
    }
 
    echo json_encode($recommended_arr);
}
 
else{
    echo json_encode(
        array("message" => "No user found.")
    );
}
?>