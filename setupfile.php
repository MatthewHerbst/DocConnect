<html>
<head>
<title>Setup</title>
<h2>Creating Tables and Setting up Database</h2>
</head>

<?php
include_once 'functionsneeded.php';


$membersTableFields = "username VARCHAR(28), password VARCHAR(128),".
					"D.O.B. VARCHAR(28), email VARCHAR(28), ".
					"doctorStatus BOOL, UNIQUE INDEX(username)";
createTable('members', $membersTableField);


$doctorsTableFields = "username VARCHAR(28), hospital VARCHAR(28),".
						"specialty VARCHAR(28)";
createTable('doctors', $doctorsTableFields);


$locationsTableFields = "username VARCHAR(28), country VARCHAR(28),".
						"state VARCHAR(28), city VARCHAR(28)";
createTable ('userLocations', $locationsTableFields);

?>