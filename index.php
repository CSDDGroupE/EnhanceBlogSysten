<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Personal Blog Login</title>
</head>
<body>
<header>
        <nav>
            <div class="logo">
                
            </div>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>
<?php
    if (isset($_SESSION['user'])) {
        echo '<a href="dashboard.php">Dashboard</a> | <a href="logout.php">Logout</a>';
    }
    ?> 
    
    <center><img src="logo.webp" width=300 height=200 /><center>
    <div class="login-container">
        <form class="login-form" action="login_process.php" method="post">
            <h2>Login</h2>
            <div class="input-container">
                <label for="username">Username or Email:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-container">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
            <p>Don't have an account? <a href="register.php">Sign up</a></p>
        </form>
    </div>
    <div class="space-container">

    </div>
    <footer>
        <div class="footer-content">
            <p>&copy; 2023 Wordify</p>
            <ul class="footer-links">
                
            </ul>
        </div>
    </footer>
</body>
</html>


