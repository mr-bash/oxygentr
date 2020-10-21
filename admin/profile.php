    <!-- Start Header Section -->
    <?php require_once __DIR__ .'/../app/core/session.php'; ?>
    <?php require_once 'inc/top-header.php'; ?>
    <title><?php echo SITENAME; ?> - الملف الشخصي</title>
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
              $users = new profile();
              $user_found = false;
              if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['save_info'])) {

                $users->get_input($_POST['first_name'], $_POST['last_name'], $_POST['mail'], $_POST['username'], $_POST['old_pass'], $_POST['hid_pass'], $_POST['new_pass'], $_POST['new_pass2'], $_POST['id']);

              }
              if(isset($_GET['id']) and is_numeric($_GET['id'])) {
                $data = $users->select('*', 'admins', 'WHERE id = ?');
                $data->execute(array($_GET['id']));
                $data->rowCount();
                if($data->rowCount() > 0) {
                  $user_found = true;
                }

                if($user_found and isset($_GET['id']) and is_numeric($_GET['id'])) {
                  $d = $users->select('*', 'admins', 'WHERE id = ?');
                  $d->execute(array($_GET['id']));
                  $data_users = $d->fetch();

              
              ?>
                <div class="form-group">
                  <label for="first_name" class="col-sm-3 control-label">الأسم الأول</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" value="<?php if(isset($data_users['first_name'])) { echo $data_users['first_name']; } ?>" name="first_name" id="first_name" value="" placeholder="ادخل الأسم الأول">
                      <input type="hidden" value="<?php if(isset($data_users['id'])) { echo $data_users['id']; }  ?>" name="id" id="id">
                  </div>
                </div>

                <div class="form-group">
                  <label for="last_name" class="col-sm-3 control-label">الأسم الأخير</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" value="<?php if(isset($data_users['last_name'])) { echo $data_users['last_name']; } ?>" name="last_name" id="last_name" placeholder="ادخل الأسم الأخير">
                  </div>
                </div>

                <div class="form-group">
                  <label for="mail" class="col-sm-3 control-label">البريد الألكتروني</label>
                  <div class="col-sm-9">
                      <input type="email" class="form-control" value="<?php if(isset($data_users['email'])) { echo $data_users['email']; } ?>" name="mail" id="mail" placeholder="أدخل البريد الألكتروني">
                  </div>
                </div>

                <div class="form-group">
                  <label for="username" class="col-sm-3 control-label">أسم المستخدم</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" value="<?php if(isset($data_users['username'])) { echo $data_users['username']; } ?>" name="username" id="username" placeholder="أدخل أسم المستخدم">
                      <input type="hidden" class="form-control" value="<?php if(isset($data_users['username'])) { echo $data_users['username']; } ?>" name="old_user" id="old_user">
                  </div>
                </div>

                <div class="form-group">
                  <label for="old_pass" class="col-sm-3 control-label">كلمة المرور الحالية</label>
                  <div class="col-sm-9">
                      <input type="password" class="form-control" name="old_pass" id="old_pass" placeholder="أدخل كلمة المرور الحالية">
                      <input type="hidden" class="form-control" value="<?php if(isset($data_users['password'])) { echo $data_users['password']; } ?>" name="hid_pass" id="hid_pass">
                  </div>
                </div>

                <div class="form-group">
                  <label for="new_pass" class="col-sm-3 control-label">كلمة المرور جديدة</label>
                  <div class="col-sm-9">
                      <input type="password" class="form-control" name="new_pass" id="new_pass" placeholder="أدخل كلمة مرور جديدة">
                  </div>
                </div>

                <div class="form-group">
                  <label for="new_pass2" class="col-sm-3 control-label">تأكيد كلمة المرور الجديدة</label>
                  <div class="col-sm-9">
                      <input type="password" class="form-control" name="new_pass2" id="new_pass2" placeholder="أدخل كلمة مرور مرة أخرى للتأكيد">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-4 col-sm-6">
                    <button type="submit" name="save_info" class="btn btn-block btn-success" style="margin:20px 0;">حفظ</button>
                  </div>
                </div>
            </form>
            <?php 
              } else {
                messages::set_msg('danger', 'خطأ', 'عذرا هذا المستخدم <strong>غير موجود</strong>');
                echo messages::$msg_alert;
              }

            }
            ?>
        </div>
      </div>
        </div>
      </div>
    </div>
    <!-- Start Footer Page Section -->
    <?php require_once 'inc/footer.php'; ?>


