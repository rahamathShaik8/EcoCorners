<?php
include "db.php";

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

    if (password_verify($password, $row['password'])) {
        //  Redirect to index.html
        header("Location: index.html");
        exit();
    } else {
        echo "Incorrect password";
    }
} else {
    echo "User not found";
            header("Location: register.html");
        exit();

}
?>
