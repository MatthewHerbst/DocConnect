<?php

//The method used to update the profile bio and picture is taken from the book Learning PHP, MySQL, JavaScript, and CSS: A Step-by-Step Guide to Creating Dynamic Websites By Robin Nixon


include_once 'head.php';
include_once 'login.php';


echo "<div class = 'main'><h3>Your Profile</h3>";

if(isset($_POST['text']))
{
    $text = sanitizeString($_POST['text']);
    $text = preg_replace('/\s\s+/', ' ', $text);


    $result = makeQuery("SELECT * FROM doctorProfiles WHERE username = '$user'");
    if(mysql_num_rows($result))
    {
        makeQuery("UPDATE doctorProfiles SET text='$text' WHERE username='$user'");
    }
    else
    {
        makeQuery("INSERT INTO doctorProfiles VALUES ('$user', '$text', '0')");
    }
}

$result = makeQuery("SELECT * FROM doctorProfiles WHERE user = '$user'");
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
        }
    }

    showProfile($user);
    echo <<<_END
    <form method='post' action='profile.php' enctype='multipart/form-data'>
    <h3>Enter or Edit Your Profile Details</h3>
    <span class='desrciption'>Your Bio</span><br />
    <textarea name='text' cols='50' rows='3'>$textOutput</textarea><br />
_END;
?>
    <span class = 'addphoto'>Add a photo </span><input type = 'file' name = 'image' size = '14' maxlength = '32'/>
    <input type = 'submit' value = 'Save Profile Changes'/>
    </form></div><br /></body><html>
                                                                                                               104,22-25     Bot


