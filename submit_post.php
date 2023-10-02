<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPost = [
        'title' => $_POST['title'],
        'category' => $_POST['category'],
        'content' => $_POST['content']
    ];

    $posts = json_decode(file_get_contents('blog_posts.json'), true);
    $posts[] = $newPost;

    file_put_contents('blog_posts.json', json_encode($posts, JSON_PRETTY_PRINT));
}

header('Location: index2.php');
?>
