<?php
include "db_conn.php";
session_start();

/* Manish Bishowkarma
confirm.php, 12-09-2021 */


if(isset($_POST['order_place'])){
    $_SESSION['c_type'] = $_POST['card_type'];
    $_SESSION['c_num'] = $_POST['card_num'];
    $_SESSION['c_holder'] = $_POST['card_holder'];
    $_SESSION['c_expiry'] = $_POST['card_expiry'];
    $_SESSION['c_cvc'] = $_POST['card_cvc'];
    if(empty($_POST['card_num']) || empty($_POST['card_holder']) || empty($_POST['card_expiry']) || 
        empty($_POST['card_cvc'])){
        echo "<script>alert('Please enter your card information!');window.location.href='payment.php#section3';</script>";
    }
    else {
        if(isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $key => $value){
                unset($_SESSION['cart']);
            }
            echo "<script>alert('Order placed successful! Thank you.');window.location.href='welcome.php';</script>";
        }
        else {
            echo "<script>alert('No item found for order! Please go back to order page.');window.location.href='welcome.php#section2';</script>";
        }
    }
}
if(isset($_POST['cash_on'])){
    if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $key => $value){
            unset($_SESSION['cart']);
        }
        echo "<script>alert('Order placed successful! Thank you.');window.location.href='welcome.php';</script>";  
    }
    else {
        echo "<script>alert('No item found for order! Please go back to order page.');window.location.href='welcome.php#section2';</script>";
    }
}
?>



