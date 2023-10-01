<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['user']; ?></h1>
    <a href="logout.php">Logout</a>
    
    <!-- Add options for managing posts, comments, etc. -->
</body>
</html>
