<?php
include "../control/send.php";

$c = new credentialsC();
$tab = $c->listcred();

?>

<center>
    <h1>List of credentialsC</h1>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>full_name</th>
        <th>email</th>
        <th>address</th>
        <th>city</th>
        <th>state</th>
        <th>zip_code</th>
        <th>name_on_card</th>
        <th>credit_card_number</th>
        <th>exp_date</th>
        <th>cw</th>
    </tr>


    <?php
    foreach ($tab as $cred) {
    ?>




        <tr>
            <td><?= $cred['full_name']; ?></td>
            <td><?= $cred['email']; ?></td>
            <td><?= $cred['address']; ?></td>
            <td><?= $cred['city']; ?></td>
            <td><?= $cred['state']; ?></td>
            <td><?= $cred['zip_code']; ?></td>
            <td><?= $cred['name_on_card']; ?></td>
            <td><?= $cred['credit_card_number']; ?></td>
            <td><?= $cred['exp_date']; ?></td>
            <td><?= $cred['cw']; ?></td>
            <td align="center">
                <form method="POST" action="update.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $cred['full_name']; ?> name="fname">
                </form>
            </td>
            <td>
                <a href="deletecred.php?full_name=<?php echo $cred['full_name']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>