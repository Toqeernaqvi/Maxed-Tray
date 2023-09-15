<?php
session_start();
include "db_conn.php";

if ( isset($_POST['name']) && isset($_POST['password']) &&
	isset($_POST['email']) && isset($_POST['registration_key'])) {
	function validate($data){ return htmlspecialchars(stripslashes(trim($data)));}
	$name = validate($_POST['name']);
	$pass = validate($_POST['password']);
	$email = validate($_POST['email']);
	$registration_key =  ($_POST['registration_key']);
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

		// Build the SQL query
		$sql = "SELECT id FROM users WHERE email = '$email' AND registration_key = '$registration_key' AND status = '1'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) == 0) {
				header("Location: signup.php?error=email and registration key are invalid");
				exit();
		} else {
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['id'];

    // Perform the UPDATE using a prepared statement
    $sql2 = "UPDATE users SET password = ?, name = ?, email = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql2);
    mysqli_stmt_bind_param($stmt, "sssi", $pass, $name, $email, $user_id);

    if (mysqli_stmt_execute($stmt)) {
			$_SESSION['name'] = $name;
			$_SESSION['id'] = $user_id;
			header("Location: img_splitter.php");
			exit();
    } else {
			header("Location: signup.php?error=unknown error occurred");
			exit();
    }
	}
	// Close the database connection when done
	mysqli_close($conn);

}
}
?>