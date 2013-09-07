<?php
/** Methods for managing creation and handling of sessions/tokens for opentok 
	connection. Layers between client-side javascript and web services. **/

//The list of active session
$sessionList = array();

function getSessionList() {
	return $sessionList;
}

// Creating an OpenTok Object
$apiObj = new OpenTokSDK();

//Create a new session (a session is like a chat room, with the password to the
//room being the token)
function createSession($users) {
	$sessionId = $apiObj->createSession( $_SERVER["REMOTE_ADDR"] );
	return $sessionId;
}

//Generate a token for the given session (a token is the password needed to
//access a session)
function generateToken($sessionId) {
	// Generate a token. Require parameter: SessionId
	$token = $apiObj->generateToken($sessionId);
	
	// Giving the token a moderator role, expire time 5 days from now, and connectionData to pass to other users in the session
	$token = $apiObj->generateToken($sessionId, RoleConstants::MODERATOR, time() + (5*24*60*60), "hello world!" );
	return $token;
}


include_once 'footer.php';
?>