<?php
    include '../controller/serviceC.php';
    $serviceC=new serviceC();
    $liste=$serviceC->showservices();

?>

<a href="http://localhost/P/view/selectservice.html"><button>Return</button></a>
<h1>liste de service</h1>

<table border="2">
    <tr>
        <th>id de service</th> 
        <th>nom</th> 
        <th>prix</th> 
        <th>description</th>
        <th>available</th> 
        <th>update</th>
        <th>delete</th>
    </tr>

    <?php
        foreach($liste as $service)
        {
    ?>

    <tr>
            <td>
                <?php  echo $service['id'] ?>
            </td>
            <td>
                <?php  echo $service['nom'] ?>
            </td>
            <td>
                <?php  echo $service['prix'] ?>
            </td>
            <td>
                <?php  echo $service['description'] ?>
            </td>
            <td>
                <?php  if ($service['av']==1)
                            echo 'yes';
                        else 
                            echo 'no'
                ?>
            </td>
            <td>
                <form method="POST" action="http://localhost/P/view/updateservice.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $service['id']; ?> name="id">
                </form>
            </td>
            <td>
                <a href="http://localhost/P/view/deleteser.php?id=<?php echo $service['id']?>">Delete</a>
            </td>
    </tr>



    <?php
    }
    ?>

</table>
