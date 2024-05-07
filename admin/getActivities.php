<?php
//include the connection file
include('connection.php');

//Get all elements from the 'activity' table
$result = $mysqli->query("SELECT * FROM activity");

// Check if there are any results
if ($result->num_rows > 0) {
	// Output data of each row
	while($row = $result->fetch_assoc()) {
		echo "<p class='roboto-medium'>" . $row["activities"]. "</p>";
	}
} else {
	echo "<p>No activities found</p>";
}