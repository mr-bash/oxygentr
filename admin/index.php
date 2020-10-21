    <!-- Start Header Section -->
    <?php
      require_once __DIR__ .'/../app/core/session.php';
      require_once 'inc/top-header.php';
      if(isset($_SESSION['loged']) and $_SESSION['loged'] == true) {

        

    ?>
    <title><?php echo SITENAME; ?> - الصفحة الرئيسية</title>
    <?php require_once 'inc/header.php'; ?>

    <!-- Start Content Page Section -->
    <div class="container-fluid">
      <div class="row">
      <!-- Start Sidebar Page Section -->
        <div class="col-sm-3 col-md-2 sidebar">
          <?php require_once 'inc/sidebar.php'; ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="position: relative;">
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> لوحة التحكم</h1>
          <span class="home-dash">أدارة موقع مجموعة أوكسجين</span>
        </div>
      </div>
    </div>
    <!-- Start Footer Page Section -->
    <?php 
    
    require_once 'inc/footer.php';

      } else {
        header('Location: login.php');
      }
    
    ?>


