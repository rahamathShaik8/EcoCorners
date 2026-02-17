<?php
session_start();
require 'db.php';

/* ---------- Load .env ---------- */
$env = parse_ini_file(__DIR__ . '/.env');

$client_id     = $env['GITHUB_CLIENT_ID'];
$client_secret = $env['GITHUB_CLIENT_SECRET'];
$redirect_uri  = $env['GITHUB_REDIRECT_URI'];

/* ---------- If GitHub sends back code ---------- */
if (isset($_GET['code'])) {

    $code = $_GET['code'];

    /* ---------- STEP 1: Exchange Code For Access Token ---------- */
    $token_url = "https://github.com/login/oauth/access_token";

    $post_fields = [
        "client_id" => $client_id,
        "client_secret" => $client_secret,
        "code" => $code,
        "redirect_uri" => $redirect_uri
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $token_url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_fields));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Accept: application/json"
    ]);

    $token_response = curl_exec($ch);

    if (curl_errno($ch)) {
        die("Curl error (token): " . curl_error($ch));
    }

    curl_close($ch);

    $token_data = json_decode($token_response, true);

    if (!isset($token_data['access_token'])) {
        die("Failed to retrieve access token.");
    }

    $access_token = $token_data['access_token'];

    /* ---------- STEP 2: Get User Information ---------- */
    $user_url = "https://api.github.com/user";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $user_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer " . $access_token,
        "User-Agent: EcoCorners",
        "Accept: application/vnd.github+json"
    ]);

    $user_response = curl_exec($ch);

    if (curl_errno($ch)) {
        die("Curl error (user): " . curl_error($ch));
    }

    curl_close($ch);

    $user = json_decode($user_response, true);

    if (!isset($user['login'])) {
        die("Failed to retrieve user information.");
    }

    $username = $user['login'];
    $email    = $user['email'];

    /* ---------- If Email Is Private ---------- */
    if (empty($email)) {
        $email = $username . "@github.com";
    }

    /* ---------- STEP 3: Check If User Exists ---------- */
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($check) == 0) {

        mysqli_query($conn,
        "INSERT INTO users (username, email, password)
         VALUES ('$username', '$email', NULL)");
    }

    /* ---------- STEP 4: Start Session ---------- */
    $_SESSION['user_email'] = $email;
    $_SESSION['username']   = $username;

    header("Location: index.php");
    exit();
}

/* ---------- If No Code → Redirect To GitHub ---------- */
$auth_url = "https://github.com/login/oauth/authorize?"
    . "client_id=" . $client_id
    . "&redirect_uri=" . urlencode($redirect_uri)
    . "&scope=" . urlencode("user:email");

header("Location: $auth_url");
exit();
?>
