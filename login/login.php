<?php
    $page_title = 'Shoestocks - Login';

    require_once '../classes/account.class.php';

    session_start();

    if(isset($_POST['username']) && isset($_POST['password'])){

        $account = new Account;
        $account->username = htmlentities($_POST['username']);
        $account->user_password = htmlentities($_POST['password']);
        $res = $account->validate();
        if($res){
            $_SESSION['logged-in'] = $res['username'];
            $_SESSION['fullname'] = $res['firstname'].' '.$res['lastname'];
            $_SESSION['user_type'] = $res['type'];
            if($res['type'] == 'admin'){
                header('location: ../admin/dashboard.php');
            }else{
                header('location: ../category/category.php');
            }
        }

        $error = 'Invalid username/password. Try again.';
    }

    require_once '../includes/header.php';

?>
    <div class="login-container">
        <form class="login-form" action="login.php" method="post">
            <div class="logo-details">
                <i class='bx bxl-stripe'></i>
                <span class="logo-name">shoestocks</span>
            </div>
            <hr class="divider">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter username" required tabindex="1">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter password" required tabindex="2">
            <input class="button" type="submit" value="Login" name="login" tabindex="3">
            <?php

                if(isset($error)){
                    echo '<div><p class="error">'.$error.'</p></div>';
                }

            ?>
        </form>
    </div>

<?php
    require_once '../includes/footer.php';
?>