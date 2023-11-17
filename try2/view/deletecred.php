<?php
include '../Control/send.php';
$clientC = new credentialsC();
$clientC->deletecred($_GET["full_name"]);
header('Location:affiche.php');