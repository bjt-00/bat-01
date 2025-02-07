<?php

include '../controller/UserController.php';


$userController = new UserController();

$requestMethod='REQUEST_METHOD';
header("Content-Type: application/json; charset = utf-8");
header("Accept: application/json; charset = utf-8");

$request = file_get_contents('php://input');
$request = json_decode($request);

if($_SERVER[$requestMethod] === "GET"){
       echo $userController->getUserList();
   }else if($_SERVER[$requestMethod] === 'POST'){       
        echo $userController->addUser($request->firstName,$request->lastName,$request->orderCode);
    }else if($_SERVER[$requestMethod] === 'PUT'){
        
        if($request!=null){
            echo $request->orderCode.'---';
            echo $userController->updateUser($request->firstName,$request->lastName,$request->orderCode);
        }else{
            echo '400 Bad request error';
        }
    }else if($_SERVER[$requestMethod] === 'DELETE'){
       
        if($request!=null){
            echo $request->orderCode.'---';
            echo $userController->deleteUser($request->orderCode);
        }else{
            echo '400 Bad request error';
        }
    }
    
    ?>