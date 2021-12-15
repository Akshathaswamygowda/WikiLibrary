<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../includes/config.php';
include_once '../class/books.php';
 
$database = new Database();
$db = $database->getConnection(); 

$books = new Books($db);
 
$data = json_decode(file_get_contents("php://input"));

if(!empty($data->name) && !empty($data->description) &&
!empty($data->genre)  &&
!empty($data->added_on)){    

    $books->name = $data->name;
    $books->description = $data->description;
    $books->genre = $data->genre;	
    $books->added_on = date('Y-m-d H:i:s'); 

    if($books->create()){         
        http_response_code(201);         
        echo json_encode(array("message" => "Book added to the list."));
    } 
    else{         
        http_response_code(503);        
        echo json_encode(array("message" => "Unable to create book."));
    }
}else{    
    http_response_code(400);    
    echo json_encode(array("message" => "Unable to create book. Data is incomplete."));
}
?>