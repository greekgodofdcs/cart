
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script>
        function mycart(product_id) {
            // alert("Product id: "+product_id);
            var qty = prompt("Enter Product Qty");
            if(qty>0 && qty<100){

                const xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function(){
                    if(this.readyState==4 && this.status==200){
                        // document.getElementById("abc").innerHTML=this.responseText;
                        alert("msg: "+this.responseText);
                    }
                    
                }
                xhttp.open("GET","ajax_handler.php?why=addcart&pid="+product_id+"&qty="+qty);
                xhttp.send();
            }else{
                alert("write appropriate value");
            }
        }
    </script>

</head>

<body>


    <div align="center">
        <table class="table container" border="1">
            <tr>
                <td style="padding: 10px;"> Product Id </td>
                <!-- <h1 id="abc"> waiting </h1> -->
                <form method="POST" action="#" onsubmit="c_change()">
                    <td style="padding: 10px;"> Category <select name="c">
                            <?php
                            $con = mysqli_connect("localhost", "root", "", "test2");
                            $r = mysqli_query($con, "select * from tbl_category");
                            while ($roww = mysqli_fetch_row($r)) {
                            ?>
                                <option value="<?php echo $roww[0] ?>"><?php echo $roww[1] ?> </option>
                            <?php
                            }
                            ?>
                        <!-- </select> <button type="submit"> Filter </button> </td> -->

                    <td style="padding: 10px;"> Sub Category <select name="sc">
                            <?php
                            $con = mysqli_connect("localhost", "root", "", "test2");
                            $r = mysqli_query($con, "select * from tbl_sub_category");
                            while ($roww = mysqli_fetch_row($r)) {
                            ?>
                                <option value="<?php echo $roww[0] ?>"><?php echo $roww[2] ?> </option>
                            <?php
                            }
                            ?>
                        </select> <button type="submit"> Filter </button> </td>
                </form>

                <td style="padding: 10px;"> product Name</td>
                <td style="padding: 10px;"> product Price </td>
                <td style="padding: 10px;"> Status </td>
            </tr>


            <?php
            $con = mysqli_connect("localhost", "root", "", "test2");

            if(isset($_POST["c"]) || isset($c)){
                if(isset($c)){
                    $_SESSION["c"] = $c;
                }else{
                    $_SESSION["c"] = $_POST["c"];
                }  
                // echo "c writeed";
            }else{
                $_SESSION["c"] = 1; 
                // echo "c not writeed";
            }
            if(isset($_POST["sc"]) || isset($sc)){
                if(isset($sc)){
                    $_SESSION["sc"] = $sc;
                }else{
                    $_SESSION["sc"] = $_POST["sc"];
                } 
                // echo "sc writeed";
            }else{
                $_SESSION["sc"] = 1; 
                // echo "sc not writeed";
            }
             $c = $_SESSION["c"];
             $sc = $_SESSION["sc"];
            // echo "<br> c: $c and sc: $sc <br>";

            $q = "select * from product_master where category_id='$c' and sub_category_id='$sc'";
        
            $result = mysqli_query($con, $q) or die("query fail");
            while ($row = mysqli_fetch_row($result)) {
            ?>
                <tr>
                    <td> <?php echo $row[0] ?> </td>
                    <td> <?php echo $row[1] ?></td>
                    <td> <?php echo $row[2] ?></td>
                    <td> <?php echo $row[3] ?></td>
                    <td> <?php echo $row[4] ?></td>
                    <td> <button onclick="mycart(<?php echo $row[0] ?>)"> Add To Cart </button></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>