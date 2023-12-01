<?php
    include_once '../control/sendquest.php';
    include_once '../model/addquest.php';

    $error = "";

    $questC = new questionsC();
    $ques = new questions (
        $_POST['typeD'],
        $_POST['questxt'],
       
    );

    $questC->addquest($ques);

    ?>