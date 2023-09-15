<?php
session_start();
include "../db_conn.php";

$userId = $_POST['userId'];

$sql = "UPDATE users SET status = 0 WHERE id = $userId";

$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: users.php?success=User deleted successfully");
  exit();
} else {
  // Handle the case where the SQL query fails
  echo "Error: " . mysqli_error($conn);
}