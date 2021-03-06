//Code source: https://www.firebase.com/tutorial/#session/bkb5rgke1v5

//Name is retreived from the name varible placed by the header
var name = "";

// Get a reference to the presence data in Firebase.
var userListRef = new Firebase("https://docconnect.firebaseio.com/presence");

// Generate a reference to a new location for my user with push.
var myUserRef = userListRef.push();

// Get a reference to my own presence status.
var connectedRef = new Firebase('https://docconnect.firebaseio.com/.info/connected');
connectedRef.on("value", function(isOnline) {
	if (isOnline.val()) {
		// If we lose our internet connection, we want ourselves removed from the list.
		myUserRef.onDisconnect().remove();

		// Set our initial online status.
		setUserStatus("Online");
	} else {
		// We need to catch anytime we are marked as offline and then set the correct status. We
		// could be marked as offline 1) on page load or 2) when we lose our internet connection
		// temporarily.
		setUserStatus(currentStatus);
	}
});

// A helper function to let us set our own state.
function setUserStatus(status) {
	// Set our status in the list of online users.
	currentStatus = status;
	myUserRef.set({ name: name, status: status });
}

function getMessageId(snapshot) {
	return snapshot.name().replace(/[^a-z0-9\-\_]/gi,'');
}

// Update our GUI to show someone"s online status.
userListRef.on("child_added", function(snapshot) {
	var user = snapshot.val();

	$('<div/>')
	.attr('id', user.name)
        .text(user.name + " : " + user.status)
	.appendTo('#onlineList');


});

// Update our GUI to remove the status of a user who has left.
userListRef.on("child_removed", function(snapshot) {
	$("#onlineList").children("#" + getMessageId(snapshot))
	.remove();
});

// Update our GUI to change a user"s status.
userListRef.on("child_changed", function(snapshot) {
	var user = snapshot.val();
	$("#onlineList").children("#" + getMessageId(snapshot))
	.text(user.name + " is currently " + user.status);
});

// Use idle/away/back events created by idle.js to update our status information.
document.onIdle = function () {
	setUserStatus("Idle");
}
document.onAway = function () {
	setUserStatus("Away");
}
document.onBack = function (isIdle, isAway) {
	setUserStatus("Online");
}

setIdleTimeout(60000); //1 minute
setAwayTimeout(300000); //5 minutes
