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
    <h2>Add a New Post</h2>
    <form action="submit_post.php" method="POST">
        <label for="title">Title:</label>
        <input type="text" name="title" required><br>

        <label for="category">Category:</label>
        <select name="category">
            <option value="Technology">Technology</option>
            <option value="Travel">Travel</option>
            <option value="Food">Food</option>
            <option value="Lifestyle">Lifestyle</option>
        </select><br>

        <label for="content">Content:</label><br>
        <textarea name="content" required></textarea><br>

        <input type="submit" value="Submit">
    </form>

    <?php
$posts = json_decode(file_get_contents('blog_posts.json'), true);

function displayPosts($filterCategory = null) {
    global $posts;
    echo '<ul>';
    foreach ($posts as $post) {
        if (!$filterCategory || $post['category'] === $filterCategory) {
            echo '<li>';
            echo '<h3>' . $post['title'] . '</h3>';
            echo '<p>Category: ' . $post['category'] . '</p>';
            echo '<p>' . $post['content'] . '</p>';
            echo '</li>';
        }
    }
    echo '</ul>';
}
?>
<h2>Veiw Posts by Category</h2>
    <form action="dashboard.php" method="GET">
        <label for="category">Category:</label>
        <select name="category">
            <option value="">All</option>
            <option value="Technology">Technology</option>
            <option value="Travel">Travel</option>
            <option value="Food">Food</option>
            <option value="Lifestyle">Lifestyle</option>
        </select>
        <input type="submit" value="Filter">
    </form>

    <?php
    if (isset($_GET['category'])) {
        $filterCategory = $_GET['category'];
    } else {
        $filterCategory = null;
    }

    displayPosts($filterCategory);
    ?>
    <a href="logout.php">Logout</a>
    
    <!-- Add options for managing posts, comments, etc. -->
</body>
</html>
