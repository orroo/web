<?php 
    include '../controller/nudes.php';
    $registerC=new registerC();
    $tab=$registerC->showUser();
?>

<link rel="stylesheet" href="admin_style1.css">
<div class="tabular--wrapper">
    <div class="table-container">
        <a href="admin.html"><button class="links">Return</button></a>
        <h1>list of users</h1>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Image</th>
                    <th>bio</th>
                    <th>country</th>
                    <th>phone</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                foreach ($tab as $user) {
                ?>
                    <tr>
                        <td><?= $user['Username']; ?></td>
                        <td><?= $user['Email']; ?></td>
                        <td><?= $user['Password']; ?></td>
                        <td><?php echo '<img src="data:image/png;base64,'.base64_encode($user['img']).'"/>';?></td>
                        <td><?= $user['bio']; ?></td>
                        <td><?= $user['country']; ?></td>
                        <td><?= $user['phone']; ?></td>
                        <td align="center">
                            <form method="POST" action="UpdateUser.php" enctype="multipart/form-data">
                                <input type="submit" name="update" value="update">
                                <input type="hidden" value=<?PHP echo $user['Username']; ?> id="Username" name="Username">
                            </form>
                        </td>
                        <td>
                            <a href="DeleteUser.php?id=<?php echo $user['Username']; ?>">Delete</a> 
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>




<style>
img {
    float: left;
    width:  100px;
    height: 100px;
    object-fit: cover;
}
</style>