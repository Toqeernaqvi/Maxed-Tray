<?php
session_start();
include "db_conn.php";

if (isset($_POST['password']) && isset($_POST['registration_key']) && isset($_POST['email'])) {
    $password = $_POST['password'];
    $registration_key = $_POST['registration_key'];
    $email = $_POST['email'];

    $sql = "UPDATE users
            SET password = '$password'
            WHERE email = '$userId' AND registration_key = '$registration_key'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php?success=User updated successfully");
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
