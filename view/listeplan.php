<?php
    include '../controller/planC.php';
    $planC=new planC();
    $liste=$planC->showplans();

?>

<link rel="stylesheet" href="style_listeplan.css">
<a  href="http://localhost/P - Copy/view/selectplan.html"><button class="links">Return</button></a>
<a  href="http://localhost/P - Copy/view/listerelations.php"><button class="links">liste de relation client-service</button></a>
<center>
    <h1>liste de plan</h1>
</center>

<table border="2">
    <tr>
        <th>id plan</th> 
        <th>prix</th> 
        <th>type</th> 
        <th>id client</th>
        <th>update</th> 
        <th>delete</th>
    </tr>

    <?php
        foreach($liste as $plan)
        {
    ?>

    <tr>
            <td>
                <?php  echo $plan['id'] ?>
            </td>
            <td>
                <?php  echo $plan['prix'] ?>
            </td>
            <td>
                <?php  echo $plan['type'] ?>
            </td>
            <td>
                <?php  echo $plan['idc'] ?>
            </td>
            <td>
                <form method="POST" action="http://localhost/P%20-%20Copy/view/updateselectplan.php">
                    <input class="update" type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $plan['id']; ?> name="id">
                </form>
            </td>
            <td>
                <a href="deleteplan.php?id=<?php echo $plan['id'];?>"><button class="delete">Delete</button></a>
            </td>
    </tr>



    <?php
    }
    ?>

</table>
