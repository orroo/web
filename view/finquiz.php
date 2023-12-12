<?php
require_once '../connexion.php';
    if ( isset($_GET['score']))
    {
        $score=$_GET['score'];
        $_SESSION['score']=$score;
        echo 'ok';
        if ($score==2)
        {
            $pdf='intensivepdf.php';
        }
        if ($score==1)
        {
            $pdf='moderatepdf.php';
        }
        if ($score==0)
        {
            $pdf='healthypdf.php';
        }

    }
    else 
    {
        header('location:quiz.html');
    }
?>


<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styling.css">

    <title>TEST</title>
</head>
<body>

<div class="quiz-container" id="quiz">
    <div class="quiz-header">
        
    <a href="<?php echo $pdf; ?>" target="_blank"><button>print your test results</button></a>
    <a href="test.php"><button>return to main page</button></a>
    </div>
</div>