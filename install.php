<?
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
| install.php - Creates table in MySQL database and inserts
| all Zip Code data from text file ('zips2000.txt')
|
\-----------------------------------------------------------------*/



include('common.php');
$text = file_get_contents('./zips2000.txt');
$array = explode("\n", $text);
$tableQuery = "CREATE TABLE `$zipTable` (
`zip` CHAR( 5 ) NOT NULL ,
`state` CHAR( 2 ) NOT NULL ,
`latitude` CHAR( 10 ) NOT NULL ,
`longitude` CHAR( 10 ) NOT NULL ,
UNIQUE (
`zip`
)
)";

dbConnect();
if(!mysql_query($tableQuery)) die(mysql_error() . '<br/><br/><b>DID YOU FORGET TO FILL OUT THE CONFIG FILE? If so, read the readme.');


foreach($array as $var){
		
	$zip = substr($var, 2, 5);
	$state = substr($var, 0, 2);
	$lat = substr($var, 136, 10);
	$long = substr($var, 146, 10);
	
	mysql_query("INSERT INTO $zipTable 
				    VALUES ('$zip', 
				    '$state',
				    '$lat',
				    '$long')");
				
}

echo 'Operation complete successfully. Please delete \'install.php\'.';

?>