<?php 
    include '../Controller/nudes.php';
    $registerC=new registerC();
    $tab=$registerC->showUser();
?>
<button><a href="admin.html">Back to Dashboard</a></button>
<center>
    <h1>List of Users</h1>
</center>
<table border="2" align="center" width="70%">
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
</table>

<style>
    *{
    margin: 0;
    padding: 0;
    border: none;
    outline: none;
    box-sizing: border-box;
    font-family: "poppins",sans-serif;
}
form{
    margin-left: -150px;
}
input{
    text-decoration: none;
}
input:hover{
    text-decoration: underline;
}
a{
    text-decoration: none;
}
a:hover{
    text-decoration: underline;
}
.tabular--wrapper
{
    align-items: center;
    background: white;
    margin-top: 1rem ;
    border-radius: 10px;
    padding: 2rem;
}
.table-container
{
    width: 100%;

}
table
{
    width: 100%;
    border-collapse: collapse ;
}
thead
{
    background: rgb(166, 236, 134) ;
    color: white;
}
th
{
    padding: 15px;
    text-align: left;
}
tbody
{
    background: #f2f2f2;
}
td
{
    padding: 15px;
    font-size: 14px;
    color: #333;
}
tr:nth-child(even)
{
    background:white;
}
tfoot td
{
    padding: 15px;
}
.table-container button
{
    color: green;
    background: none;
    cursor: pointer;
}
.tabular--wrapper h1
{
    padding-left: 750px;
}
td a
{
    text-decoration: none;
    color: red;
}
td form input
{
    color: blue;
}
img {
    float: left;
    width:  100px;
    height: 100px;
    object-fit: cover;
}
</style>