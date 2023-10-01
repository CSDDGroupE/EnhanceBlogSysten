<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Store user information in a JSON file (for simplicity, not secure)
    $usersFile = 'users.json';
    $users = json_decode(file_get_contents($usersFile), true);

    // Check if the username is already taken
    if (isset($users[$username])) {
        echo 'Username already exists. <a href="register.php">Try again</a>';
    } else {
        // Hash the password (for simplicity, not secure)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Store user data
        $users[$username] = [
            'password' => $hashedPassword,
        ];
        
        file_put_contents($usersFile, json_encode($users));

        // Redirect to login page
        header('Location: login.php');
        exit;
    }
} else {
    header('Location: register.php');
    exit;
}
