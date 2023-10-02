<?php
// Function to add a new post
function addPost($content,$category) {
    $_SESSION['posts'][] = [
        'id' => uniqid(),
        'content' => $content,
        'comments' => [],
        'category'=>$category
    ];
}

// Function to add a new comment to a post
function addComment($postId, $comment) {
    foreach ($_SESSION['posts'] as &$post) {
        if ($post['id'] === $postId) {
            $post['comments'][] = $comment;
        }
    }
}

// Check if the form is submitted for posting a new post
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['post_content'])) {
    $postContent = $_POST['post_content'];
    $postCategory = $_POST['post_content'];
    addPost($postContent,$postCategory);
}

// Check if the form is submitted for posting a new comment
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comment_content']) && isset($_POST['post_id'])) {
    $postId = $_POST['post_id'];
    $commentContent = $_POST['comment_content'];
    addComment($postId, $commentContent);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post and Comment System</title>
    <style>
        body {
            position: relative;
            margin-top: 50px;
            margin-right: 20px;
            font-family: Arial, sans-serif; /* Added font-family */
            background-color: #f0f0f0; /* Changed background color */
        }

        .logout-btn {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        h1 {
            color: #333; /* Added text color */
        }

        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Add more CSS rules as needed to style your content */
    </style>
    <style>
        body {
            position: relative;
            margin-top: 50px;
            margin-right: 20px;
        }

        .logout-btn {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
    
</head>

<body>


    <a href="logout.php" class="logout-btn">Logout</a>

    <!-- Rest of your PHP code for displaying posts and comments goes here -->

    <h1>Post Something:</h1>
    <form method="post" action="">
        <textarea name="post_content" rows="4" cols="50"></textarea><br>
        <label for="category">Category:</label>
        <select name="category">
            <option value="">All</option>
            <option value="Technology">Technology</option>
            <option value="Travel">Travel</option>
            <option value="Food">Food</option>
            <option value="Lifestyle">Lifestyle</option>
        </select>
        <input type="submit" value="Post">
    </form>

    <h2>Posts:</h2>
    <?php
    // Display posts and comments
    if (isset($_SESSION['posts'])) {
        if (!$filterCategory || $post['category'] === $filterCategory) {
        foreach ($_SESSION['posts'] as $post) {
            echo "<p>Post ID: " . $post["id"]. " - Content: " . $post["content"]. "</p>";

            if (!empty($post['comments'])) {
                echo "<p>Comments:</p><ul>";
                foreach ($post['comments'] as $comment) {
                    echo "<li><strong>" . $_SESSION['user'] . ":</strong> " . $comment . "</li>";
                }
                echo "</ul>";
            }

            // Comment form for each post
            echo "<form method='post' action=''>
                    <input type='hidden' name='post_id' value='{$post["id"]}'>
                    <textarea name='comment_content' rows='2' cols='30'></textarea><br>
                    <input type='submit' value='Comment'>
                </form>";
                
        }
    }
    } else {
        echo "No posts yet.";
    }
    ?>
</body>

</html>
