<?php

include_once('../connection.php');

class UserToken {
	public $user_id;
	public $token;

	public function __construct ($user_id) {
		$this->user_id = $user_id;
		$this->generate_token();
	}

	private function generate_token () {
		$length = 60;
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characters_length = strlen($characters);
        $random_string = '';
        for ($i = 0; $i < $length; $i++) {
            $random_string .= $characters[rand(0, $characters_length - 1)];
        }
		$this->token = $random_string;

		$this->store_token();
	}


	private function store_token () {
		$connection = DBConnection::get_instance()->get_connection();
		$query = "INSERT INTO user_tokens (user_id, token) VALUES (".$this->user_id.", '".$this->token."')";
		mysqli_query($connection, $query);
	}
}

?>