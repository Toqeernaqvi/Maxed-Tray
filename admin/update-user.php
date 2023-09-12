<?php
session_start();
include "../db_conn.php";

if (
	isset($_POST['name']) ||
	isset($_POST['password']) ||
	isset($_POST['email']) ||
	isset($_POST['registration_key'])
) {

	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	// $name = validate($_POST['name']);
	// $pass = validate($_POST['password']);
	// $email = validate($_POST['email']);
	$registration_key = validate($_POST['registration_key']);
	$role = "customer";
  $userId = isset($_POST['userId']);

 

		// hashing the password
		// $pass = md5($pass);

    $sql = "UPDATE users
    SET registration_key = '$registration_key'
    WHERE id = $userId";

		echo $sql;

		// $result = mysqli_query($conn, $sql);
    // if($result){
    //   header("Location: users.php?success=Your account has been created successfully");
    //   exit();
    // }
}
