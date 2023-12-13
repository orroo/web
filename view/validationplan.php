<?php

include_once '../controller/planC.php';
include_once '../model/plan.php';

include_once '../controller/serviceC.php';
include_once '../model/service.php';


include_once '../controller/relationC.php';
include_once '../model/relation.php';

$error = "";

// create client
$plan = null;

// create an instance of the controller
$planC = new planC();
$serviceC=new serviceC();
$relationC = new relationC();
$prix=0;
$type=0;



$id=$planC->MI() +1;
$idc=$_SESSION['Username'];
$ntype=0;
$cc=0;

$liste= $serviceC->showservices();

foreach($liste as $service)
{
    if  (isset($_POST[$service['nom']]) && $_POST[$service['nom']] == 'y')
    {
        $relation= new relation($idc,0,$id);
        $relationC->addrelation($relation,$service['nom']);
        $prix+=$service['prix'];
        $type+=2**$ntype;
        echo $type;
        $relation=null;
        $cc++;
    }
    
    $ntype++;


}


if ( $cc!=0)
{
$plan = new plan($id,$prix,$type,$idc);
$_SESSION['idplan']=$id;
$planC->addplan($plan);
echo '
<meta
     http-equiv="refresh"
     content="0;
     url=proceed.php"
/>';
}
else 
{
    echo '
    <h1>RIEN est selectionne</h1>
    <br>
    <h1>veuillez selectionne une option</h1>
<meta
     http-equiv="refresh"
     content="5;
     url=plan.php"
/>';
}
?>

