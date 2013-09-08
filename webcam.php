<?php include_once 'head.php'; ?>
<div class="container">
      <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">
			<div id='myVideo' class='myVideo'></div>
          <div class="row">
            <div class="col-6 col-sm-6 col-lg-4">
              <a href='viewProfile?userToDisplay=herbstmb'><p>M. Herbst - Pediatrician</p><a/>
			  <div id='doc1' class='doc1'></div>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <a href='#'><p>M. Smith - Obstetrition</p></a>
			  <div id='doc2' class='doc2'></div>
            </div><!--/span-->
            <div class="col-6 col-sm-6 col-lg-4">
              <a href='viewProfile?userToDisplay=adityans'><p>A. Shankar - Cardiologist</p><a/>
			  <div id='doc3' class='doc3'></div>
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
 
	var publisher = TB.initPublisher(apiKey, 'myVideo', {width:800, height:500});
	var session   = TB.initSession(sessionId, 'doc1', {width:75, height:75});
 
	session.connect(apiKey, token);
	session.addEventListener("sessionConnected", sessionConnectedHandler);
 
	session.addEventListener("streamCreated", streamCreatedHandler);
</script>
<?php include_once 'footer.php'; ?>