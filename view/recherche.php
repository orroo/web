<?php
include_once '../controller/PostC.php';


if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchTerm = $_GET['search'];

    $postC = new PostC();
    $results = $postC->searchPostsAndComments($searchTerm);

    // Affichez les résultats de la recherche
    foreach ($results as $row) {
     
        
    
        echo '<div class="post-container">';
        echo '<div class="post-header">';
        echo '<div class="user-info">';
        echo '<ion-icon name="person-sharp"></ion-icon>';
        echo '<span>' . $row['idUtilisateur'] . '</span>';
        echo '</div>';
        echo '<div class="post-details">';
        echo '<span class="post-date">Publié le ' . $row['datePublication'] . '</span>';
        echo '</div>';
        echo '</div>';
        echo '<div class="post-content">';
        echo '<p>' . $row['texte'] . '</p>';
        
        if (!empty($row['image'])) {
            echo '<img src="' . $row['image'] . '" alt="Image du post">';
        }

        if (!empty($row['video'])) {
            echo '<video width="1050" height="400" controls>';
            echo '<source src="' . $row['video'] . '" type="video/mp4">';
            echo '</video>';
        }

        echo '</div>'; // Close post-content

        echo '<div class="post-actions">';
        echo '<p>' . $row['idtt'] . ' a commenté : ' . $row['comments_texte'] . '</p>';

        ;
        echo '</div>'; // Close post-actions

        echo '</div>'; // Close post-container
    }
} else {
    echo "Aucune recherche effectuée ou recherche invalide.";
}
 

echo '<style> 


.post-container {
    
    width: 70%;
    margin: 20px auto;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.post-header {
    padding: 15px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 2px solid #ddd;
    background-color: #3498db;
    color: #fff;
}

.user-info ion-icon {
    font-size: 28px;
    margin-right: 12px;
}

.user-info span {
    font-weight: bold;
}

.post-details {
    display: flex;
    align-items: center;
}

.post-date {
    font-size: 16px;
    color: #eee;
}

.post-content {
    padding: 20px;
}

.post-content p {
    margin-bottom: 20px;
    line-height: 1.6;
}

.post-content img,
.post-content video {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.3);
}

.post-actions {
    padding: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top: 2px solid #ddd;
    background-color: #f2f2f2;
}

.post-actions p {
    margin: 0;
}


}</style>'







?>


