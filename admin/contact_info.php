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
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> معلومات التواصل</h1>
              <div class="row">
                <div class="col-md-10">
                  <?php
                  
                  $con_info = new inbox();
                  $ox = $con_info->select('*', 'contact');
                  $ox->execute(array());
                  $info = $ox->fetch();
                  if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['update'])) {

                    $update = $con_info->update('contact', 'address = ?, phone1 = ?, phone2 = ?, email = ?, facebook = ?, twitter = ?, instagram = ?, youtube = ?, behance = ?, whatsapp = ?');
                    if($update->execute(array($_POST['adress'], $_POST['phone1'], $_POST['phone2'], $_POST['email'], $_POST['face'], $_POST['twitter'], $_POST['insta'], $_POST['youtube'], $_POST['behance'], $_POST['whats']))) {
                      messages::set_msg('success', ':)', 'تم <strong>التعديل</strong>');
                      $con_info->redirecr_page(messages::$msg_alert, 'contact_info.php', 2);
                      exit();
                    } else {
                      messages::set_msg('danger', 'خطأ', 'مشكلة في <strong>النظام</strong>');
                      $con_info->redirecr_page(messages::$msg_alert, 'contact_info.php', 2);
                    }
                  }
                  
                  ?>
                  <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                    <div class="form-group">
                      <label for="adress" class="col-sm-2 control-label">العنوان</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="adress" id="adress" value="<?php echo $info['address']; ?>" placeholder="عنوان فرع مجموعة أوكسجين">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="phone1" class="col-sm-2 control-label">هاتف 1</label>
                      <div class="col-sm-4">
                          <input type="text" class="form-control" name="phone1" id="phone1" value="<?php echo $info['phone1']; ?>" placeholder="رقم الهاتف 1">
                      </div>
                      <label for="phone2" class="col-sm-2 control-label">هاتف 2</label>
                      <div class="col-sm-4">
                      <input type="text" class="form-control" name="phone2" id="phone2" value="<?php echo $info['phone2']; ?>" placeholder="رقم الهاتف 2">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="email" class="col-sm-2 control-label">البريد الألكتروني</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="email" id="email" value="<?php echo $info['email']; ?>" placeholder="البريد الألكتروني الخاص بالموقع">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="face" class="col-sm-2 control-label">Facebook</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="face" id="face" value="<?php echo $info['facebook']; ?>" placeholder="حساب الفيس بوك الخاص بالشركة">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="twitter" class="col-sm-2 control-label">Twitter</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="twitter" id="face" value="<?php echo $info['twitter']; ?>" placeholder="حساب تويتر الخاص بالشركة">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="insta" class="col-sm-2 control-label">Instagram</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="insta" id="insta" value="<?php echo $info['instagram']; ?>" placeholder="حساب انستاجرام الخاص بالشركة">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="youtube" class="col-sm-2 control-label">Youtube</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="youtube" id="youtube" value="<?php echo $info['youtube']; ?>" placeholder="حساب يوتيوب الخاص بالشركة">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="behance" class="col-sm-2 control-label">Behance</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="behance" id="behance" value="<?php echo $info['behance']; ?>" placeholder="حساب بيهانس الخاص بالشركة">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="whats" class="col-sm-2 control-label">WhatsApp</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name="whats" id="whats" value="<?php echo $info['whatsapp']; ?>" placeholder="حساب الواتس اب الخاص بالشركة">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-4 col-sm-6">
                        <button type="submit" name="update" class="btn btn-block btn-success" style="margin:20px 0;">حفظ</button>
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


