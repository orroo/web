<?php
include "../control/facturec.php";

$f = new factureC();
$tab = $f->listfact();

?>
<link rel="stylesheet" href="admin_style1.css">
<div class="tabular--wrapper">
    <div class="table-container">
            <a href="http://localhost/try2/view/log.php">
             <span>download log</span>
            </a>
        <h1>list of facture</h1>
    
        <table>

            <thead>
            
            <tr>
                <th>id_facture</th>
                <th>id_client</th>
                <th>prix</th>
                <th>email</th>
                <th>delete</th>
            </tr>
            </thead>

            <tbody>
        <?php
        foreach ($tab as $fact) {
        ?>




            <tr>
                <td><?= $fact['id_facture']; ?></td>
                <td><?= $fact['id_client']; ?></td>
                <td><?= $fact['prix']; ?></td>
                <td><?= $fact['email']; ?></td>
                <td>
                    <a href="deletefact.php?id_facture=<?php echo $fact['id_facture']; ?>">Delete</a>
                </td>
            </tr>
            </tbody>
        </thead>
        <?php
        }
        ?>

</table>
</div>