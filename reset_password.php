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

    if ($result) {
        header("Location: index.php?success=Password updated successfully. please login with your new password");
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
