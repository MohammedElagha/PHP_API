<?php

include_once('../connection.php');
include_once('user.php');
include_once('user_token.php');

class LoginController {

	public function login ($username, $password) {
		$connection = DBConnection::get_instance()->get_connection();

		$query = "SELECT * FROM users
				WHERE username = '$username'
				AND password = '" . md5($password) . "'";

		$result = mysqli_query($connection, $query);

		if ($result != false) {
			if ($result->num_rows == 1) {
				$row = $result->fetch_assoc();

				$user = new User;
				$user->id = $row["id"];
				$user->username = $row["username"];

				$user_token = new UserToken($user->id);

				$user->token = $user_token->token;

				return $user;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
}

?>