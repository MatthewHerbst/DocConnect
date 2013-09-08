<?
include_once 'head.php';

$doctorsResult =  makeQuery("SELECT * FROM doctors");

$numDoctors = mysql_num_rows($doctorsResult);

echo "<h2>List Of All Doctors</h2><div class = 'list'><u1 class='doctorList'>";

for($i = 0; $i < $numDoctors; ++$i)
{
	$doctorRow = mysql_fetch_assoc($doctorsResult);
	$doctorUN = $doctorRow['username'];
	echo "<li>$doctorUN"."    ".
	"<a href = 'viewProfile?userToDisplay=$doctorUN'>View Their Profile".
	"</a></li>";
}

echo "<ul></div>";


include_once 'footer.php';


?>
