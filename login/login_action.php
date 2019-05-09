<?php

include_once ('Login_Controller.php');

$status = array("status" => false, "message" => "", "http_status" => "");
$data = array("user" => "");

$response = array("status" => $status, "data" => $data);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['username']) && isset($_POST['password'])) {
		$login_controller = new LoginController;

		$result = $login_controller->login($_POST['username'], $_POST['password']);

		if ($result != false) {
			$response["status"]["status"] = true;
			$response["status"]["http_status"] = "Ok";
			$response["data"]["user"] = $result;
		} else {
			$response["status"]["http_status"] = "Not Found";
			$response["status"]["message"] = "Username or Password is wrong";
		}
	} else {
		$response["status"]["http_status"] = "Bad Request";
		$response["status"]["message"] = "There are Missing Data";
	}
} else {
	$response["status"]["http_status"] = "Method is not Allowed";
	$response["status"]["message"] = "Wrong Request";
}

echo json_encode($response);

?>