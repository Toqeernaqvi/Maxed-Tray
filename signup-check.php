<?php
session_start();
include "db_conn.php";

if (
	isset($_POST['name']) &&
	isset($_POST['password']) &&
	isset($_POST['email']) &&
	isset($_POST['registration_key'])
) {

	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$name = validate($_POST['name']);
	$pass = validate($_POST['password']);
	$email = validate($_POST['email']);
	$registration_key = validate($_POST['registration_key']);
	$role = "customer";


	$user_data = 'name=' . $name;


	if (empty($name)) {
		header("Location: signup.php?error=User Name is required&$user_data");
		exit();
	} else if (empty($pass)) {
		header("Location: signup.php?error=Password is required&$user_data");
		exit();
	} else if (empty($email)) {
		header("Location: signup.php?error=Email is required&$user_data");
		exit();
	} else if (empty($registration_key)) {
		header("Location: signup.php?error=Registration Key is required&$user_data");
		exit();
	} else {

		// hashing the password
		$pass = md5($pass);

		$sql = "SELECT * FROM users WHERE name ='$name' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The username is taken try another&$user_data");
			exit();
		} else {
			$sql2 = "INSERT INTO users(password, name, email, registration_key) VALUES('$pass', '$name', '$email', '$registration_key')";
			$result2 = mysqli_query($conn, $sql2);
			if ($result2) {
				header("Location: signup.php?success=Your account has been created successfully");
				exit();
			} else {
				header("Location: signup.php?error=unknown error occurred&$user_data");
				exit();
			}
		}
	}
} else {
	header("Location: signup.php");
	exit();
}
