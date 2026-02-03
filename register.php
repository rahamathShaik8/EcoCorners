<?php
include "db.php";

/* CLEAN INPUT */
$username = trim($_POST['username']);
$email    = trim($_POST['email']);
$password = trim($_POST['password']);

/* FORMAT & SECURITY */
$username = ucwords(strtolower($username));
$email    = strtolower($email);

/* VALIDATION */
if (strlen($username) < 3) {
    die("Username must be at least 3 characters long");
}

if (strlen($password) < 6) {
    die("Password must be at least 6 characters long");
}

/* HASH PASSWORD */
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

/* INSERT QUERY */
$sql = "INSERT INTO users (username, email, password)
        VALUES ('$username', '$email', '$hashed_password')";

/* EXECUTION */
if (mysqli_query($conn, $sql)) {

    /* SUCCESS MESSAGE */
    echo "Registration successful";

    /* REDIRECT TO HOME PAGE */
    header("Location: index.html");
    exit();

} else {
    die("Database error: " . mysqli_error($conn));
}
?>
