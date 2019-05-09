<?php

include_once('../connection.php');
include_once('student.php');

class StudentController {

	public function add_student ($name, $email, $phone) {
		$connection = DBConnection::get_instance()->get_connection();

		$student = new Student;
		$student->name = $name;
		$student->email = $email;
		$student->phone = $phone;

		$query = "INSERT INTO students (name, email, phone)
				VALUES ('".$student->name."', '".$student->email."', '".$student->phone."')";

		$result = mysqli_query($connection, $query);

		if ($result != false) {
			return true;
		} else {
			return false;
		}
	}


	public static function get_students () {
		$connection = DBConnection::get_instance()->get_connection();
		$query = "SELECT * FROM students";

		$result = mysqli_query($connection, $query);

		$students = array();

		if ($result != false) {
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$student = new Student;
					$student->name = $row["name"];
					$student->email = $row["email"];
					$student->phone = $row["phone"];

					array_push($students, $student);
				}

				return $students;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
}

?>