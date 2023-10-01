<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate username and password (for simplicity, hardcoding a user)
    if ($username === 'admin' && $password === 'password') {
        $_SESSION['user'] = $username;
        header('Location: dashboard.php');
        exit;
    } else {
        echo 'Invalid credentials. <a href="login.php">Try again</a>';
    }
} else {
    header('Location: login.php');
    exit;
}
