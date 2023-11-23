<?php
include '../Control/facturec.php';
$factureC = new factureC();
$factureC->deletefact($_GET["id_facture"]);
header('Location:affichefact.php');