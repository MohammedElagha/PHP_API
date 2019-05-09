<?php

include_once('../auth/token_verify.php');
include_once('student_controller.php');

$token_verify_status = TokenVerify::verify_token($_GET['token']);

$status = array("status" => false, "message" => "", "http_status" => "");
$data = array("students" => "");

$response = array("status" => $status, "data" => $data);

if ($token_verify_status) {
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
} else {
	$response["status"]["http_status"] = "Unauthorized";
	$response["status"]["message"] = "Wrong Authentication";
}


echo json_encode($response);

?>