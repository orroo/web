<?php
include '../control/sendtest.php';
$tC = new testsC(); 
$tC->deletetest($_GET["idT"]);
header('Location:listtests.php');

?> 