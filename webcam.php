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

<div id='onlineList'></div>

<script type='text/javascript' src='js/onlineList.js'></script>

<div class='container'>
	<div class='container' align='center'>
		<div class='cam'>
			<div class='doctor'>
				<div class='maincam' id='maincam'>
					<img src='img/pic1.jpg' width='100%'>
				</div>
			</div><!--doctor-->
			<div class='doctor'>
				<div class='smallcam' id='smallcam' onclick='changeCams("maincam", "smallcam")'>
					<img src='img/pic2.jpg' width='100%'> <!--100% of the div, which is 45% of box-->
				</div>
				<div class='smallcam' id='smallcam2' onclick='changeCams("maincam", "smallcam2")'>
					<img src='img/pic1.jpg' width='100%'>
				</div>
				<div class='smallcam' id='smallcam3' onclick='changeCams("maincam", "smallcam3")'>
					<img src='img/pic2.jpg' width='100%'>
				</div>
				<div class='smallcam' id='smallcam4' onclick='changeCams("maincam", "smallcam4")'>
					<img src='img/pic2.jpg' width='100%'>
				</div>
				<div class='smallcam' id='smallcam5' onclick='changeCams("maincam", "smallcam4")'>
					<img src='img/pic2.jpg' width='100%'>
				</div>
			</div><!--doctor-->
		</div>
      
		<div class='info' align='left'>
			<h1>Information</h1>
			<ul>
				<li>Name:</li>
				<li>Location:</li>
				<li>Specialist:</li>
				<li>Local Time:</li>
			</ul>
				
			<div class='chat' align='left'>
				<h1>Chat</h1>
				<p> Person 1: <br /> Person 2:</p>
			</div>
		</div>
	</div>
<?php include_once 'footer.php'; ?>