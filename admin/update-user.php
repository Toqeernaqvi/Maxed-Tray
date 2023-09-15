<?php
session_start();
include "../db_conn.php";

if (isset($_POST['name']) && isset($_POST['registration_key']) && isset($_POST['userId'])) {
    $name = $_POST['name'];
    $registration_key = $_POST['registration_key'];
    $userId = $_POST['userId'];

    $sql = "UPDATE users
            SET registration_key = '$registration_key',
                name = '$name'
            WHERE id = $userId";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: users.php?success=User updated successfully");
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
