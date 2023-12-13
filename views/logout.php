<?php
require_once '../model/User.php';
require_once '..\config.php';
include_once '../controller/nudes.php';



session_destroy();

header('location:login.php');

?>