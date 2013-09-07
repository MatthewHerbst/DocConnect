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
							"<table><tr><td><span class = 'fieldname'>Education/Medical University</span></td>"+
							"<td><input type = 'text' maxlength = '30' name = 'education' /></td></tr>"+
							"<tr><td><span class = 'fieldname'>Hospital/Medical Institution</span></td>"+
							"<td><input type = 'text' maxlength = '30' name = 'hospital' /></td></tr>"+
							"<span class = 'fieldname'>Specialty</span><select name = 'specialty' id='specialty'>"+
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
<div class='form' align='center'>
<form method = 'post' action = 'saveAccount.php' 
onsubmit='return checkInput();'>

 <table>
      <tr>
      <td><span class = 'fieldname'>First Name</span></td>
      <td><input type = 'text' maxlength = '20' name = 'firstname' /></td>
      </tr>
      <tr>
      <td><span class = 'fieldname'>Last Name</span></td>
      <td><input type = 'text' maxlength = '20' name = 'lastname' /></td>
      </tr>
      <tr>
      <td><span class = 'fieldname'>Username</span></td>
      <td><input type = 'text' maxlength = '16' name = 'username' /></td>
      </tr>
      <tr>
      <td><span class = 'fieldname'>Password</span></td>
      <td><input type = 'password' maxlength '16' name = 'password' /></td>
      </tr>
      <tr>
      <td><span class = 'fieldname'>Password (retype)</span></td>
      <td><input type = 'password' maxlength '16' name = 'password2' /></td>
      </tr>
      <tr>
      <td><span class = 'fieldname'>Email Address</span></td>
      <td><input type = 'text' maxlength = '30' name = 'email' /></td>
      </tr>
      <tr>
      <td><span class = 'fieldname'>Date of Birth</span></td>
      <td><input type = 'date' id = 'DOB' name = 'DOB' /></td>
      </tr>
</td>
</tr>
</table>
      <tr>
      <td><span class = 'fieldname'>Are you a Doctor?</span></td>
      <td><input type = 'radio' class = 'radio' 
      id = 'yesbutton' name = 'doctorStatus' 
      value = 'yes' onchange = 'radioButtonClicked()' />Yes
      <input type = 'radio' class = 'radio' id = 'nobutton' 
      name = 'doctorStatus' value = 'no'
      onchange = 'radioButtonClicked()' />No<br />
      </td>
      </tr>

      <tr>
      <td><input type = 'submit' id = 'submitbutton' value = 'Sign Up' /></td>
      </tr>
  </form>

</div></div></body></html>

_END
?>

