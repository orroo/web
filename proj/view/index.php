<?php









include_once '../model/Post.php';
include_once '../controlleur/PostC.php';

echo '<a href="javascript:void(0);" onclick="redirectToIndex()">⮜</a>';
echo '<script>
        function redirectToIndex() {
            window.location.href = "index2.html";
        }
      </script>';

$error = "";

if (isset($_POST['post'])) {
    $postC = new PostC();
    
    $targetDir = "uploads/";

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $imagePath = $targetFile;
        } else {
            echo "Une erreur s'est produite lors du téléchargement de l'image.";
            exit;
        }
    } else {
        $imagePath = null;
    }

    if (isset($_FILES['video']) && $_FILES['video']['error'] == 0) {
        $targetDir = "uploads/";
        $targetVideo = $targetDir . basename($_FILES["video"]["name"]);
    
        if (move_uploaded_file($_FILES["video"]["tmp_name"], $targetVideo)) {
            $videoPath = $targetVideo;
        } else {
            echo "Une erreur s'est produite lors du téléchargement de la vidéo.";
            exit;
        }
    } else {
        $videoPath = null;
    }

    $cred = new Post(
        null,
        $imagePath,
        $videoPath,
        $_POST['post'],
        null
    );

    // Insertion du post dans la base de données
    $postC->InsertPost($cred);

    
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

if (isset($_POST['delete'])) {
    $postC = new PostC(); 
    $postIdToDelete = $_POST['delete'];
    $postToDelete = new Post($postIdToDelete, null, null, null, null, null);
    $postC->DeletePost($postToDelete);
}

if (isset($_POST['update'])) {
    $postC = new PostC();
    $postIdToUpdate = $_POST['update'];
    $updatedText = $_POST['updated_text'];

    $updatedImage = null;
    if (isset($_FILES['updated_image']) && $_FILES['updated_image']['error'] == 0) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["updated_image"]["name"]);

        if (move_uploaded_file($_FILES["updated_image"]["tmp_name"], $targetFile)) {
            $updatedImage = $targetFile;
        } else {
            echo "Une erreur s'est produite lors du téléchargement de la nouvelle image.";
            exit;
        }
    }

    $updatedVideo = null;
    if (isset($_FILES['updated_video']) && $_FILES['updated_video']['error'] == 0) {
        $targetDir = "uploads/";
        $targetVideo = $targetDir . basename($_FILES["updated_video"]["name"]);

        if (move_uploaded_file($_FILES["updated_video"]["tmp_name"], $targetVideo)) {
            $updatedVideo = $targetVideo;
        } else {
            echo "Une erreur s'est produite lors du téléchargement de la nouvelle vidéo.";
            exit;
        }
    }

    $postToUpdate = new Post($postIdToUpdate, $updatedImage, $updatedVideo, $updatedText, null);
    
 
    if ($postC instanceof PostC) {
        $postC->UpdatePost($postToUpdate);
    } else {
        echo "Erreur : La variable \$postC n'est pas correctement initialisée.";
        exit;
    }
}

$postC = new PostC();  
$messages = $postC->getMessages();

echo '<style>
body {
    
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  margin: 20px;
  background-color: #f7f7f7;
}

.search-container {
  
  margin-bottom: 50px;
}

.search-container form {
   
  display: flex;
  align-items: center;
}



#search {
  margin:40px;
  padding: 8px;
  border: 3px solid #ccc;
  border-radius: 12px;

  width: 600px; 

  
}

#search:focus {
  outline: none;
  border-color: #007bff;
}

input[type="submit"] {
  background-color: #007bff;
  color: #fff;
  padding: 8px 12px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #0056b3;
}

.post-comment {
  border: 1px solid #ddd;
  background-color: #fff;
  margin-bottom: 20px;
  padding: 15px;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.post {
  font-size: 18px;
  font-weight: bold;
  color: #333;
  margin-bottom: 10px;
}

.comment {
  color: #555;
}

</style>';




echo '<div class="search-container">
        <form action="recherche.php" method="get">
            <input type="text" id="search" name="search" placeholder="Rechercher les post avec commentaire ajouter votre nom .....">
            <input type="submit" value="Rechercher">
        </form>
      </div>
    </body>';


foreach ($messages as $message) {
    include 'indexpagepost.php';
}
?>


<?php





?>
