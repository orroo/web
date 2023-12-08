<?php
    include_once '../control/sendquest.php';
    include_once '../model/addquest.php';
    require_once '../config.php';

    $error = "";

    $questC = new questionsC();
    $ques = new questions (
        $_POST['qid'],
        $_POST['typeD'],
        $_POST['questxt'],
       
    );

    $questC->addquest($ques);

    ?>