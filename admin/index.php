<?php

//include the connection file
include 'connection.php';

// Check connection
if ($mysqli->connect_error) {
	die("Connection failed: " . $mysqli->connect_error);
}

// Count the number of entries in the 'activities' table
$result = $mysqli->query("SELECT COUNT(*) AS count FROM activity");
$row = $result->fetch_assoc();
$count = $row['count'];

if ($count >= 10) {
	// If there are 10 or more entries, show 'All data there'
	echo 'All data there';
} else {
	// If there are less than 10 entries, show the button
	echo '<form method="post" action="">';
	echo '<input type="submit" name="callAPI" value="Call API">';
	echo '</form>';
}

// Check if the form was submitted
if (isset($_POST['callAPI'])) {
	// Loop 10 times
	for ($i = 0; $i < 10; $i++) {
		// Make the API call
		$response = file_get_contents("https://www.boredapi.com/api/activity");

		// Check if the API call was successful
		if ($response !== false) {
			// Decode the JSON response
			$data = json_decode($response);

			// Check if the decoding was successful
			if ($data !== null) {
				// Handle the data from the API call
				$activity = $mysqli->real_escape_string($data->activity);

				// Prepare an SQL statement to insert the activities into the 'activity' table
				$sql = "INSERT INTO activity (activities) VALUES ('$activity')";

				// Execute the SQL statement
				if ($mysqli->query($sql) === TRUE) {
					echo "New record created successfully<br>";
				} else {
					echo "Error: " . $sql . "<br>" . $mysqli->error;
				}
			} else {
				echo "Error: Unable to decode JSON response.";
			}
		} else {
			echo "Error: Unable to make API call.";
		}
	}
}