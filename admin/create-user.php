<?php
session_start();
include "../db_conn.php";

if (isset($_POST['email'])) {

  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

// set variables for create user
  $email = validate($_POST['email']);
  $registration_key = $randomKey = bin2hex(random_bytes(16));
  $role = "customer";
  $pass = md5("123456");

  $sql = "INSERT INTO users (email, password, registration_key, role)
  VALUES ('$email', '$pass', '$registration_key', '$role')";

  $result = mysqli_query($conn, $sql);
  if ($result) {
    header("Location: users.php?success=Your account has been created successfully");
    exit();
  }
}
