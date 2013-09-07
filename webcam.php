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
<div class='container' align='center'>
<div class='doctor' id='maincam'>
  <div class='webcam'>
    <img src='pic1.jpg' width='100%'>
    <ul>
      <li>Name:</li>
      <li>Location:</li>
      <li>Specialist:</li>
      <li>Local Time:</li>
    </ul>
  </div>
  <!--div class='info' align='left'>
    <ul>
      <li>Name:</li>
      <li>Location:</li>
      <li>Specialist:</li>
      <li>Local Time:</li>
    </ul>
  </div-->
</div>

<div class='doctor'>
  <div class='smallcam' id='smallcam'>
    <img src='pic2.jpg' width='50%'>
  </div><!--webcam-->

  <div class='smallcam' id='smallcam2'>
    <img src='pic2.jpg' width='50%'>
  </div><!--webcam-->

  <div class='smallcam' id='smallcam3'>
    <img src='pic2.jpg' width='50%'>
  </div><!--webcam-->

  <div class='smallcam' id='smallcam4'>
    <img src='pic2.jpg' width='50%'>
  </div><!--webcam-->
</div><!--doctor-->

<div class='button'>
<button onclick='changeCams("maincam", "smallcam")'>Switch Screens</button>
</div>

<div class='chat' align='left'>
  <p> Person 1: <BR> Person 2:</p>
</div>

</div>
</body>
</html>
