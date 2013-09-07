<!DOCTYPE HTML>
<?/*php include 'head.php' */?>
<head>
<link rel="stylesheet" type="text/css" href="styles.css" media="screen" />

<script>
  function changeCams(cam1, cam2){
 //   var c1 = document.getElementById(cam1);
//    var c2 = document.getElementById(cam2);
  //  var temp = document.getElementById(cam2);
      console.log(document.getElementById(cam1)+"hh");
//    c1.innerHTML = c2;
 //   c2.innerHTML = document.getElementById(cam1);

//  document.getElementById(cam1).innerHTML= document.getElementById(cam2);
  //    console.log(document.getElementById(cam1));

   //   console.log(c1 + c2);  
  
/*    for (i in elems){

      if ((" "+elems[i].className+" ").indexOf(" "+cam1+" ") > -100){
        elems[i].innerHTML = cam2;
        console.log(cam2);}
      }

      for (i in elems){
      if ((" "+elems[i].className+" ").indexOf(" "+cam2+" ") > -100){
        elems[i].innerHTML = cam1;
        javascript: console.log(cam1);}

      }
 */
    javascript: console.log('meh');
  }  
</script>

</head>

<body>
<div class='container' align='center'>
<div class='doctor'>
  <div class='webcam' id='maincam'>
    <h1>Me (Doctor)</h1>
    <img src='pic.jpg' height='300px' width='400px'>
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
    <img src='pic2.jpg' height='150px' width='200px'>
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
