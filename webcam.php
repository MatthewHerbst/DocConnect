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

   javascript: console.log('meh');
  }  


  function parttwo(text1){
   var a = text1;
  console.log("in part 2" + a);
  }
</script>

</head>

<body>
<div class='container' align='center'>
<div class='doctor'>
  <div class='webcam' id='maincam'>
    <h1>Me (Doctor)</h1>
    <img src='pic1.jpg' height='300px' width='400px'>
  </div>
  <div class='info' align='left';>
    <ul>
      <li>Name:</li>
      <li>Location:</li>
      <li>Specialist:</li>
      <li>Local Time:</li>
    </ul>
    </p>	     
  </div>
</div>

<div class='doctor'>

  <div class='webcam' id='smallcam'>
    <h1>Doctor Bob</h1>
    <img src='pic2.jpg' height='300px' width='400px'>
  </div><!--webscreen-->
  <div class='info' align='left';>
    <ul>
      <li>Name:</li>
      <li>Location:</li>
      <li>Specialist:</li>
      <li>Local Time:</li>
    </ul>
    </p>	     
  </div>
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
