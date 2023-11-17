<?php
    include_once '../controller/planC.php';

    $planC= new planC();
    $planC->deleteplan($_GET["id"]);

?>

<meta
     http-equiv="refresh"
     content="0;
     url='http://localhost/P/view/liste.php'"
/>