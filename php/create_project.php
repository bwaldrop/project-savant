<?php 
// get database connection 
include_once '../config/database.php'; 
$database = new Database(); 
$db = $database->getConnection();
 
// instantiate product object
include_once 'objects/project.php';
$product = new Project($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input")); 
 
// set project property values
$project->ProjNo = $data->ProjNo;
$project->name = $data->name;
$project->notes = $data->notes;
$project->clientid = $data->clientid;
$project->statusid = $data->statusid;
$project->created = date('Y-m-d H:i:s');
     
// create the project
if($project->create()){
    echo "Project was created.";
}
 
// if unable to create the project, tell the user
else{
    echo "Unable to create project.";
}
?>