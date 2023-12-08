<?php
include "../control/sendtest.php";

$t = new testsC();
$tab = $t->listtest();

?> 
<link rel="stylesheet" href="testsdash.css">
<div class="tabular--wrapper">
    <div class="table-container">
        <h1>list of tests</h1>
    
        <table>

            <thead>
            
            <tr>
                <th>type</th>
                <th>taille</th>
                <th>number</th>
            </tr>
            </thead>

            <tbody>
        <?php
        foreach ($tab as $test) {
        ?>

            <tr>
                <td><?= $test['type']; ?></td>
                <td><?= $test['taille']; ?></td>
                <td><?= $test['idT']; ?></td>
                <td align="center">
                    <form method="POST" action="http://localhost/TEST/view/update.php">
                        <input type="submit" name="update" value="Update" class="update">
                        <input type="hidden" value=<?PHP echo $test['type']; ?> type="id">
                    </form>
                </td>
                <td>
                    <a href="delete.php?idT=<?php echo $test['idT']; ?>">Delete</a>
                </td>
            </tr>
            </tbody>
        </thead>
        <?php
        }
        ?>

</table>
</div>
