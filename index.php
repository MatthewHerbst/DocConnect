<?
include_once 'head.php';
echo "test";
?>
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
</body>
</html>
