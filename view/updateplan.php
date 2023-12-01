<?php

include_once '../controller/planC.php';
include_once '../model/plan.php';

include_once '../controller/relationC.php';
include_once '../model/relation.php';

$error = "";

// create client
$plan = null;

// create an instance of the controller
$planC = new planC();
$relationC = new relationC();
$relation=null;
$prix=0;
$type=0;

$id=$_GET['id'];

$relationC->deleterelation($id);

$idc="1";

if  (isset($_POST['med']) && $_POST['med'] == 'y')
{
    $relation= new relation($idc,0,$id);
    $relationC->addrelation($relation,"meditation");
    $prix+=60;
    $type+=1;
    $relation=null;
}
if (isset($_POST['test']) && $_POST['test'] == 'y')
{
    $relation= new relation($idc,0,$id);
    $relationC->addrelation($relation,"test");
    $prix+=0;
    $type+=2;
    $relation=null;
}
if (isset($_POST['psy']) && $_POST['psy'] == 'y')
{
    $relation= new relation($idc,0,$id);
    $relationC->addrelation($relation,"psychiatry");
    $prix+=60;
    $type+=4;
    $relation=null;
}
if (isset($_POST['ther']) && $_POST['ther'] == 'y')
{
    $relation= new relation($idc,0,$id);
    $relationC->addrelation($relation,"therapy");
    $prix+=60;
    $type+=8;
    $relation=null;
}

$plan = new plan($id,$prix,$type,$idc);
var_dump($plan);
$planC->updateplan($plan , $id);
var_dump($plan);

?>

<meta
     http-equiv="refresh"
     content="0;
     url='http://localhost/P/view/liste.php'"
/>