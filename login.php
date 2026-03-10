<?php
include "db.php";

/* CLEAN INPUT */
$email = trim($_POST['email']);
$password = trim($_POST['password']);

/* HANDLE CASE SENSITIVITY */
$email = strtolower($email);

/* SQL QUERY */
$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);

/* DATABASE ERROR */
if (!$result) {
    die("Database query failed: " . mysqli_error($conn));
}

/* CHECK USER EXISTENCE */
if (mysqli_num_rows($result) == 1) {

    $row = mysqli_fetch_assoc($result);

    /* PASSWORD VERIFICATION */
    if (password_verify($password, $row['password'])) {

        echo "Login successful";
        print "<br>Welcome, " . $row['username'];

        /* REDIRECT TO HOME PAGE */
        header("Location: index.html");
        exit();

    } else {
        die("Incorrect password");
    }

} else {
    die("User not found. Please register first.");
}
?>
