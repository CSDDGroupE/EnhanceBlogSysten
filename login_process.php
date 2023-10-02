<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $usersFile = 'users.json';
    $users = json_decode(file_get_contents($usersFile), true);

    // echo $users[$username];

    // Validate username and password (for simplicity, hardcoding a user)
    if (isset($users[$username])) {
        // header('Location: index.php');
    
                    // Check if the provided password matches the stored password
                    if ($users[$username]['password'] === $password) {
                        echo "Login successful. Welcome, " . $inputUsername;
                    
                    $_SESSION['user'] = $username;
                    header('Location: dashboard.php');
                    exit;
                    }
    //             } else {
    //                 echo 'Invalid credentials. <a href="index.php">Try again</a>';
    //                     }
    //             }
    //  else {
    //     //  header('Location: index.php');
    //      exit;
    // }
    
}
}

?>