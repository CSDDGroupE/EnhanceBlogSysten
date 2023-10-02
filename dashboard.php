<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Blog System</title>
    <link rel="stylesheet" href="styles.css">
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
    <center><img src="logo.webp" width=300 height=200 /><center>
        
    <div class="header-container"></div>
    <div class="main-container">
        <div class="container1">
        <?php include 'filter-post.php'; ?>
        </div>
        <div class="container2"
        <h1>Welcome, <?php echo $_SESSION['user']; ?></h1>
            <?php include 'post-handling.php'; ?>
        </div>
    </div>
</body>
</html>
