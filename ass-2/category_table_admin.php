<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div align="center">
    <h1 align="center"> Product Category Table Admin</h1>

    <table border="2">
        <tr>
        <td> Product  category id </td>
            <td> Product category name </td>
        </tr>
        <?php
            $con = mysqli_connect("localhost", "root", "", "test2");  
            $q="select * from tbl_category";          
            $result = mysqli_query($con, $q) or die("query fail");
            while ($row = mysqli_fetch_row($result)) {
            ?>
                <tr>
                <td> <?php echo $row[0] ?> </td>
                    <td> <?php echo $row[1] ?></td>
                </tr>
            <?php
            }
            ?>
    </table>
    </div>
</body>
</html>