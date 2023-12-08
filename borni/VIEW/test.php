<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once __DIR__ . '/../MODEL/Comment.php';
include_once __DIR__ . '/../MODEL/video.php';
include_once __DIR__ . '/../CONTROLLEUR/CommentS.php';
include_once __DIR__ . '/../CONTROLLEUR/VedioS.php';

$error = "";

$commentsController = new CommentC();
$postsController = new PostC();

// Handling post submission
if (isset($_POST['upload_post'])) {
    $videoPath = ""; // Handle video upload and get the video path
    $newPost = new Post(
        null,
        $videoPath,
        $_POST['post_text'],
        null // Set a proper date value here
    );

    $postsController->insertPost($newPost);
}

// Handling comment submission
if (isset($_POST['post'])) {
    $newComment = new Comment(
        null,
        $_POST['post'],
        null // Set a proper date value here
    );

    $commentsController->insertComment($newComment);
}

// Handling comment deletion
if (isset($_POST['delete'])) {
    $commentIdToDelete = $_POST['delete'];
    $commentToDelete = new Comment($commentIdToDelete, '', ''); // Adjust parameters as needed
    $commentsController->deleteComment($commentToDelete);
}

// Handling comment update
if (isset($_POST['update'])) {
    $commentIdToUpdate = $_POST['update'];
    $updatedText = $_POST['updated_text'];

    $commentToUpdate = new Comment($commentIdToUpdate, $updatedText, null); // Adjust parameters as needed
    $commentsController->updateComment($commentToUpdate);
}

// Handling post deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_post_id'])) {
    $postId = $_POST['delete_post_id'];
    $postToDelete = new Post($postId, '', ''); // Adjust parameters as needed
    $postsController->deletePost($postToDelete);
}

// Handling search submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search_word'])) {
    $searchWord = $_POST['search_word'];
    $searchResults = $postsController->searchPostsByKeyword($searchWord);
 // Implement a search function in your controller
} else {
    // If no search term is provided, retrieve all posts
    $searchResults = $postsController->getMessages();
}

// Getting posts and comments from the database
$posts = $searchResults;
$comments = $commentsController->getComments();

?>


<DOCTYPE html>
<ht!ml lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index.css">
    <style>
        /* Your CSS styles here */
    </style>
    <script src="index.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspiration Hub</title>
</head>

<body>
    <header>
        <a href="#"><img src="a.png" alt="" height="60%" width="60%"></a>
        <nav class="navigation">
            <a href="#">home</a>
            <a href="#">about</a>
            <a href="#">services</a>
            <a href="#">contact</a>
            <a href="iindex.html">Expert Medical Counsel</a>
            <button class="payment">log in</button>
        </nav>
    </header>

    <main>
        <!-- Search bar -->
        <form method="post" action="test.php">
            <input type="text" name="search_word" placeholder="Search">
            <input type="submit" value="Search">
        </form>

        <!-- Posts container -->
        <div class="post-container video-container">

        <div class="post-container">
            <h2>Posts</h2>
            <?php
            foreach ($posts as $post) {
                echo '<div>';
                echo '<video controls>';
                echo '<source src="' . $post['video'] . '" type="video/mp4">';
                echo 'Your browser does not support the video tag.';
                echo '</video>';
                echo '<p class="post-text">' . $post['texte'] . '</p>';
                echo '<p class="date">Date Publication: ' . $post['datePublication'] . '</p>';
                echo '<form method="post" action="test.php">';
                echo '<input type="hidden" name="delete_post_id" value="' . $post['id'] . '">';
                echo '<input type="submit" value="Delete Post">';
                echo '</form>';
                echo '</div>';
            }
            ?>
           </div>
        </div>

        <!-- Comments container -->
        <div class="comment-container">
            <h2>Comments</h2>
            <?php
            foreach ($comments as $comment) {
                echo '<div>';
                echo '<p class="comment-text">' . $comment['texte'] . '</p>';
                echo '<p class="date">Date Message: ' . $comment['datemessage'] . '</p>';
                echo '<form method="post" action="test.php">';
                echo '<input type="hidden" name="delete" value="' . $comment['id'] . '">';
                echo '<input type="submit" value="Delete Comment">';
                echo '</form>';
                echo '<form method="post" action="test.php">';
                echo '<input type="hidden" name="update" value="' . $comment['id'] . '">';
                echo '<input type="text" name="updated_text" placeholder="New text">';
                echo '<input type="submit" value="Update Comment">';
                echo '</form>';
                echo '</div>';
            }
            ?>
        </div>
    </main>

    <!-- Your comment submission form goes here -->

</body>

</html>
