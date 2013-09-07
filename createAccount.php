<?
include_once 'head.php';

if($logInStatus)
{
	echo "<span class = 'alreadyIn'>You are Already Logged In";
	include_once 'index.php';
	die();
}

echo <<<_END
<form method = 'post' action = 'saveAccount.php'>
<span class = 'fieldname'>First Name</span>
<input type = 'text' maxlength = '20' name = 'firstname' /><br />
<span class = 'fieldname'>Last Name</span>
<input type = 'text' maxlength = '20' name = 'lastname' /><br />
<span class = 'fieldname'>Username</span>
<input type = 'text' maxlength = '16' name = 'user' /><br />
<span class = 'fieldname'>Password</span>
<input type = 'password' maxlength '16' name = 'pass' /><br />
<span class = 'fieldname'>Date of Birth</span>
<input type = 'date' name = 'DOB' /><br />
<span class = 'fieldname'>Are you a Doctor?</span><br />
<input type = 'radio' name = 'doctorStatus' value = 'yes' />Yes<br />
<input type = 'radio' name = 'doctorStatus' value = 'no' />No<br />
<input type = 'submit' value = 'Sign Up' />
</form></div></body></html>

_END
?>

