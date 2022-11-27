<?php

    session_start();

    if (isset($_SESSION['user_type']) == 'admin'){
        header('location: admin/dashboard.php');
    }
    else if (isset($_SESSION['user_type']) == 'staff'){
        header('location: category/category.php');
    }
    else{
        header('location: login/login.php');
    }

?>