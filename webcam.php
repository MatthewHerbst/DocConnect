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

<script type='text/javascript' src='js/onlineList.js'></script>

<div class='container'>
	<div class='cam'>
		<div id='currentDoctors' class='doctor'>
			<div class='maincam' id='maincam'>
				<img src='img/pic1.jpg' width='100%'>
			</div>
		</div>
		<div id='doctors'>
			<script type='text/javascript'>
				//TODO: pull the list of doctors in this session, except for the currently selected doctor
					$('<div/>')
					.attr('id', user.name)
					.text(user.name + ' is currently ' + user.status)
					.appendTo('#doctors');
				
				<div class='smallcam' id='maincam'>
					<img src='img/pic2.jpg' width='100%'>
				</div>
			</script>
		</div>
	</div>
	<div id='onlineList'></div>
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