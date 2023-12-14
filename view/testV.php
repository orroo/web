<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once __DIR__ . '/../model/Comment.php';
include_once __DIR__ . '/../model/video.php';
include_once __DIR__ . '/../controller/CommentS.php';
include_once __DIR__ . '/../controller/VedioS.php';

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
    unset( $_POST['post']);

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
    <link rel="stylesheet" href="styleV.css">
    
    <link rel="stylesheet" href="site.css">
    <style>
        /* Your CSS styles here */
    </style>
    <script src="indexV.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspiration Hub</title>
</head>

<body>
    <div class='part'>
    <nav>
            <a href="main_page.php"><img src="a.png" class="logou" height="60%" width="60%" alt="Image 1"></a>
            <ul>
                <li><a href="iindex.php">add a video</a></li>
                <li><a href="#">Home</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
             <img class='user' src=<?php echo 'data:image/png;base64,'.base64_encode($_SESSION['img']);?> onclick=toggleMenu()>
            
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src=<?php echo 'data:image/png;base64,'.base64_encode($_SESSION['img']);?>>
                        <h2 name="name"><?php echo $_SESSION["Username"]?></h2>
                    </div>
                    <hr>

                    <a href="profile.php" class="sub-menu-link">
                        <img src="images/profile.png">
                        <p>Edit Profile</p>
                        <span>></span>
                    </a>

                    <a href="indexU.php" class="sub-menu-link">
                        <img src="images/setting.png">
                        <p>Settings & Privacy</p>
                        <span>></span>
                    </a>

                    <a href="#" class="sub-menu-link">
                        <img src="images/help.png">
                        <p>Help & Support</p>
                        <span>></span>
                    </a>

                    <a href="logout.php" class="sub-menu-link">
                        <img src="images/logout.png">
                        <p>Logout</p>
                        <span>></span>
                    </a>

                    
                    <?php if ((isset($_SESSION['admin']))&&($_SESSION['admin']==1)){
                             echo '<a href="admin.html" class="sub-menu-link">
                             <img src="images/profile.png">
                             <p>Dashboard</p>
                             <span>></span>
                            </a>';
                        } ?>

                </div>
        </nav>
    </div>   
                    </div>
        <h1>test</h1>
    </div>

    <main>
        <!-- Search bar -->
        <form class='search' method="post" action="testV.php">
            <input type="text" name="search_word" placeholder="Search">
            <input type="submit" value="Search">
        </form>

        <!-- Posts container -->
        <div class="post-container video-container">

        <div class="post-container">
            <h2>Posts</h2>
            <?php
            foreach ($posts as $post) {
                echo '<div class="content">';
                echo '<video controls>';
                echo '<source src="' . $post['video'] . '" type="video/mp4">';
                echo 'Your browser does not support the video tag.';
                echo '</video>';
                echo '<p class="post-text">' . $post['texte'] . '</p>';
                echo '<p class="date">Date Publication: ' . $post['datePublication'] . '</p>';
                echo '<form method="post" action="testV.php">';
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
                echo '<div class="content">';
                echo '<p class="comment-text">' . $comment['texte'] . '</p>';
                echo '<p class="date">Date Message: ' . $comment['datemessage'] . '</p>';
                echo '<form method="post" action="testV.php">';
                echo '<input type="hidden" name="delete" value="' . $comment['id'] . '">';
                echo '<input type="submit" value="Delete Comment">';
                echo '</form>';
                echo '<form method="post" action="testV.php">';
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
    <script>
        let subMenu=document.getElementById("subMenu");
        function toggleMenu(){
            subMenu.classList.toggle("open-menu");
        }
    </script>
</body>

</html>
