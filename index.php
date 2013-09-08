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
              <h2>Heading2<h2>
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
			<div id='onlineList'></div>
			<hr>
			<div id='messagesDiv'></div>
			<p><b>Caht with others online!!!</b></p>
			<hr>
			<input type='text' id='messageInput' placeholder='Message'>
          </div><!--/.well -->
        </div><!--/span-->
      </div><!--/row-->

      <hr>
	  
<input type='text' id='nameInput' placeholder='Name'>

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