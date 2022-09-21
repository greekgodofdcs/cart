<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

</head>

<body>
    <h1 align="center"> Login Page </h1>

    <div id="login">
    <table border="1" align="center">
        <form name="f" action="#" method="post" enctype="multipart/form-data">
            <tr>
                <td> username </td>
                <td> <input type="text" name="username"> </td>
            </tr>
            <tr>
                <td> password </td>
                <td> <input type="text" name="password"> </td>
            </tr>
            <tr>
                <td> <input type="submit" value="Login" name="submit"> </td>
                <td> <input type="reset" value="reset" name="reset"> </td>
            </tr>
        </form>
    </table>
    <h5 align="center"> Don't Have a Account ? <a href="register.php"> New Customer Registration </a></h5>
    </div>

</body>

</html>


<?php

$con = mysqli_connect("localhost", "root", "", "test2");
if ($con == false) {
    echo "<h1 align='center'> Some Problem with Connecting to Database </h1>";
} else {
    if (isset($_POST["submit"])) {

        $name = $_POST["username"];
        $password = $_POST["password"];

        $r1 = mysqli_query($con, "select * from admin where nm='$name' and ps='$password'");
        $c1 = mysqli_num_rows($r1);
        $r2 = mysqli_query($con, "select * from customer where cnm='$name' and pwd='$password'");
        $c2 = mysqli_num_rows($r2);
        if ($c1 != 1 && $c2 != 1) {
            echo "<h1 align='center'> Username and Password Is Incorrect </h1>";
        } else {
            if ($c1 == 1) {
                $data = mysqli_fetch_row($r1);
                $_SESSION["user_id"] = $data[0];
                
?>
                <script>
                    window.location.href = "admin_homepage.php";
                </script>
                <?php
            } else {
                $r3 = mysqli_query($con, "select * from customer where cnm='$name' and pwd='$password'");
                $c3 = mysqli_num_rows($r3);
                if ($c3 == 1) {
                    $data = mysqli_fetch_row($r3);
                    $_SESSION["user_id"] = $data[0];
                    $_SESSION["user_nm"] = $data[1];
                ?>
                    <script>
                        window.location.href = "customer_homepage.php";
                    </script>
                <?php
                }
            }
        }
    }
}


?>