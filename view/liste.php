<?php
    include '../controller/planC.php';
    $planC=new planC();
    $liste=$planC->showplans();

?>

<a href="http://localhost/P/view/select.html"><button>Return</button></a>
<h1>liste de plan</h1>

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
                <form method="POST" action="http://localhost/P/view/update.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $plan['id']; ?> name="id">
                </form>
            </td>
            <td>
                <a href="delete.php?id=<?php echo $plan['id'];?>">Delete</a>
            </td>
    </tr>



    <?php
    }
    ?>

</table>
