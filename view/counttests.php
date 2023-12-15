<?php

require_once '../connexion.php'; 

try {
    $db = config::getConnexion();
    $tableName = 'tests';

    $sql = "SELECT COUNT(*) AS testCount FROM $tableName";
    
    $stmt = $db->query($sql);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $testCount = $result['testCount'];

    header('Content-Type: application/json');
    echo json_encode(['testCount' => $testCount]);

} catch (Exception $e) {
    header('HTTP/1.1 500 Internal Server Error');
    echo json_encode(['error' => $e->getMessage()]);
}
?>
