<?php
session_start();
include "db_conn.php";

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

	$name = validate($_POST['name']);
	$pass = validate($_POST['password']);
	$email = validate($_POST['email']);
	$registration_key = validate($_POST['registration_key']);
	$role = "customer";
  $userId = 1;

 

		// hashing the password
		$pass = md5($pass);

    $sql = "UPDATE users
    SET name = '$newName', password = '$newPassword'
    WHERE id = $userId";

		$result = mysqli_query($conn, $sql);
    if($result){
      header("Location: signup.php?success=Your account has been created successfully");
      exit();
    }
}
