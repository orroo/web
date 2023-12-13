<?php
include '../controller/sendtest.php';
$tC = new testsC(); 
$tC->deletetest($_GET["idT"]);
header('Location:listtests.php');

?> 