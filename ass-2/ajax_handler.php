<?php
session_start();
if ($_GET["why"] == "addcart") {

    $userid = $_SESSION["user_id"];
    $qty = $_GET["qty"];
    $pid = $_GET["pid"];

    // $_COOKIE[$userid][$pid] = $qty;
    // echo $_COOKIE["my"]["qty"];

    setcookie($pid,$qty);
    echo "Success";
    
    // if ($_COOKIE[$userid][$pid] == $qty) {
    // print_r($_COOKIE);
    // } else {
        // echo "Error in adding Product";
    // }
}
