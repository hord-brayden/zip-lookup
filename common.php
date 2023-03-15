<?php

/*----------------------------------------------------------------\
|
| The Zip Code Database Project
| Copyright (c) 2004 The ZipDB Project Team
|
| This program is free software; you can redistribute it and/or
| modify it under the terms of the GNU General Public License
| as published by the Free Software Foundation; either version 2
| of the License, or (at your option) any later version.
|
| This program is distributed in the hope that it will be useful,
| but WITHOUT ANY WARRANTY; without even the implied warranty of
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
| GNU General Public License for more details.
|
|------------------------------------------------------------------
|
| dist.php - Calculate the distance between two zip codes.
|
\-----------------------------------------------------------------*/

// CONFIGURATION - YOU MUST MUST MUST MUST FILL THIS OUT
// CONFIGURATION - YOU MUST MUST MUST MUST FILL THIS OUT
// CONFIGURATION - YOU MUST MUST MUST MUST FILL THIS OUT

$dbHost = 'localhost';		// DB Host
$dbUser = 'ice';		// DB Username
$dbPass = '';			// DB Password
$db     = 'ice';		// Selected database where tables with info reside

$zipTable = 'zip_codes';	// Table in the database

/*----------\
| Functions
\----------*/


function dbConnect(){
	global $dbHost,$dbUser,$dbPass,$db;

	$link = mysql_connect($dbHost, $dbUser, $dbPass);
  	mysql_select_db($db, $link);
}
?>