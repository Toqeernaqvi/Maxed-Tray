<?php
session_start();
include "db_conn.php";

if (isset($_POST['password']) && isset($_POST['registration_key']) && isset($_POST['email'])) {
    $password = $_POST['password'];
    $registration_key = $_POST['registration_key'];
    $email = $_POST['email'];
    $password = md5($password);

    $sql = "UPDATE users
            SET password = '$password'
            WHERE email = '$email' AND registration_key = '$registration_key'";

    $result = mysqli_query($conn, $sql);

    echo $result;

    if ($result) {
        $affected_rows = mysqli_affected_rows($conn);
        if ($affected_rows > 0) {
            header("Location: index.php?success=Password updated successfully. please login with your new password");
        } else {
			header("Location: reset_password_page.php?error=Incorrect Email or Registration Key");
        }
        exit();
    } else {
        // Handle the case where the SQL query fails
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Handle the case where one or more POST parameters are missing
    echo "Missing POST parameters";
}
?>