<?php
include '../Controller/nudes.php';
$registerC = new registerC();
$registerC->DeleteUser($_GET["id"]);
header('Location:ShowUser.php');
