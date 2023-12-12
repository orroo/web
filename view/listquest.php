<?php
include "../controller/sendquest.php";

$q = new questionsC ();
$tab = $q->listquest();

?> 
<link rel="stylesheet" href="questdash.css">
<div class="tabular--wrapper">
    <div class="table-container">
        <h1>list of questions</h1>
    
        <table>
            <thead>
            <tr>
                <th>type of question</th>
                <th>question text</th>
            </tr>
            </thead>

            <tbody>
        <?php
        foreach ($tab as $quest) {
        ?>

            <tr>
                <td><?= $quest['typeD']; ?></td>
                <td><?= $quest['questxt']; ?></td>
                <td>
                    <a href="deleteques.php?id=<?php echo $quest['typeD']; ?>">Delete</a>
                </td>
            </tr>
            </tbody>
        </thead>
        <?php
        }
        ?>

</table>
</div>
