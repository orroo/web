<?php
    include_once '../controller/serviceC.php';

    $serviceC= new serviceC();
    $serviceC->deleteservice($_GET["id"]);

?>

<meta
     http-equiv="refresh"
     content="0;
     url='listeservice.php'"
/>