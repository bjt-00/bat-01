<?php

 class UserService{
	private $file = '../api/user.json';
	function getUserList(){
		// Read the JSON file
		$json = file_get_contents($this->file); 

		// Check if the file was read successfully
		if ($json === false) {
		    return 'Error reading the JSON file';
		}else{
			return $json;
		}
	}
	
	function addUser($firstName,$lastName,$orderCode){
		$json = $this->getUserList();
		$json = json_decode($json,true);
		$json[] = array("firstName" => $firstName, "lastName" => $lastName,"orderCode" => $orderCode);
		file_put_contents($this->file, json_encode($json));
		return $firstName." created successfully";
	}
	
	function updateUser($firstName,$lastName,$orderCode){
		$json = $this->getUserList();
	    $json = json_decode($json);
		
		$totalUsers = count($json);
		for($i=0;$i<$totalUsers;$i++) {
			$user = $json[$i];
			if($user->orderCode==$orderCode){
				$user->firstName = $firstName;
				$user->lastName = $lastName;
				file_put_contents($this->file, json_encode($json));
				return $firstName.' updated successfully';
			}
		}
		return "User not found with given orderCode:".$orderCode;
	}
	function deleteUser($orderCode){
		$json = $this->getUserList();
		$json = json_decode($json);

		$totalUsers = count($json);
		for($i=0;$i<$totalUsers;$i++) {
			$user = $json[$i];
			if($user->orderCode==$orderCode){
				$json[$i] = null;
				//$json = array_diff($json,$user);
				file_put_contents($this->file, json_encode($json));
				return $orderCode.' deleted successfully';
			}
		}
		return "User not found with given orderCode:".$orderCode;
	}
}
?>
