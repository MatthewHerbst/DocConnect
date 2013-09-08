<?php
include_once 'head.php';
include_once 'login.php';

?>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
  <div class="container">
	<img src='img/logo.png'>
	<p><a class="btn btn-primary btn-lg">Learn more &raquo;</a></p>
  </div>
</div>







<div id='messagesDiv'></div>
<input type='text' id='nameInput' placeholder='Name'>
<input type='text' id='messageInput' placeholder='Message'>

<div id='myPublisherDiv'></div>

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
</script>
<?php include_once 'footer.php'; ?>