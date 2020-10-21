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
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> تعديل مستخدم</h1>
          <div class="row">
            <div class="col-md-10">
            <?php
              $user_found = false;
              $members = new members();
              
              if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['edit_member'])) {

                $members->get_input($_POST['first_name'], $_POST['last_name'], $_POST['mail'], $_POST['username'], $_POST['pass'], $_POST['confirm_pass'], 'edit', $_POST['id']);

              }

              if(isset($_GET['id']) and is_numeric($_GET['id'])) {
              $res = $members->select('*', 'admins', 'WHERE id = ?');
              $res->execute(array($_GET['id']));
              if($res->rowCount() > 0) {
                $user_found = true;
              }

              if($user_found and isset($_GET['id']) and is_numeric($_GET['id'])) {
                $member_info = $members->select('*', 'admins', 'WHERE id = ?');
                $member_info->execute(array($_GET['id']));
                $data = $member_info->fetch();
              
              ?>
              <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                  <label for="first_name" class="col-sm-3 control-label">الأسم الأول</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $data['first_name']; ?>" placeholder="ادخل الأسم الأول">
                      <input type="hidden"name="id" value="<?php echo $data['id']; ?>" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="last_name" class="col-sm-3 control-label">الأسم الأخير</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $data['last_name']; ?>" placeholder="ادخل الأسم الأخير">
                  </div>
                </div>

                <div class="form-group">
                  <label for="mail" class="col-sm-3 control-label">البريد الألكتروني</label>
                  <div class="col-sm-9">
                      <input type="email" class="form-control" name="mail" id="mail" value="<?php echo $data['email']; ?>" placeholder="أدخل البريد الألكتروني">
                  </div>
                </div>

                <div class="form-group">
                  <label for="username" class="col-sm-3 control-label">أسم المستخدم</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="username" id="username" value="<?php echo $data['username']; ?>" placeholder="أدخل أسم المستخدم">
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
                    <button type="submit" name="edit_member" class="btn btn-block btn-success" style="margin:20px 0;">حفظ</button>
                  </div>
                </div>
            </form>
            <?php
              } else {
                messages::set_msg('danger', 'خطأ', 'هذا المستخدم <strong>غير موجود</strong>');
                echo messages::$msg_alert;
              }

            } else {
            ?>
            <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                  <label for="first_name" class="col-sm-3 control-label">الأسم الأول</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $_POST['first_name']; ?>" placeholder="ادخل الأسم الأول">
                      <input type="hidden"name="id" value="<?php echo $_POST['id']; ?>" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="last_name" class="col-sm-3 control-label">الأسم الأخير</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $_POST['last_name']; ?>" placeholder="ادخل الأسم الأخير">
                  </div>
                </div>

                <div class="form-group">
                  <label for="mail" class="col-sm-3 control-label">البريد الألكتروني</label>
                  <div class="col-sm-9">
                      <input type="email" class="form-control" name="mail" id="mail" value="<?php echo $_POST['mail']; ?>" placeholder="أدخل البريد الألكتروني">
                  </div>
                </div>

                <div class="form-group">
                  <label for="username" class="col-sm-3 control-label">أسم المستخدم</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="username" id="username" value="<?php echo $_POST['username']; ?>" placeholder="أدخل أسم المستخدم">
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
                    <button type="submit" name="edit_member" class="btn btn-block btn-success" style="margin:20px 0;">حفظ</button>
                  </div>
                </div>
            </form>
            <?php
            }
            ?>
        </div>
      </div>
        </div>
      </div>
    </div>
    <!-- Start Footer Page Section -->
    <?php require_once 'inc/footer.php'; ?>


