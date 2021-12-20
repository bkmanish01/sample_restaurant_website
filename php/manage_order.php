<?php
include "db_conn.php";
session_start();

/* Manish Bishowkarma
   manage_order.php, 12-09-2021 */

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['submit'])){
        if(isset($_SESSION['cart'])){
            //Count items
            $myItems = array_column($_SESSION['cart'], 'Item_Name');
            if(in_array($_POST['name'], $myItems)){
                echo "<script>alert('Item already Added!');window.location.href='welcome.php#section2';</script>";
            }
            else {
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('Item_Name' => $_POST['name'],
                                                'Item_Price' => $_POST['price'],
                                                'Item_Qty' => $_POST['qty']
                                            );
                echo "<script>window.location.href='welcome.php#section2';</script>";
            }
        }
        else {
            $_SESSION['cart'][0] = array(
                'Item_Name' => $_POST['name'],
                'Item_Price' => $_POST['price'],
                'Item_Qty' => $_POST['qty']
            );
            echo "<script>window.location.href='welcome.php#section2';</script>";
        }
    }

    if(isset($_POST['Remove_Item'])){
        foreach($_SESSION['cart'] as $key => $value){
            if($value['Item_Name'] == $_POST['Item_Name']){
                 unset($_SESSION['cart'][$key]);
                 $_SESSION['cart'] = array_values($_SESSION['cart']);
                 echo "<script>window.location.href='cart.php';</script>";
            }
        }
    } 
    // Clear all
    if(isset($_POST['clear_all'])){
        if(empty($_SESSION['cart'])){
            echo "<script>window.location.href='cart.php';</script>";
        }
        else {
            foreach($_SESSION['cart'] as $key => $value){
                unset($_SESSION['cart']);
                echo "<script>window.location.href='cart.php';</script>";
            }
        }
    } 
}
?>