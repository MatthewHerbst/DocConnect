<?php
class Session {
	//Properties
	public $sessionId;
	public $token;
	public $users = array();
	
	//Default constructor
	function Session($sessionId, $token, $users) {
		$this->$sessionId = $sessionId;
		$this->$token = $token;
		$this->$users = $users;
	}
	
	//Check if a user is in the session
	function isInSession($userId) {
		return in_array($userId, $users);
	}
	
	//Add a user to the session
	function addUser($userId) {
		if(!in_array($userId, $users)) {
			$users[] = $userId; //Equivalent to array_push() but w/o the function overhead
		}
	}
	
	//Remove a user from the session
	//Credit: stackoverflow.com/questions/7225070/php-array-delete-by-value-not-key
	function removeUser($userId) {
		if(($key = array_search($userId, $users)) !== false) {
			unset($users[$key]);
		}
	}
}
?>