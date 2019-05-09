<?php

include_once('student_controller.php');

$status = array("status" => false, "message" => "", "http_status" => "");
$data = array("students" => "");

$response = array("status" => $status, "data" => $data);

if ($_SERVER["REQUEST_METHOD"] == "GET") {
	$students = StudentController::get_students();

	if ($students != false) {
		$response["status"]["status"] = true;
		$response["status"]["http_status"] = "Ok";
		$response["data"]["students"] = $students;
	} else {
		$response["status"]["message"] = "Empty Storage";
		$response["status"]["http_status"] = "Not Found";
	}
} else {
	$response["status"]["http_status"] = "Method is not Allowed";
	$response["status"]["message"] = "Wrong Request";
}

echo json_encode($response);

?>