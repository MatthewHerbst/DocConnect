<?php
include_once 'head.php';
$error = $enteredUsername = $enteredPass = "";

if (isset($_POST['enteredUsername']) && !$logInStatus)
{
    $enteredUsername = sanitizeString($_POST['enteredUsername']);
    $enteredPass = sanitizeString($_POST['enteredPass']);

    if($enteredUsername == "" || $enteredPass == "")
    {
        $error = "<span>Invalid Username or Password</span><br />";
    }
    else
    {
        $encryptedPass = sha1($enteredPass);
        $query = "SELECT username, password FROM members WHERE username='$enteredUsername' AND password='$encryptedPass'";
        $result = makeQuery($query);
        if(mysql_num_rows($result) == 0)
        {
            $error = "<span>Invalid Username or Password</span><br />";
        }
        else
        {
            $_SESSION['user'] = $enteredUsername;
            $_SESSION['pass'] = $enteredPass;
			$logInStatus = TRUE;
			header("Location: http://ec2-54-200-14-50.us-west-2.compute.amazonaws.com/DocConnect/index.php");
            die("You are now logged in. Please <a href='members.php'?view=$enteredUsername>Click Here</a> To Continue");
        }
    }
}




/*if (!$logInStatus)
{
    echo <<<_END
    <div class='sixty'><h2>Please Login to Access Page</h2>
    <div>
    <form class='loginform' method='post' action='index.php'>$error
    <input class='form-control' placeholder='Username' type='text' maxlength='16' name='enteredUsername' value='$enteredUsername' /><br />
    <input class='form-control' placeholder='Password' type='password' maxlength='16' name='enteredPass' value='$enteredPass' /><br />
    <br />
    <span class='fieldname'></span>
    <input type='submit' class='btn btn-success' value='Login' />
    <button class='btn btn-success'><a href='createAccount.php'>Or Sign Up Here!</a></button>
    </form></div></div></div>
_END;
    die();
}*/


?>
