    <!-- Start Header Section -->
    <?php require_once __DIR__ .'/../app/core/session.php'; ?>
    <?php require_once 'inc/top-header.php'; ?>
    <title><?php echo SITENAME; ?> - أضافة عضو جديد</title>
    <?php require_once 'inc/header.php'; ?>
    
    <!-- Start Content Page Section -->
    <div class="container-fluid">
      <div class="row">
      <!-- Start Sidebar Page Section -->
        <div class="col-sm-3 col-md-2 sidebar">
          <?php require_once 'inc/sidebar.php'; ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> تعديل الملف الشخصي</h1>
          <div class="row">
            <div class="col-md-10">
              <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
              <?php
              $members = new members();
              $user_found = false;
              if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['add_member'])) {

                $members->get_input($_POST['first_name'], $_POST['last_name'], $_POST['mail'], $_POST['username'], $_POST['pass'], $_POST['confirm_pass'], 'add', '');

              }
              ?>
                <div class="form-group">
                  <label for="first_name" class="col-sm-3 control-label">الأسم الأول</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="first_name" id="first_name" value="<?php if(isset($_POST['first_name'])) { echo $_POST['first_name']; } ?>" placeholder="ادخل الأسم الأول">
                  </div>
                </div>

                <div class="form-group">
                  <label for="last_name" class="col-sm-3 control-label">الأسم الأخير</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="last_name" id="last_name" value="<?php if(isset($_POST['last_name'])) { echo $_POST['last_name']; } ?>" placeholder="ادخل الأسم الأخير">
                  </div>
                </div>

                <div class="form-group">
                  <label for="mail" class="col-sm-3 control-label">البريد الألكتروني</label>
                  <div class="col-sm-9">
                      <input type="email" class="form-control" name="mail" id="mail" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" placeholder="أدخل البريد الألكتروني">
                  </div>
                </div>

                <div class="form-group">
                  <label for="username" class="col-sm-3 control-label">أسم المستخدم</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="username" id="username" value="<?php if(isset($_POST['username'])) { echo $_POST['username']; } ?>" placeholder="أدخل أسم المستخدم">
                  </div>
                </div>

                <div class="form-group">
                  <label for="pass" class="col-sm-3 control-label">كلمة المرور</label>
                  <div class="col-sm-9">
                      <input type="password" class="form-control" name="pass" id="pass" placeholder="أدخل كلمة مرور">
                  </div>
                </div>

                <div class="form-group">
                  <label for="confirm_pass" class="col-sm-3 control-label">تأكيد كلمة المرور</label>
                  <div class="col-sm-9">
                      <input type="password" class="form-control" name="confirm_pass" id="confirm_pass" placeholder="أدخل كلمة المرور مرة أخرى">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-4 col-sm-6">
                    <button type="submit" name="add_member" class="btn btn-block btn-success" style="margin:20px 0;">حفظ</button>
                  </div>
                </div>
            </form>
        </div>
      </div>
        </div>
      </div>
    </div>
    <!-- Start Footer Page Section -->
    <?php require_once 'inc/footer.php'; ?>


