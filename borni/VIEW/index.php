<?php
ini_set('memory_limit', '5000M');

include_once '../MODEL/video.php';
include_once '../CONTROLLEUR/VedioS.php';

$error = "";

if (isset($_POST['post'])) {
    $postC = new PostC();

    $targetDir = "uploads/";

    if (isset($_FILES['video']) && $_FILES['video']['error'] == 0) {
        $targetVideo = $targetDir . basename($_FILES["video"]["name"]);

        if (move_uploaded_file($_FILES["video"]["tmp_name"], $targetVideo)) {
            $videoPath = $targetVideo;
        } else {
            $error = "Une erreur s'est produite lors du téléchargement de la vidéo.";
        }
    } else {
        $videoPath = null;
    }

    $cred = new Post(
        null,
        $videoPath,
        $_POST['post'],
        null
    );

    $postC->InsertPost($cred);

    // Redirect to test.php after successful upload
    header('Location: http://localhost/borni/VIEW/test.php');
    exit;
}

$postC = new PostC();
$messages = $postC->getMessages();



foreach ($messages as $message) {
    echo '<div class="video-container">';
    echo '<p class="texte">' . $message['texte'] . '</p>';
    echo '<video controls>';
    echo '<source src="' . $message['video'] . '" type="video/mp4">';
    echo 'Votre navigateur ne prend pas en charge la balise vidéo.';
    echo '</video>';

    echo '<p class="datePublication">' . $message['datePublication'] . '</p>';

    // Add the delete button
    echo '<form method="post" action="' . $_SERVER['PHP_SELF'] . '">';
    echo ' <input type="hidden" name="delete_post_id" value="' . $message['id'] . '">';
    echo ' <button type="submit" name="delete">Delete</button>';
    echo '</form>';
    echo '</div>';
}

// Check if the delete form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $postC = new PostC();

    $postId = $_POST['delete_post_id'];

    $post = new Post($postId, '', ''); // Provide appropriate values for video and texte
    try {
        $deleted = $postC->DeletePost($post);

        if ($deleted) {
            echo "Post deleted successfully!";
        } else {
            echo "deleted!!";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
