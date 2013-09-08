<?php

//The method used to update the profile bio and picture is taken from the book Learning PHP, MySQL, JavaScript, and CSS: A Step-by-Step Guide to Creating Dynamic Websites By Robin Nixon


include_once 'head.php';
include_once 'login.php';


echo "<div class = 'main'><h3>Your Profile</h3>";

$somethingChanged = false;

if(isset($_POST['text']))
{
    $text = sanitizeString($_POST['text']);
    $text = preg_replace('/\s\s+/', ' ', $text);


    $result = makeQuery("SELECT * FROM doctorProfiles WHERE username = '$user'");
    if(mysql_num_rows($result))
    {
        makeQuery("UPDATE doctorProfiles SET bio='$text' WHERE username='$user'");
    }
    else
    {
        makeQuery("INSERT INTO doctorProfiles VALUES ('$user', '$text', '0')");
    }
	$somethingChanged = true;
}

$result = makeQuery("SELECT * FROM doctorProfiles WHERE username= '$user'");
if(mysql_num_rows($result))
{
    $row = mysql_fetch_row($result);
    $textOutput = sanitizeString($row[1]);
}
else
{
    $textOutput = "";
}
 $textOutput = sanitizeString(preg_replace('/\s\s+/', ' ', $textOutput));

    if(isset($_FILES['image']['name']))
    {
        $saveAs = "profilePhotos/$user.jpg";
        move_uploaded_file($_FILES['image']['tmp_name'], $saveAs);
        $typeOkay = true;

        switch ($_FILES['image']['type'])
        {
            case "image/gif": $src =  imagecreatefromgd($saveAs);
                 break;
            case "image/jpeg":
            case "image/jpeg": $src = imagecreatefromjpeg($saveAs);
                 break;
            case "image/png": $src = imagecreatefrompng($saveAs);
                 break;
            default: $typeOkay = false;
                 break;
        }

        if ($typeOkay)
        {
            list($width, $height) = getimagesize($saveAs);

            $max = 300;
            $trueHeight = $height;
            $trueWidth = $width;

            if($width > $height && $max < $width)
            {
                $trueHeight = $max / $width * $height;
                $trueWidth = $max;
            }
			else if ($height > $width && $max < $height)
            {
                $trueWidth = $max / $height * $width;
                $trueHeight = $max;
            }
            else if($max < $width || $max < $height)
            {
                $trueWidth = $trueHeight = $max;
            }

            $tmpImage = imagecreatetruecolor($trueWidth, $trueHeight);
            imagecopyresampled($tmpImage, $src, 0, 0, 0, 0, $trueWidth, $trueHeight, $width, $height);
            imageconvolution($tmpImage, array(array(-1, -1, -1), array(-1, 16, -1),
                             array(-1, -1, -1)), 8, 0);
            imagejpeg($tmpImage, $saveAs);
            imagedestroy($tmpImage);
            imageDestroy($src);
			$somethingChanged = true;
        }
    }

	if ($somethingChanged)
	{
		echo "<span class='successfulUpdate'>You have Successfully Updated".
			"your Profile, To view it, click ".
			"<a href = 'viewProfile.php?userToDisplay=$user'>here</a>";
	}

    echo <<<_END

    <div class='sixty' align='center'><div style='width:30%;'>
    <form method='post' action='editProfile.php' enctype='multipart/form-data'>
    <h4>Enter or Edit Your Profile Details</h4>
    <span style='font-size:1.4em'>Your Bio</span><br />
    <textarea name='text' cols='50' rows='3'>$textOutput</textarea><br /><BR>
_END;
?>
    <span style='font-size:1.4em' class = 'addphoto'>Add a photo </span><input class='form-control' type = 'file' name = 'image' size = '14' maxlength = '32'/><BR>
    <input class='btn btn-success' type = 'submit' value = 'Save Profile Changes'/>
    </form></div></div></div></body><html>
                                                                                                               104,22-25     Bot


