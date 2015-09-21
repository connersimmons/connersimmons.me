<?php

$DB_HOST = '134.198.169.32';
$DB_USER = 'simmonsc3';
$DB_PASS = 'R01208862';
$DB_NAME = 'simmonsc3';

// Create connection
$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// This SQL statement selects ALL from the table 'Locations'
$sql = "SELECT * FROM vendor";

// Check if there are results
if ($result = mysqli_query($con, $sql))
{
	// If so, then create a results array and a temporary one
	// to hold the data
	$resultArray = array();
	$tempArray = array();

	// Loop through each row in the result set
	while($row = $result->fetch_object())
	{
		// Add each row into our results array
		$tempArray = $row;
	    array_push($resultArray, $tempArray);
	}

	// Finally, encode the array to JSON and output the results
	echo json_encode($resultArray);
}

// Close connections
mysqli_close($con);
?>
