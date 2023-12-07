<?php
    include_once '../controller/planC.php';
    include_once '../controller/relationC.php';

    $planC= new planC();
    $relationC=new relationC();
    $planC->deleteplan($_GET["id"]);
    $relationC->deleterelation($_GET["id"]);

?>

<meta
     http-equiv="refresh"
     content="0;
     url='http://localhost/P - Copy/view/listeplan.php'"
/>