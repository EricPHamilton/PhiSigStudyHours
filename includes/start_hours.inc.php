<?php
include_once 'includes/db_connect.php';
include_once 'includes/psl-config.php';
 
$error_msg = "";
 
if (isset($_POST['input_name'], $_POST['input_message'])) {

    // Sanitize and validate the data passed in
    $name = filter_input(INPUT_POST, 'input_name', FILTER_SANITIZE_STRING);
	$type = 'start';
	$time = date("Y-m-d H:i:s");
    $message = filter_input(INPUT_POST, 'input_message', FILTER_SANITIZE_STRING);
	$location = filter_input(INPUT_POST, 'input_location', FILTER_SANITIZE_STRING);
 
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
 
	// Insert the new hours log into the database 
	if ($insert_stmt = $mysqli->prepare("INSERT INTO studyLogs (username, type, time, message, location) VALUES (?, ?, ?, ?, ?)")) {
		$insert_stmt->bind_param('sssss', $name, $type, $time, $message, $location);
		// Execute the prepared query.
		if (! $insert_stmt->execute()) {
			header('Location: ../error.php?err=Registration failure: INSERT. Contact Hams and tell him something screwed up.');
		}
		
		$_SESSION['name'] = $name;
		$_SESSION['message'] = $message;
		$_SESSION['location'] = $location;
		
		header('Location: ./currently_studying.php');
		
	} else {
		header('Location: ./whatthefuck.php');
	}

}
?>