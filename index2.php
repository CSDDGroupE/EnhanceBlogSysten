<!DOCTYPE html>
<html>
<head>
    <title>Personal Blog</title>
</head>
<body>
    
    <h1>Personal Blogging Page</h1>
    
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
    
</body>
</html>


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




<!DOCTYPE html>
<html>
<head>
    <title>Personal Blog</title>
</head>
<body>
    
    
    <h2>Veiw Posts by Category</h2>
    <form action="index2.php" method="GET">
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
    
    
</body>
</html>
