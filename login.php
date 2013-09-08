<?php

$error = $enteredUsername = $enteredPass = "";

if (isset($_POST['enteredUsername']) && !$logInStatus)
{
    $enteredUsername = sanitizeString($_POST['enteredUsername']);
    $enteredPass = sanitizeString($_POST['enteredPass']);

    if($enteredUsername == "" || $enteredPass == "")
    {
        $error = "<span style='color:red'>Invalid Username or Password</span><br />";
    }
    else
    {
        $encryptedPass = sha1($enteredPass);
        $query = "SELECT username, password FROM members WHERE username='$enteredUsername' AND password='$encryptedPass'";
        $result = makeQuery($query);
        if(mysql_num_rows($result) == 0)
        {
            $error = "<span style = 'color:red'>Invalid Username or Password</span><br />";
        }
        else
        {
            $_SESSION['user'] = $enteredUsername;
            $_SESSION['pass'] = $enteredPass;
			$logInStatus = TRUE;
            header("Location: http://localhost/DocConnect/index.php");
            die("You are now logged in. Please <a href='members.php'?view=$enteredUsername>Click Here</a> To Continue");
        }
    }
}




if (!$logInStatus)
{
    echo <<<_END
    <div class='sixty' align='center'><h2>Please Login to Access Page</h2>
    <div style='width:50%;'>
    <form class = 'loginform' method = 'post' action = 'index.php'>$error
    <input class='form-control' placeholder='Username' type = 'text' maxlength = '16' name = 'enteredUsername' value = '$enteredUsername' /><br />
    <input class = 'form-control' placeholder='Password' type = 'password' maxlength = '16' name = 'enteredPass' value = '$enteredPass' /><br />
    <br />
    <span class = 'fieldname'></span>
    <input type = 'submit' class='btn btn-success' value = 'Login' />
    <button class='btn btn-success'><a style='color:#FFFFFF; text-decoration:none;' href = 'createAccount.php'>Or Sign Up Here!</a></button>
    </form></div></div></div>
_END;
    die();
}


?>
