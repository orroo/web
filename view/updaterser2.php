<?php

include_once '../controller/serviceC.php';
include_once '../model/service.php';

$error = "";

// create client
$service = null;


// create an instance of the controller
$serviceC = new serviceC();
$id=$_GET['id'];
$v=0;
if  (isset($_POST['av']) && ($_POST['av'] == 'y'))
{
    $v=1;
    
}
echo $v;
$service= new service(
    $id,
    $_POST['name'],
    $_POST['price'],
    $_POST['desc'],
    $v
);

$serviceC->updateser($service ,$id);

?>


<meta
     http-equiv="refresh"
     content="0;
     url='http://localhost/P/view/listeservice.php'"
/>