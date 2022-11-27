<?php

    require_once '../classes/supplier.class.php';

    session_start();

    if (!isset($_SESSION['logged-in'])){
        header('location: ../login/login.php');
    }

    $suppliers = new Suppliers;
    if(isset($_GET['id'])){
        if($suppliers->delete($_GET['id'])){

            header('location: supplier.php');
        }
    }
?>