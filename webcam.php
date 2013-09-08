<!DOCTYPE HTML>
<?php include_once 'head.php' ?>
<script type='text/javascript'>
	function changeCams(cam1, cam2){
		var c3;
		c3 = document.getElementById(cam1).innerHTML;
		document.getElementById(cam1).innerHTML = document.getElementById(cam2).innerHTML;
		document.getElementById(cam2).innerHTML = c3;
	}  
</script>

<div id='presenceDiv'></div>

<script type='text/javascript'>
	//Code source: https://www.firebase.com/tutorial/#session/bkb5rgke1v5
	
	// Prompt the user for a name to use.
	var name = prompt("Your name?", "Guest!"),
		currentStatus = "★ online";

	// Get a reference to the presence data in Firebase.
	var userListRef = new Firebase("https://bkb5rgke1v5.firebaseio-demo.com/");

	// Generate a reference to a new location for my user with push.
	var myUserRef = userListRef.push();

	// Get a reference to my own presence status.
	var connectedRef = new Firebase("http://presence.firebaseio-demo.com/.info/connected");
	connectedRef.on("value", function(isOnline) {
		if (isOnline.val()) {
			// If we lose our internet connection, we want ourselves removed from the list.
			myUserRef.onDisconnect().remove();

			// Set our initial online status.
			setUserStatus("★ online");
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
    
		$("<div/>")
		.attr("id", getMessageId(snapshot))
		.text(user.name + " is currently " + user.status)
		.appendTo("#presenceDiv");
	});

	// Update our GUI to remove the status of a user who has left.
	userListRef.on("child_removed", function(snapshot) {
		$("#presenceDiv").children("#" + getMessageId(snapshot))
		.remove();
	});

	// Update our GUI to change a user"s status.
	userListRef.on("child_changed", function(snapshot) {
		var user = snapshot.val();
		$("#presenceDiv").children("#" + user)
		.text(user.name + " is currently " + user.status);
	});

	// Use idle/away/back events created by idle.js to update our status information.
	document.onIdle = function () {
		setUserStatus("☆ idle");
	}
	document.onAway = function () {
		setUserStatus("☄ away");
	}
	document.onBack = function (isIdle, isAway) {
		setUserStatus("★ online");
	}

	setIdleTimeout(60000); //1 minute
	setAwayTimeout(300000); //5 minutes
</script>

<div class='container'>
	<div class='container' align='center'>
		<div class='cam'>
			<div class='doctor'>
				<div class='maincam' id='maincam'>
					<img src='pic1.jpg' width='100%'>
				</div>
			</div><!--doctor-->
			<div class='doctor'>
				<div class='smallcam' id='smallcam' onclick='changeCams("maincam", "smallcam")'>
					<img src='pic2.jpg' width='100%'> <!--100% of the div, which is 45% of box-->
				</div>
				<div class='smallcam' id='smallcam2' onclick='changeCams("maincam", "smallcam2")'>
					<img src='pic1.jpg' width='100%'>
				</div>
				<div class='smallcam' id='smallcam3' onclick='changeCams("maincam", "smallcam3")'>
					<img src='pic2.jpg' width='100%'>
				</div>
				<div class='smallcam' id='smallcam4' onclick='changeCams("maincam", "smallcam4")'>
					<img src='pic2.jpg' width='100%'>
				</div>
				<div class='smallcam' id='smallcam5' onclick='changeCams("maincam", "smallcam4")'>
					<img src='pic2.jpg' width='100%'>
				</div>
			</div><!--doctor-->
		</div>
      
		<div class='info' align='left'>
			<h1>Information</h1>
			<ul>
				<li>Name:</li>
				<li>Location:</li>
				<li>Specialist:</li>
				<li>Local Time:</li>
			</ul>
				
			<div class='chat' align='left'>
				<h1>Chat</h1>
				<p> Person 1: <br /> Person 2:</p>
			</div>
		</div>
	</div>
<?php include_once 'footer.php'; ?>