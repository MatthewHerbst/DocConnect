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
							"<span class = 'fieldname'>Education/Medical University</span>"+
							"<input type = 'text' maxlength = '30' name = 'education' /><br />"+
							"<span class = 'fieldname'>Hospital/Medical Institution</span>"+
							"<input type = 'text' maxlength = '30' name = 'hospital' /><br />"+
							"<span class = 'fieldname'>Specialty</span><select name = 'specialty' id='specialty'>"+
							"<option value = 'none' id = 'defaultspecialty'>Please Select your specialty</option>";	
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
		alert ("Please Fill in All parts of form");
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
<form method = 'post' action = 'saveAccount.php?save=yes' 
onsubmit='return checkInput();'>
<span class = 'fieldname'>First Name</span>
<input type = 'text' maxlength = '20' name = 'firstname' /><br />
<span class = 'fieldname'>Last Name</span>
<input type = 'text' maxlength = '20' name = 'lastname' /><br />
<span class = 'fieldname'>Username</span>
<input type = 'text' maxlength = '16' name = 'username' /><br />
<span class = 'fieldname'>Password</span>
<input type = 'password' maxlength '16' name = 'password' /><br />
<span class = 'fieldname'>Email Address</span>
<input type = 'text' maxlength = '30' name = 'email' /><br />
<span class = 'fieldname'>Date of Birth</span>
<input type = 'date' id = 'DOB' name = 'DOB' /><br />
<span class = 'fieldname'>Are you a Doctor?</span><br />
<input type = 'radio' class = 'radio' 
id = 'yesbutton' name = 'doctorStatus' 
value = 'yes' onchange = 'radioButtonClicked()' />Yes<br />
<input type = 'radio' class = 'radio' id = 'nobutton' 
name = 'doctorStatus' value = 'no'
onchange = 'radioButtonClicked()' />No<br />
<input type = 'submit' id = 'submitbutton' value = 'Sign Up' />
</form></div></body></html>

_END
?>

