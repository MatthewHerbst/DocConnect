<html lang='en'>
	<head>
		<meta name='author' content=''>
		<meta charset='utf-8'>
		<title></title>
		<script type='text/javascript' src='https://cdn.firebase.com/v0/firebase.js'></script>
		<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
	</head>
<body>
	<div id='messagesDiv'></div>
	<input type='text' id='nameInput' placeholder='Name'>
    <input type='text' id='messageInput' placeholder='Message'>
	<script>
		var myDataRef = new Firebase('https://x07k26bd3du.firebaseio-demo.com/');
		$('#messageInput').keypress(function(e) {
				var name = $('#nameInput').val();
				var text = $('#messageInput').val();
				myDataRef.push({name: name, text: text});
				$('#messageInput').val('');
			}
		});
		
		myDayaRef.on('child_added', function(snapshot) {
			var message = snapshot.val();
			displayChatMessage(message.name, message.text);
		});
		
		function displayChatMessage(name, text) {
			$('<div/>').text(text).prepend($('<em/>').text(name + ': ')).appendTo($('#messagesDiv'));
			$('#messagesDiv')[0].scrollTop = $('#messagesDiv')[0].scrollHeight;
      };
	</script>
</body>
</html>