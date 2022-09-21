<?php  session_start();  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <h3> <a href="customer_homepage.php"> Back to homepage </a> </h3>

    <h1 align="center"> My Cart </h1><br><br><br>

    <div class="container">
        <table class="container" align="center" border="1">
            <tr>
                <td> Sub total</td>
                <td align="right"> <?php echo get_subtotal(); ?></td>
                <td align="right"> <button class=" btn btn-outline-success"> Goto Checkout </button></td>
            </tr>
        </table>
    </div>
    <br><br>
    <div class="container">
        <table border="1" class="table container">
            <tr>
                <td> <b> Product Name </b> </td>
                <td> <b> Price </b></td>
                <td> <b> </b> </td>
                <td> <b> Qty </b> </td>
                <td> <b> </b> </td>
                <td> <b> Total </b> </td>
            </tr>
            <?php
            foreach ($_COOKIE as $key => $value) {
            ?>
                <tr>
                    <td> <?php $nm = get_product_nm($key);
                            echo $nm; ?> </td>
                    <td> <?php $price = get_product_price($key);
                            echo $price; ?> </td>
                    <td> * </td>
                    <td> <?php echo $value ?> </td>
                    <td> = </td>
                    <td> <?php echo $value * $price;
                            if (($value * $price) > 0) {
                                if(isset($_SESSION["subtotal"])){
                                    $_SESSION["subtotal"] = $_SESSION["subtotal"] + ($value * $price);
                                    // echo "dsd";
                                    // $_SESSION["subtotal"] = 0;
                                }else{
                                    $_SESSION["subtotal"] = 0;
                                    // echo "sdsd";
                                }
                               
                            }  ?> </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>


</body>

</html>

<?php

$subtotal;



function get_subtotal(){
    return $_SESSION["subtotal"];
}

function get_connection()
{
    return mysqli_connect("localhost", "root", "", "test2");
}

function get_product_nm($product_id)
{
    $conn = get_connection();
    $result = mysqli_query($conn, "select * from product_master where p_id=$product_id") or die(myerror());
    while ($row = mysqli_fetch_row($result)) {
        return $row[3];
    }
}

function get_product_price($product_id)
{
    $conn = get_connection();
    $result = mysqli_query($conn, "select * from product_master where p_id=$product_id") or die(myerror());
    while ($row = mysqli_fetch_row($result)) {
        return $row[4];
    }
}

function myerror()
{
    echo "<br>";
}

?>