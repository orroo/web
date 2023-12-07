<?php
include '../controller/facturec.php';
$factureC = new factureC();
$factureC->deletefact($_GET["id_facture"]);
header('Location:affichefact.php');