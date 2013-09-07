<?php
include_once "Session.php";

/** Methods for managing creation and handling of sessions/tokens for opentok 
	connection. Layers between client-side javascript and web services. **/

//The list of active session
$sessionList = array();

// Creating an OpenTok Object
$apiObj = new OpenTokSDK();

/**
Return the list of active sessions.
*/
function getSessionList() {
	return $sessionList;
}

/**
	Create a new session (a session is like a chat room, with the password to the room being the token)
*/
function generateSessionId() {
	$sessionId = $apiObj->createSession( $_SERVER["REMOTE_ADDR"] );
	return $sessionId;
}

/**
	Generate a token for the given session (a token is the password needed to access a session)
*/
function generateToken($sessionId) {
	// Generate a token. Require parameter: SessionId
	$token = $apiObj->generateToken($sessionId);
	
	// Giving the token a moderator role, expire time 5 days from now, and connectionData to pass to other users in the session
	$token = $apiObj->generateToken($sessionId, RoleConstants::MODERATOR, time() + (5*24*60*60), "hello world!" );
	return $token;
}

/**
	Generate a new Session
*/
function createSession($sessionId, $token, $users) {
	//Generate the new Session object
	$session = new $Session($sessionId, $token, $users);
	
	//Add it to the list of active sessions
	$sessionList[] = $session;
}

/**
	Removes a session
*/
function removeSession($sessionId) {
	for($i = 0; $i < sizeof($sessions); ++$i) {
		if($sessions[i]->$sessionId == $sessionId) {
			unset($sessions[i]);
			break;
		}
	}
}

/**
	Checks to see if a user is in any active session
*/
function isInSession($userId) {
	for($i = 0; $i < sizeof($sessions); ++$i) {
		if($sessions[i]->isInSessions($userId)) {
			return true;
		}
	}
	
	return false;
}
?>