<?php
    include '../controller/serviceC.php';
    $serviceC=new serviceC();
    $liste=$serviceC->showservices();

?>

<link rel="stylesheet" href="admin_style1.css">
<div class="tabular--wrapper">
    <div class="table-container">
        <a href="admin.html"><button class="links">Return</button></a>
        <a href="listerelations.php"><button class="links">liste de relation client-service</button></a>
        <h1>liste de service</h1>
        <table>

            <thead>
            
                <tr>
                    <th>id de service</th> 
                    <th>nom</th> 
                    <th>prix</th> 
                    <th>description</th>
                    <th>available</th> 
                    <th>update</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
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
                            <form method="POST" action="updateservice.php">
                                <input class="update" type="submit" name="update" value="Update">
                                <input type="hidden" value=<?PHP echo $service['id']; ?> name="id">
                            </form>
                        </td>
                        <td>
                            <a href="deleteser.php?id=<?php echo $service['id']?>"> <button class="delete">Delete</button></a>
                        </td>
                </tr>



                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>










