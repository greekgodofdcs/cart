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
    <h1 align="center"> Product Table Admin</h1>

    <table border="2">
        <tr>
            <td> Product Id </td>
            <td> Product category id </td>
            <td> Product sub category Id </td>
            <td> Product name </td>
            <td> Product price </td>
        </tr>
        <?php
            $con = mysqli_connect("localhost", "root", "", "test2");  
            $q="select * from product_master";          
            $result = mysqli_query($con, $q) or die("query fail");
            while ($row = mysqli_fetch_row($result)) {
            ?>
                <tr>
                    <td> <?php echo $row[0] ?> </td>
                    <td> <?php echo $row[1] ?></td>
                    <td> <?php echo $row[2] ?></td>
                    <td> <?php echo $row[3] ?></td>
                    <td> <?php echo $row[4] ?></td>
                </tr>
            <?php
            }
            ?>
    </table>
    </div>


</body>
</html>