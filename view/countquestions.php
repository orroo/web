<?php

require_once '../config.php'; 

try {
    $db = config::getConnexion();
    $tableName = 'questions';

    $sql = "SELECT COUNT(*) AS questionCount FROM $tableName";
    
    $stmt = $db->query($sql);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $questionCount = $result['questionCount'];

    header('Content-Type: application/json');
    echo json_encode(['questionCount' => $questionCount]);

} catch (Exception $e) {
    header('HTTP/1.1 500 Internal Server Error');
    echo json_encode(['error' => $e->getMessage()]);
}

?>
