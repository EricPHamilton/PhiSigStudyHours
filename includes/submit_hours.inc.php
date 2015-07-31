<?php
include_once 'includes/db_connect.php';
include_once 'includes/psl-config.php';
 
$error_msg = "";
 
if (isset($_POST['input_name'], $_POST['input_message'])) {
    // Sanitize and validate the data passed in
    $name = $_SESSION['username'];
	$type = 'end';
	$time = date("Y-m-d H:i:s");
    $message = filter_input(INPUT_POST, 'input_message', FILTER_SANITIZE_STRING);
 
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
 
	// Insert the new user into the database 
	if ($insert_stmt = $mysqli->prepare("INSERT INTO studyLogs (username, type, time, message) VALUES (?, ?, ?, ?)")) {
		$insert_stmt->bind_param('ssss', $name, $type, $time, $message);
		// Execute the prepared query.
		if (! $insert_stmt->execute()) {
			header('Location: ../error.php?err=Registration failure: INSERT. Contact Hams and tell him something screwed up.');
		}
		header('Location: ./submit_success.php');
	} else {
		header('Location: ./whatthefuck.php');
	}

}
?>