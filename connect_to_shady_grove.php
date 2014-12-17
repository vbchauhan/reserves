<?php # connect_to_shady_grove.php

// Created by: Siddharth Choksi in May 2010
// This file contains the database access information. 
// This file also establishes a connection to MySQL and selects the database.
// Set the database access information as constants.

DEFINE ('DB_USER', 'sgl');
DEFINE ('DB_PASSWORD', 'Sh4dyGr0v3');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'shadygrove');
DEFINE ('DB_PORT', 3306);

$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT) OR die ('Could not connect to MySQL: ' .mysqli_connect_error() );
?>
