<!DOCTYPE html>
<html>
<head>
<title>Setup</title>
<h2>Creating Tables and Setting up Database</h2>
</head>
</html>

<?php
include_once 'functionsneeded.php';


$membersTableFields = "username VARCHAR(28), password VARCHAR(128),".
					"firstname VARCHAR(28), lastname VARCHAR(28), ".
					"DOB VARCHAR(28), email VARCHAR(28), ".
					"doctorStatus BOOL, UNIQUE INDEX(username)";
createTable('members', $membersTableFields);


$doctorsTableFields = "username VARCHAR(28), hospital VARCHAR(28),".
						"specialty VARCHAR(28), education VARCHAR(30), ".
						"UNIQUE INDEX(username)";
createTable('doctors', $doctorsTableFields);


$locationsTableFields = "username VARCHAR(28), country VARCHAR(28),".
						"state VARCHAR(28), city VARCHAR(28)";
createTable ('userLocations', $locationsTableFields);

$doctorProfilesTableFields = "username VARCHAR(28), bio VARCHAR(3000),".
							"rating INT, numOfHelps INT, UNIQUE INDEX(username)";
createTable ('doctorProfiles', $doctorProfilesTableFields);

$reviewTableFields = "username VARCHAR(28), rating INT, review VARCHAR(3000)";

createTable ('reviews', $reviewTableFields);

$favoritesTableFields = "username VARCHAR(28), favoritedUser VARCHAR(28)"
createTable ('favorites', $favoritesTableFields);

echo "Table setup complete!!";
?>