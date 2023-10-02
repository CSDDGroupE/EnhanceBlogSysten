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
  
    <?php
    $posts = $_SESSION['posts'];
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
        <input type="submit" value="filterCategory">
    </form>

    
</body> 