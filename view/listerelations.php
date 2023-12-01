<?php
    include '../controller/relationC.php';
    $relationC=new relationC();
    $liste=$relationC->showrelations();

?>
<link rel="stylesheet" href="style_liste.css">
<a href="http://localhost/P/view/liste.php"><button class="links">liste plan</button></a>
<a href="http://localhost/P/view/listeservice.php"><button class="links">liste service</button></a>

<center>
    <h1>liste des relation</h1>
</center>

<table border="2">
    <tr>
        <th>id de service</th> 
        <th>id de plan </th> 
        <th>id du client</th> 
        <th>liste d'achat du client</th> 
    </tr>

    <?php
        foreach($liste as $relation)
        {
    ?>

    <tr>
            <td>
                <?php  echo $relation['ids'] ?>
            </td>
            <td>
                <?php  echo $relation['idp'] ?>
            </td>
            <td>
                <?php  echo $relation['idc'] ?>
            </td>
            <td>
                <a  href='topdf.php?id=<?php echo $relation['idc'];?>' target="_blank"> <button class="delete">PDF</button> </a>
            </td>
    </tr>



    <?php
    }
    ?>

</table>
