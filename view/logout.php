<?php
require_once '../model/User.php';
require_once '../connexion.php';
include_once '../controller/nudes.php';

unset($_SESSION['admin']);

session_destroy();


header('location:login.php');

?>