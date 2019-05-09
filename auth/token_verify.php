<?php

include_once('../connection.php');

class TokenVerify {
	public static function verify_token($token) {
		$connection = DBConnection::get_instance()->get_connection();
		$query = "SELECT COUNT(*) as count FROM user_tokens WHERE token = '$token'";

		$result = mysqli_query($connection, $query);

		if ($result != false) {
			$row = $result->fetch_assoc();

			if ($row["count"] > 0) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
}

?>