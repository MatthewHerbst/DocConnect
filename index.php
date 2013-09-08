<?php
include_once 'head.php';
include_once 'login.php';

?>

<div class="container">
      <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">
			<img src='img/logo.png'>
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
<?php include_once 'footer.php'; ?>