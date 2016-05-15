<?php 
// include database and object file 
include_once 'config/database.php'; 
include_once 'objects/product.php'; 
 
// get database connection 
$database = new Database(); 
$db = $database->getConnection();
 
// prepare project object
$project = new Project($db);
 
// get project id
$data = json_decode(file_get_contents("php://input"));     
 
// set project id to be deleted
$project->id = $data->id;
 
// delete the product
if($project->delete()){
    echo "Project was deleted.";
}
 
// if unable to delete the project
else{
    echo "Unable to delete project.";
}
?>