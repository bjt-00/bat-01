<?php
include '../service/UserService.php';


 class UserController{
	function getUserList(){
		$userService = new UserService();
		return $userService->getUserList();
	}
	
	function addUser($firstName,$lastName,$orderCode){
		$userService = new UserService();
		return $userService->addUser($firstName,$lastName,$orderCode);
	}
	function updateUser($firstName,$lastName,$orderCode){
		$userService = new UserService();
		return $userService->updateUser($firstName,$lastName,$orderCode);
	}
	function deleteUser($orderCode){
		$userService = new UserService();
		return $userService->deleteUser($orderCode);
	}
}
?>
