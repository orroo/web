<?php
include '../control/sendquest.php';
$qq = new questionsC();
$qq->deleteques($_GET["id"]);
header('Location:listquest.php');
?> 
