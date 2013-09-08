<?php include_once 'head.php'; ?>
<script type='text/javascript'>
	function changeCams(cam1, cam2){
		var c3;
		c3 = document.getElementById(cam1).innerHTML;
		document.getElementById(cam1).innerHTML = document.getElementById(cam2).innerHTML;
		document.getElementById(cam2).innerHTML = c3;
	};
	
	/*** OPENTOK ***/
	var apiKey    = '40519362';
	var sessionId = '2_MX40MDUxOTM2Mn4xMjcuMC4wLjF-RnJpIFNlcCAwNiAyMzo1NjoyMyBQRFQgMjAxM34wLjY0NjE0MDM0fg';
	var token     = 'T1==cGFydG5lcl9pZD00MDUxOTM2MiZzZGtfdmVyc2lvbj10YnJ1YnktdGJyYi12MC45MS4yMDExLTAyLTE3JnNpZz0wYmQxYmIxNThjZWI5YmExNTU4YmM1OTZiYzQ0ZWU1YzY1OTQzNGM4OnJvbGU9cHVibGlzaGVyJnNlc3Npb25faWQ9Ml9NWDQwTURVeE9UTTJNbjR4TWpjdU1DNHdMakYtUm5KcElGTmxjQ0F3TmlBeU16bzFOam95TXlCUVJGUWdNakF4TTM0d0xqWTBOakUwTURNMGZnJmNyZWF0ZV90aW1lPTEzNzg1MzY5ODYmbm9uY2U9MC42Mjk2MDYxNTgyMzMyODg4JmV4cGlyZV90aW1lPTEzNzkxNDE3OTMmY29ubmVjdGlvbl9kYXRhPQ==';
 
	function sessionConnectedHandler (event) {
		session.publish( publisher );
		subscribeToStreams(event.streams);
	}
  
	function subscribeToStreams(streams) {
		for (var i = 0; i < streams.length; i++) {
			var stream = streams[i];
			if (stream.connection.connectionId 
				!= session.connection.connectionId) {
				session.subscribe(stream);
			}
		}
	}
	
	function streamCreatedHandler(event) {
		subscribeToStreams(event.streams);
	}
 
	var publisher = TB.initPublisher(apiKey);
	var session   = TB.initSession(sessionId);
 
	session.connect(apiKey, token);
	session.addEventListener("sessionConnected", sessionConnectedHandler);
 
	session.addEventListener("streamCreated", streamCreatedHandler);
</script>

<div class='container'>
	<div class='cam'>
		<div id='currentDoctor' class='doctor'>
			<img src='img/pic1.jpg' width='100%'>
		</div>
		<div id='doctors'>
			<script type='text/javascript'>
				//Print out a small box for every doctor in the session, except the person in the large box
				var myDataRef = new Firebase('https://matthewherbst.firebaseIO.com/');
				
				//Determine if user is in a seesion
					//if they are, load it up
					//if they are not, start a new session and load it up
			</script>
			<div class='smallcam' id='maincam'>
				<img src='img/pic2.jpg' width='100%'>
			</div>
		</div>
	</div>
	<div class='doctorInfo' align='left'>
		<h1>About Dr. Kofman</h1>
		<ul>
			<li>Name:</li>
			<li>Location:</li>
			<li>Specialist:</li>
			<li>Local Time:</li>
		</ul>
	</div>
	<div id='chat' align='left'>
		<h1>Chat</h1>
		<p> Person 1: <br /> Person 2:</p>
	</div>
</div>
<?php include_once 'footer.php'; ?>