<?php


$error = $enteredUsername = $enteredPass = "";

if (isset($_POST['enteredUsername']))
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
            header("Location: http://localhost/DocConnect/index.php");
            die("You are now logged in. Please <a href='members.php'?view=$enteredUsername>Click Here</a> To Continue");
        }
    }
}




if (!$logInStatus && !(($_GET['create']== 'yes')||($_GET['save']=='yes')))
{
    echo <<<_END
    <h2>Please Login to Access Page</h2><br />
    <form class = 'loginform' method = 'post' action = 'index.php'>$error
    <span class = 'fieldname'>Username</span>
    <input class = 'loginbox' type = 'text' maxlength = '16' name = 'enteredUsername' value = '$enteredUsername' /><br />
    <span class = 'fieldname'>Password</span>
    <input class = 'loginbox' type = 'password' maxlength = '16' name = 'enteredPass' value = '$enteredPass' /><br />
    <br />
    <span class = 'fieldname'></span>
    <input type = 'submit' value = 'Login' /><br />
    <a href = createAccount.php?create=yes>Or Sign Up Here!</a>
    </form><br /></div>
_END;
    die();
}


?>
