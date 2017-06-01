<?php
include_once("dbconx.php");

$tbl_usedCars = "CREATE TABLE IF NOT EXISTS usedcars (
              registration VARCHAR(20) NOT NULL,
			  manufacturer VARCHAR(13) NOT NULL,
			  model VARCHAR(10) NOT NULL,
			  color VARCHAR(10) NOT NULL,
			  year INT(4) NOT NULL,
			  type ENUM('saloon','hatchback','estate','coupe', '7seater') NOT NULL,
			  doors INT(1) NOT NULL,
			  cc INT(4) NOT NULL,
			  fuel ENUM('petrol','diesel','electric','gas') NOT NULL,
			  email VARCHAR(60) NOT NULL,
			  phone VARCHAR(15) NOT NULL,
              PRIMARY KEY (registration)
             )";
$query = mysqli_query($db, $tbl_usedCars);
if ($query === TRUE) {
	echo "<h3>used car table created OK :) </h3>"; 
} else {
	echo "<h3>used car table NOT created :( </h3>"; 
}