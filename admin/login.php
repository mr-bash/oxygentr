    <!-- Start Header Section -->
    <?php require_once __DIR__ .'/../app/core/init.php'; ?>
    <?php require_once 'inc/top-header.php'; ?>
    <title><?php echo SITENAME; ?> - تسجيل الدخول</title>
    <?php require_once 'inc/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="space1">
                <form class="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="alert-msg">
                <?php
                if(isset($_SESSION['loged']) and $_SESSION['loged'] == true) {
                    
                    header('Location: index.php');
                }
                if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['login'])) {

                    $log = new login();

                    $log->get_input($_POST['user'], $_POST['pass']);
                
                }
                
                ?>
                </div>
                    <h4 class="text-center my-head">الدخول للوحة التحكم</h4>
                    <input class="form-control focus" type="text" name="user" placeholder="Username" autocomplete="off" my-data=''>
                    <i class="fas fa-user-tie i-user"></i>
                    <input class="form-control" type="password" name="pass" placeholder="Password" autocomplete="off" my-data=''>
                    <i class="fas fa-lock i-pass"></i>
                    <input class="btn btn-success btn-block myBtn" name="login" type="submit" value="دخول">
                </form>
            </div>
        </div>
    </div>
</div>
    <!-- Start Footer Page Section -->
    <?php require_once 'inc/footer.php'; ?>