    <!-- Start Header Section -->
    <?php require_once __DIR__ .'/../app/core/session.php'; ?>
    <?php require_once 'inc/top-header.php'; ?>
    <title><?php echo SITENAME; ?> - تعديل قسم لـ حول الشركة</title>
    <?php require_once 'inc/header.php'; ?>
    
    <!-- Start Content Page Section -->
    <div class="container-fluid">
      <div class="row">
      <!-- Start Sidebar Page Section -->
        <div class="col-sm-3 col-md-2 sidebar">
          <?php require_once 'inc/sidebar.php'; ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> تعديل قسم لـ حول الشركة</h1>
          <div class="row">
            <div class="col-md-10">
              <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
              <?php 
              
              if(isset($_GET['id']) and is_numeric($_GET['id'])) {
                $id = $_GET['id'];
              } else {
                $id = 0;
              }

              $ob_about = new about();
              $sec_about = $ob_about->select('*', 'about', 'WHERE id = ?');
              $sec_about->execute(array($id));
              $info = $sec_about->fetch();
              $check = $sec_about->rowCount();

              if($check == 0 and $id != 0 or isset($_GET['id']) and $_GET['id'] == 0) {
                messages::set_msg('danger', 'خطأ', ' الصفحة المطلوبة غير <strong> موجودة</strong>');
                $ob_about->redirecr_page(messages::$msg_alert, 'about.php', 1);
                exit();
              }

              

              if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['edit_about'])) {

                $ob_about->get_input($_POST['title'], $_POST['content'], $_FILES['img_sec'], 'edit', $_POST['id']);

              }
              
              ?>
                <div class="form-group">
                  <label for="title" class="col-sm-3 control-label">العنوان<span class="star">*</span></label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="title" id="title" value="<?php if(isset($info['title'])) { echo $info['title']; } ?>" placeholder="ادخل العنوان">
                      <input type="hidden" name="id" value="<?php echo $id; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="content" class="col-sm-3 control-label">محتوى القسم</label>
                  <div class="col-sm-9">
                      <textarea rows="8" class="form-control" name="content" id="content" placeholder="ادخل محتوى حول القسم"><?php if(isset($info['content'])) { echo $info['content']; } ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="img_sec" class="col-sm-3 control-label">صورة القسم <span class="star">*</span></label>
                  <div class="col-sm-9">
                      <input type="file" class="form-control" name="img_sec" id="img_sec">
                      <a href="<?php echo dirname(__FILE__) . '/uplodas/about_files/' . $info['img'] ?>" target="_blank"><img src="uplodas/about_files/<?php echo $info['img']; ?>" class="thumblis-panel"></a>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" name="edit_about" class="btn btn-block btn-success" style="margin:20px 0;">تعديل</button>
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


