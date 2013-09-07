<!DOCTYPE HTML>
<?php/*php include 'head.php' */?>
<head>
<link rel="stylesheet" type="text/css" href="styles.css" media="screen" />

<script>
  function changeCams(cam1, cam2){
   
/*   var c1 = document.getElementById(cam1); //Gets the entire div
    var c2 = document.getElementById(cam2); //Gets the entire div
   console.log(c1);
   console.log(c2);
   console.log(cam1);
   console.log(cam2);
 */
   var c3;
   c3 = document.getElementById(cam1).innerHTML;
   document.getElementById(cam1).innerHTML = document.getElementById(cam2).innerHTML;
   document.getElementById(cam2).innerHTML = c3;
  }  
</script>

</head>

<body>
  <div class='container'>
    <div class='cam'>
      <div class='doctor'>
	<div class='maincam' id='maincam'>
	  <img src='pic1.jpg' width='100%'>
	</div>
      </div>
      
      <div class='doctor'>
	<div class='smallcam' id='smallcam' onclick='changeCams("maincam", "smallcam")'>
	  <img src='pic2.jpg' width='100%'> <!--100% of the div, which is 45% of box-->
	</div>
	
	<div class='smallcam' id='smallcam2' onclick='changeCams("maincam", "smallcam2")'>
	  <img src='pic2.jpg' width='100%'>
	</div>
	
	<div class='smallcam' id='smallcam3' onclick='changeCams("maincam", "smallcam3")'>
	  <img src='pic2.jpg' width='100%'>
	</div>
	
	<div class='smallcam' id='smallcam4' onclick='changeCams("maincam", "smallcam4")'>
	  <img src='pic2.jpg' width='100%'>
	</div>
      </div><!--doctor-->
    </div>
      
    <div class='info' align='left'>
      <ul>
	<li>Name:</li>
	<li>Location:</li>
	<li>Specialist:</li>
	<li>Local Time:</li>
      </ul>
      
      <div class='button'>
	<button onclick='changeCams("maincam", "smallcam")'>Switch Screens</button>
      </div>
      
      <div class='chat' align='left'>
	<p> Person 1: <BR> Person 2:</p>
      </div>
      
      </div>
  </div>
</body>
</html>
