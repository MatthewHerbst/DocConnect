<html lang='en'>
	<head>
		<meta name='author' content=''>
		<meta charset='utf-8'>
		<title></title>
		<script type='text/javascript' src='https://cdn.firebase.com/v0/firebase.js'></script>
		<script src='https://swww.tokbox.com/webrtc/v2.0/js/TB.min.js'></script>
		<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
	</head>
<body>
	<div id='messagesDiv'></div>
	<input type='text' id='nameInput' placeholder='Name'>
    <input type='text' id='messageInput' placeholder='Message'>
	
	<div id="myPublisherDiv"></div>
	
	
	<script type='text/javascript'>
		var myDataRef = new Firebase('https://matthewherbst.firebaseIO.com/');
		$('#messageInput').keypress(function(e) {
			if(e.keyCode == 13) {
				var name = $('#nameInput').val();
				var text = $('#messageInput').val();
				myDataRef.push({name: name, text: text});
				$('#messageInput').val('');
			}
		});
		
		myDataRef.on('child_added', function(snapshot) {
			var message = snapshot.val();
			displayChatMessage(message.name, message.text);
		});
      
		function displayChatMessage(name, text) {
			$('<div/>').text(text).prepend($('<em/>').text(name+': ')).appendTo($('#messagesDiv'));
			$('#messagesDiv')[0].scrollTop = $('#messagesDiv')[0].scrollHeight;
		};

		// Initialize API key, session, and token...
        // Think of a session as a room, and a token as the key to get in to the room
        // Sessions and tokens are generated on your server and passed down to the client
        var apiKey = "40519362";
		var sessionId = "1_MX40MDUxOTM2Mn4xMjcuMC4wLjF-RnJpIFNlcCAwNiAyMDo0ODozNyBQRFQgMjAxM34wLjY5MTYyNjk3fg";
		var token = "T1==cGFydG5lcl9pZD00MDUxOTM2MiZzZGtfdmVyc2lvbj10YnJ1YnktdGJyYi12MC45MS4yMDExLTAyLTE3JnNpZz0zNjY0YmQ5NmQwMTRlMzFjZjFlZTZkMmE3NTlhY2E5NjIzOGE5YmFjOnJvbGU9cHVibGlzaGVyJnNlc3Npb25faWQ9MV9NWDQwTURVeE9UTTJNbjR4TWpjdU1DNHdMakYtUm5KcElGTmxjQ0F3TmlBeU1EbzBPRG96TnlCUVJGUWdNakF4TTM0d0xqWTVNVFl5TmprM2ZnJmNyZWF0ZV90aW1lPTEzNzg1MjU3MTcmbm9uY2U9MC43OTEyNDI0NDAxMTYwMjUzJmV4cGlyZV90aW1lPTEzNzg2MTIxMjQmY29ubmVjdGlvbl9kYXRhPQ==";
		
		// Initialize session, set up event listeners, and connect
		var session = TB.initSession(sessionId);
		session.addEventListener('sessionConnected', sessionConnectedHandler);
		session.connect(apiKey, token);
		
        function sessionConnectedHandler(event) {
			var publisher = TB.initPublisher(apiKey, 'myPublisherDiv');
            session.publish(publisher);
        };
	</script>
</body>
</html>