<?php 
// include database and object files 
include_once 'config/database.php'; 
include_once 'objects/product.php'; 
 
// get database connection 
$database = new Database(); 
$db = $database->getConnection();
 
// prepare project object
$product = new Project($db);
 
// get id of project to be edited
$data = json_decode(file_get_contents("php://input"));     
 
// set ID property of project to be edited
$project->id = $data->id;
 
// read the details of product to be edited
$project->readOneProject();
 
// create array
$project_arr[] = array(
    "id" =>  $project->id,
    "number" => $project->number,
    "name" => $project->name,
    "clientid" => $project->clientid,
    "notes" => $project->notes,
    "status" => $project->status
);
 
// make it json format
print_r(json_encode($project_arr));
?>