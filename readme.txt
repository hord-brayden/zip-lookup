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
\-----------------------------------------------------------------/

Package zips-php-mysql.tar.gz

DESCRIPTION
===========

This archive includes all files necessary to calculate the distance
between two U.S. Zip Codes using PHP4+ and MySQL.

REQUIREMENTS
============

A webserver running PHP4+ and MySQL (4+ recommended). 

PACKAGE CONTENTS
================

distance.php - 	A simple calculation script. Enter two zip codes and
		see the results!
		
common.php -    The configuration file.
		
readme - 	Take a guess what this file is for.
		
INSTALLATION
============

- Extract the files into a working web directory (both files MUST be in
the same folder). 

- Fill out ALL database variables in common.php 

- Run 'install.php' within a web-browser - PLEASE NOTE: This file takes a 
  while to complete!
  
- Delete 'install.php' (just to be sure!) and 'zips2000.txt' (optional).


USAGE
=====

Navigate to distance.php on your web server via an internet browser. Fill
in both fields with zip codes and press submit.

NOTES
=====

All zip code information was taken from the U.S. Census Bureau's 2000 
Gazetteer files. They can be found here:

http://www.census.gov/geo/www/gazetteer/places2k.html