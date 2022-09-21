<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script>
        function mydate(){
            alert("change");
        }
    </script>

</head>

<body>

    <h1 align="center"> Shopping Cart Report </h1>

    <div align="center">
        <table border="2">
            <tr>
                <td style="padding: 10px;"> index</td>
                <td style="padding: 10px;">  costomer id</td>
                <td style="padding: 10px;">  product id</td>
                <td style="padding: 10px;">  product qty</td>
                <form method="post" action="#" onsubmit="mydate()">
                <td style="padding: 10px;"> <input type="date" name="mydate"/> <button type="submit"> sort on Date </button> </td>
                </form>
            </tr>
            <?php
            $con = mysqli_connect("localhost", "root", "", "test2");
            if(isset($_POST["mydate"])){
                //echo "post there";
                $mydate=$_POST["mydate"];
                $q = "select * from mycart where date='$mydate'";
            }else{
                //echo "post not there";
                $q = "select * from mycart";
            }
            
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