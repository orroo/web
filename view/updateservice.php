<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleser.css">
    <title>Document</title>
</head>
<body>
    <section>
        <form id="servform" action="http://localhost/P/view/updaterser2.php?id=<?php echo $_POST['id'] ?>" method="post" onsubmit="return VERIFSER()">
            <table>
                <tr>
                    <td>
                        <a>set the name for the service</a>
                    </td>
                    <td>
                        <input type="text" name="name" id="name">
                    </td>
                </tr>
                <tr>
                    <td>
                        <a>set the price for the service</a>
                    </td>
                    <td>
                        <input type="number" name="price" id="price">
                    </td>
                </tr>
                <tr>
                    <td>
                        <a>set a description for the service</a>
                    </td>
                    <td>
                        <textarea  rows="5" cols="30" id="desc" form="servform" name="desc"></textarea>
                    </td>
                </tr>
                <tr>

                    <td>
                        <a>the service is available ?</a>
                    </td>
                    <td>
                            <label class="container">
                                <input type="checkbox" id="av" name="av" value="y" checked>
                                <span class="checkmark"></span>
                            </label>
                    </td>
                </tr>



                <tr>
                    <td>
                        <input type="submit" value="update">
                        
                    </td>
                    <td>
                        <input type="reset" value="Clear">
                    </td>
                </tr>

            
            </table>
        </form>
    </section>
</body>
<script src="../controller/selectser.js"></script>
</html>