<?php
include_once 'head.php';
?>


<script>

var specialtiesNames = new Array("Cardiac Surgeon", "Pediatrician", "Endocrinologist");


var radioButtonsClicked = false;
var doctorInputBoxesAdded = false;

function radioButtonClicked()
{
	
	radioButtonsClicked = true;
	if(document.getElementById("nobutton").checked)
	{	
		if(doctorInputBoxesAdded = true)
		{
			$("#doctorinput").remove();
			return;
		}
		else
		{
			return;
		}
		return;
	}
	else
	{
		console.log("yes button checked");
		var stringToInsert = "<div id = 'doctorinput'>"+
							"<input  class = 'form-control' placeholder='Education/Medical University' type = 'text' maxlength = '30' name = 'education' />"+
							"<input  class = 'form-control' placeholder='Hospital/Medical Institution' type = 'text' maxlength = '30' name = 'hospital' /></td></tr>"+
							"<span>Specialty: </span><select name = 'specialty' id='specialty'>"+
       	       					   	"<option value = 'none' id = 'defaultspecialty'>Please Select your Specialty</option>";

		doctorInputBoxesAdded = true;
		$(stringToInsert).insertBefore("#submitbutton");
		var numOfSpecialties = specialtiesNames.length;	
		for (var i = 0; i < numOfSpecialties; ++i)
		{
			var stringOfi = i+"";
			var specialtyString = "<option value = '"+stringOfi+"'>"+specialtiesNames[i]+"</option>";
			$(specialtyString).insertAfter("#defaultspecialty");
		}
		$("</select></div>").insertBefore("#submitbutton");
	}
}
function checkInput()
{
	var dateFilled = false;
	if ($("#DOB").val() == "undefined")
	{
		dateFilled = false;
	}
	else
	{
		dateFilled = true;
	}
	console.log(radioButtonsClicked);
	console.log(dateFilled);
	if($("input").val() == "" || !radioButtonsClicked
		|| !dateFilled)
	{
		alert ("Please fill in all parts of form");
		return false;
	}
	
}

</script>

<?php

if($logInStatus)
{
	echo "<span class = 'alreadyIn'>You are Already Logged In";
	include_once 'index.php';
	die();
}

echo <<<_END
<div class='sixty' align='center'>
<div style='width:40%'>
<form method = 'post' action = 'saveAccount.php?save=yes' 
<div class='form' align='center'>
<form method = 'post' action = 'saveAccount.php' 
onsubmit='return checkInput();'>
      <input  class = 'form-control' placeholder='First Name' type = 'text' maxlength = '20' name = 'firstname' />
      <input  class = 'form-control' placeholder='Last Name' type = 'text' maxlength = '20' name = 'lastname' />
      <input  class = 'form-control' placeholder='Username' type = 'text' maxlength = '16' name = 'username' />
      <input  class = 'form-control' placeholder='Password' type = 'password' maxlength '16' name = 'password' />
      <input  class = 'form-control' placeholder='Password (retype)' type = 'password' maxlength '16' name = 'password2' />
      <input class = 'form-control' placeholder='Email' type = 'text' maxlength = '30' name = 'email' />
      <input class = 'form-control' placeholder='Date of Birth' type = 'date' id = 'DOB' name = 'DOB' />
      <span>Are you a Doctor?</span>
      <input type = 'radio' class = 'form-control' 
      id = 'yesbutton' name = 'doctorStatus' 
      value = 'yes' onchange = 'radioButtonClicked()' />Yes
      <input type = 'radio' class = 'form-control' id = 'nobutton' 
      name = 'doctorStatus' value = 'no'
      onchange = 'radioButtonClicked()' />No<br />

      <input  class = 'btn btn-success' type = 'submit' id = 'submitbutton' value = 'Sign Up' />
  </form>

</div></div></div></body></html>

_END
?>

