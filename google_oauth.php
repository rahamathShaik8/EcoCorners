<?php
session_start();
require 'db.php';

/* ---------- Load .env ---------- */
$env = parse_ini_file(__DIR__ . '/.env');

$client_id     = $env['GOOGLE_CLIENT_ID'];
$client_secret = $env['GOOGLE_CLIENT_SECRET'];
$redirect_uri  = $env['GOOGLE_REDIRECT_URI'];

/* ---------- If Google sends back code ---------- */
if (isset($_GET['code'])) {

    $token_url = "https://oauth2.googleapis.com/token";

    $data = [
        "code" => $_GET['code'],
        "client_id" => $client_id,
        "client_secret" => $client_secret,
        "redirect_uri" => $redirect_uri,
        "grant_type" => "authorization_code"
    ];

    $options = [
        "http" => [
            "header"  => "Content-type: application/x-www-form-urlencoded",
            "method"  => "POST",
            "content" => http_build_query($data)
        ]
    ];

    $context = stream_context_create($options);
    $response = file_get_contents($token_url, false, $context);
    $result = json_decode($response, true);

    $access_token = $result['access_token'];

    /* ---------- Get User Info ---------- */
    $user_info = file_get_contents(
        "https://www.googleapis.com/oauth2/v2/userinfo?access_token=" . $access_token
    );

    $user = json_decode($user_info, true);

    $email = $user['email'];
    $name  = $user['name'];

    /* ---------- Check if user exists ---------- */
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($check) == 0) {

        // Insert according to your DB structure
        mysqli_query($conn,
        "INSERT INTO users (username, email, password)
         VALUES ('$name', '$email', NULL)");
    }

    $_SESSION['user_email'] = $email;
    $_SESSION['username']   = $name;

    header("Location: index.php");
    exit();
}

/* ---------- Redirect To Google ---------- */
$auth_url = "https://accounts.google.com/o/oauth2/auth?"
    . "client_id=" . $client_id
    . "&redirect_uri=" . urlencode($redirect_uri)
    . "&response_type=code"
    . "&scope=" . urlencode("email profile");

header("Location: $auth_url");
exit();
?>
