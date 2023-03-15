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
| dist.php - Calculate the distance between two zip codes. PHP4
|
\-----------------------------------------------------------------*/

include 'common.php';

// $content will be echoed for errors and the distance when applicable
global $content;

// Check for zip code one to exist, for length, and validity

if(isset($_GET['one'])){
 	 $one = $_GET['one'];
 	 if(!is_numeric($one)) $content .= 'Zip code one is invalid.<br/>';
 	 elseif(strlen($one) < 5) $content .= 'Zip code one is not long enough.<br/>';
 	 $zipCount = 1;
}
else $one = '';

// Same thing for zip code two

if(isset($_GET['two'])){
	 $two = $_GET['two'];
	 if(!is_numeric($two)) $content .= 'Zip code two is invalid.<br/>';
	 elseif(strlen($two) < 5) $content .= 'Zip code two is not long enough.<br/>';
	 elseif(isset($zipCount)) $zipCount++;
}
else $two = '';

// If form is submitted, let's check the DB!

if(isset($_GET['Submit']) && ($zipCount == 2) && ($one != $two)){

	dbConnect();

	$result1 = mysql_query("SELECT latitude,longitude
				FROM $zipTable
				WHERE zip = '$one'
				LIMIT 1");

	$result2 = mysql_query("SELECT latitude,longitude
				FROM $zipTable
				WHERE zip = '$two'
				LIMIT 1");

	if(mysql_num_rows($result1) == 0) $content .= 'Zip code one not found in the database.<br/>';
	else {
		$row = mysql_fetch_row($result1);
		$lat_A = $row[0];
		$long_A = $row[1];
	}

	if(mysql_num_rows($result2) == 0) $content .= 'Zip code two not found in the database.<br/>';
	else {
		$row = mysql_fetch_row($result2);
		$lat_B = $row[0];
		$long_B = $row[1];
	}


}

// If both zips were found in the database, calculate the distance!

if(isset($lat_A) && isset($lat_B)){
	$content .= '<p>' . calcDist($lat_A, $long_A, $lat_B, $long_B) . ' miles.</p>';
}

// Echo what we've learned

echo $content;
?>

<p>
<form method="get" action="distance.php">
	<input type="text" name="one" size="7" maxlength="5" value="<?=$one?>"><br/>
	<input type="text" name="two" size="7" maxlength="5" value="<?=$two?>"><br/>
	<input type="submit" name="Submit" value="Get Distance">
</form>
</p>

<? 
// Function to calculate the distance of the zip codes
// using the latitude and longitude of each

function calcDist($lat_A, $long_A, $lat_B, $long_B) {

  $distance = sin(deg2rad($lat_A))
  			  * sin(deg2rad($lat_B))
  			  + cos(deg2rad($lat_A))
  			  * cos(deg2rad($lat_B))
  			  * cos(deg2rad($long_A - $long_B));

  $distance = (rad2deg(acos($distance))) * 69.09;

  return $distance;
}
?>
