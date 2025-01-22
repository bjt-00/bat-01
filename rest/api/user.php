<?php 

include '../controller/UserController.php';

header("Content-Type: application/json; charset = utf-8");
header("Accept: application/json; charset = utf-8");

$userController = new UserController();

$requestMethod='REQUEST_METHOD';
$request = file_get_contents('php://input');
$request = json_decode($request);
	
if($_SERVER[$requestMethod] == "GET"){
	echo $userController->getUserList();}
else if($_SERVER['REQUEST_METHOD'] === 'POST'){
	echo $userController->addUser($request->firstName,$request->lastName,$request->orderCode);
}
else if($_SERVER['REQUEST_METHOD'] === 'PUT'){
	echo $userController->updateUser($request->firstName,$request->lastName,$request->orderCode);
}
else if($_SERVER['REQUEST_METHOD'] === 'DELETE'){
	echo $userController->deleteUser($request->orderCode);
}

?>