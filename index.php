<?php
include_once 'head.php';
include_once 'login.php';

?>

<div class="container">
      <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">
			<img src='img/logo.png'>
          <div class="row">
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Heading1</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Heading2</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <h2>Heading3</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="well sidebar-nav">
			<?php
				if($logInStatus) {
					echo
					"<p><b>Who's online...</b></p>
					<div id='onlineList'></div>";
				} else {
					echo "<p><b>Login to see who's online</b></p>";
				}
			?>
			<hr>
			<p><b>Chat with others!!!</b></p>
			<div id='messagesDiv'></div>
			<hr>
			<input type='text' id='nameInput' placeholder='Name'>
			<input type='text' id='messageInput' placeholder='Message'>
          </div><!--/.well -->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

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