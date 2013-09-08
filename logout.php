<?php

include_once 'head.php';

if(isset($_SESSION['user']))
{
    destroySession();
    header("Location: index.php");

    echo "<p class = 'loggedOutMessage'>You have succesfully Logged Out</p>";
}

else
{
    echo "Cannot Log Out, because you are not logged in.";
}

echo "<br /></body></html>";


?>
