<?php

include_once('../auth/token_verify.php');
include_once('student_controller.php');

$token_verify_status = TokenVerify::verify_token($_GET['token']);

$status = array("status" => false, "message" => "", "http_status" => "");
$response = array("status" => $status);

if ($token_verify_status) {
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_POST['student_name']) && isset($_POST['student_email']) && isset($_POST['student_phone'])) {

			$student_controller = new StudentController;
			$result = $student_controller->add_student($_POST['student_name'], $_POST['student_email'], $_POST['student_phone']);

			if ($result) {
				$response["status"]["status"] = true;
				$response["status"]["http_status"] = "Ok";
			} else {
				$response["status"]["http_status"] = "Internal Server Error";
				$response["status"]["message"] = "Something is Wrong. Try Again Later";
			}
		} else {
			$response["status"]["http_status"] = "Bad Request";
			$response["status"]["message"] = "There are Missing Data";
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