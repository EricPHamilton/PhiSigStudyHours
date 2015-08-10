<?php
include_once 'includes/db_connect.php';
include_once 'includes/psl-config.php';
 
$error_msg = "";

echo $_SESSION['name'];
 
// Sanitize and validate the data passed in
$name = $_SESSION['name'];
$type = 'end';
$time = date("Y-m-d H:i:s");
$message = $_SESSION['message'];
$location = $_SESSION['location'];

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Insert the new hours log into the database 
if ($insert_stmt = $mysqli->prepare("INSERT INTO studyLogs (username, type, time, message, location) VALUES (?, ?, ?, ?, ?)")) {
	$insert_stmt->bind_param('sssss', $name, $type, $time, $message, $location);
	// Execute the prepared query.
	if (! $insert_stmt->execute()) {
		header('Location: ../error.php?err=Registration failure: INSERT. Contact Hams and tell him something screwed up.');
	}
	header('Location: ./submit_success.php');
} else {
	header('Location: ./whatthefuck.php');
}

?>