<?php
// required headers 
headers("Access-Control-Allow-Origin: *");
headers("Content-Type: application/json; charset=UTF-8");
headers("Access-Control-Allow-Method: POST");
headers("Access-Control-Allow-Max-Age: 3600");
headers("Access-Control-Allow-Headers: Content-Type, Access-Control-AllowHeaders, Authorization, X-Requested-With");

// include database and object file
include_once '../config/database.php';
include_once '../objects/product.php';

// get database connection 
$database = new Database();
$db = $database->getConnection();

// prepare product object 
$product = new Product($db);

// get product id 
$data = json_decode(file_get_contents("php://input"));

// set product id to be deleted
$product->id = $data->id;

// delete the product 
if ($product->delete()){
    echo '{';
        echo '"message": "Product was deleted"';
    echo '}';
} else {
    // if unable to delete the product
    echo '{';
        echo '"message" : "Unable to delete object"';
    echo '}';
}
?>