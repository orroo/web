<?php

include_once '../controller/planC.php';
include_once '../model/plan.php';

$error = "";

// create client
$plan = null;

// create an instance of the controller
$planC = new planC();
$prix=0;
$type=0;

if  (isset($_POST['med']) && $_POST['med'] == 'y')
{
    $prix+=60;
    $type+=1;
}
if (isset($_POST['test']) && $_POST['test'] == 'y')
{
    $prix+=0;
    $type+=2;
}
if (isset($_POST['psy']) && $_POST['psy'] == 'y')
{
    $prix+=60;
    $type+=4;
}
if (isset($_POST['ther']) && $_POST['ther'] == 'y')
{
    $prix+=60;
    $type+=8;
}

$id=$_GET['id'];
$plan = new plan($id,$prix,$type,"01");
var_dump($plan);
$planC->updateplan($plan , $id);
var_dump($plan);

?>

<meta
     http-equiv="refresh"
     content="0;
     url='http://localhost/P/view/liste.php'"
/>