<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> admin </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <script>
        function change_c(cid){
            // alert("category change");
            // document.getElementById("c").value=cid;
            // alert("form written");
            // var date = new Date();
            // date.setTime(date.getTime()+(1*24*60*60*1000));
            // var expire = "; expires="+date.toGMTString();
            // alert(document.cookie);
            // document.location.href="admin_homepage.php";
            // alert("cookie created");
        }
    </script>


</head>

<body>
    <h5 align="right"> <a href="login.php"> Admin </a> </h5>

    <div align="center">

        <h1> Add Product </h1>
        <form name="f" action="#" method="POST">
            <table>
                <tr>
                    <td> Product Name : </td>
                    <td><input type="text" name="nm" id="nm"></td>
                </tr>
                <tr>
                    <td> Category Name : </td>
                    <td>
                        <select name="category" onchange="change_c(this.value)">
                            <?php
                            $con = mysqli_connect("localhost", "root", "", "test2");
                            $q = "select * from tbl_category";
                            $result = mysqli_query($con, $q) or die("query fail");
                            while ($row = mysqli_fetch_row($result)) {
                            ?>
                                <option value="<?php echo $row[0] ?>"> <?php echo $row[1] ?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <form action="#" method="POST" name="f">
                    <input type="hidden" id="c" name="c" value="c"/>
                </form>
                <tr>
                    <td> Subcategory Name : </td>
                    <td>
                    <select name="sub_category">
                            <?php
                            $con = mysqli_connect("localhost", "root", "", "test2");
                            
                            $q = "select * from tbl_sub_category";
                            $result = mysqli_query($con, $q) or die("query fail");
                            while ($row = mysqli_fetch_row($result)) {
                            ?>
                                <option value="<?php echo $row[0] ?>"> <?php echo $row[2] ?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Product Price :</td>
                    <td><input type="number" name="price" id="de"></td>
                </tr>
                <tr>
                    <td><br><input type="submit" value="Add" name="submit"></td>
                    <td><br><input type="reset" value="reset" name="reset"></td>
                </tr>
            </table>
        </form>
    </div><br><br>



    <!-- Other Pages included here -->
    <div>
        <?php
        include 'shopping_report_admin.php';
        ?><br><br>
        <?php
        include 'product_table_admin.php';
        ?><br><br>
        <?php
        include 'category_table_admin.php';
        ?><br><br>
        <?php
        include 'sub_category_table_admin.php';
        ?><br><br>
    </div>

</body>

</html>

<?php

if (isset($_POST["submit"])) {
    $cid = $_POST["category"];
    $sid = $_POST["sub_category"];
    $nm = $_POST["nm"];
    $price = $_POST["price"];

    $con = mysqli_connect("localhost", "root", "", "test2");

    $result = mysqli_query($con, "INSERT INTO `product_master` (`p_id`, `category_id`, `sub_category_id`, `nm`, `price`) VALUES (NULL, '$cid', '$sid' ,'$nm', '$price');") or die("insert query fail");

    if ($result) {
        // echo "<br> <h1> Product Added Successfullly </h1>";
?>
        <script>
            alert("Product Added Successfully");
            window.location.href = "admin_homepage.php";
        </script>
    <?php
    } else {
        // echo "<br> <h1> Something went wrong </h1>";
    ?>
        <script>
            alert("Product Not Added");
        </script>
<?php
    }
}

?>