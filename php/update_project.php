<?php 
// include database and object files 
include_once '../config/database.php'; 
include_once '../objects/product.php'; 
 
// get database connection 
$database = new Database(); 
$db = $database->getConnection();
 
// prepare project object
$project = new Project($db);
 
// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));     
 
// set ID property of product to be edited
$project->id = $data->id;
 
// set product property values
$project->owner = $data->owner;
$project->client = $data->client;
$project->number = $data->number;
$project->name = $data->name;
$project->notes = $data->notes;
$project->status = $data->status;
$project->created = $data->created;
$project->modfied = date('Y-m-d H:i:s');
 
// update the project
if($project->update()){
    echo "Project was updated.";
}
 
// if unable to update the project, tell the user
else{
    echo "Unable to update project.";
}
?>