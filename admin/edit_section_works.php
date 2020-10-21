    <!-- Start Header Section -->
    <?php require_once __DIR__ .'/../app/core/session.php'; ?>
    <?php require_once 'inc/top-header.php'; ?>
    <title><?php echo SITENAME; ?> - أضافة قسم</title>
    <?php require_once 'inc/header.php'; ?>
    
    <!-- Start Content Page Section -->
    <div class="container-fluid">
      <div class="row">
      <!-- Start Sidebar Page Section -->
        <div class="col-sm-3 col-md-2 sidebar">
          <?php require_once 'inc/sidebar.php'; ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> أضافة قسم جديد للعملاء</h1>
          <div class="row">
            <div class="col-md-10">
            <?php 

              $sec_works = new sections_works();
              if(isset($_GET['id']) and is_numeric($_GET['id'])) {
                $id = $_GET['id'];
              } else {
                $id = 0;
              }

              $ob_works = $sec_works->select('*', 'works_sections', 'WHERE sec_id = ?');
              $ob_works->execute(array($id));
              $info = $ob_works->fetch();
              $check = $ob_works->rowCount();

              if($check == 0 and $id != 0 or isset($_GET['id']) and $_GET['id'] == 0) {
                messages::set_msg('danger', 'خطأ', ' الصفحة المطلوبة غير <strong> موجودة</strong>');
                $sec_works->redirecr_page(messages::$msg_alert, 'works.php', 1);
                exit();
              }

              if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['edit_section_works'])) {
                
                $sec_works->get_input($_POST['name'], str_replace(' ', '-', trim($_POST['name_unique'])), $_POST['type'], 'edit', $_POST['id']);
                
              }

              ?>
              <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                  <label for="name" class="col-sm-3 control-label">أسم القسم <span class="star">*</span></label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="name" id="name" value="<?php if(isset($info['sec_name'])) { echo $info['sec_name']; } ?>" placeholder="ادخل القسم">
                      <input type="hidden" name="id" value="<?php if(isset($info['sec_id'])) { echo $info['sec_id']; } ?>" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="name_unique" class="col-sm-3 control-label">أسم القسم الفريد <span class="star">*</span></label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="name_unique" id="name_unique" value="<?php if(isset($info['sec_unique'])) { echo $info['sec_unique']; } ?>" placeholder="ادخل الأسم الفريد">
                  </div>
                </div>

                <div class="form-group">
                  <label for="section" class="col-sm-3 control-label">نوع القسم <span class="star">*</span></label>
                  <div class="col-sm-9 check_select">
                    <select name="type" id="section" class="col-sm-12">
                      
                      <option value="global" <?php if(isset($info['sec_type']) and $info['sec_type'] == 'global') { echo 'selected'; } ?> >أعتيادي</option>
                      <option value="video" <?php if(isset($info['sec_type']) and $info['sec_type'] == 'video') { echo 'selected'; } ?> >فيديو</option>
                    </select>
                  </div>
                </div>

                

                <div class="form-group">
                  <div class="col-sm-offset-4 col-sm-6">
                    <button type="submit" name="edit_section_works" class="btn btn-block btn-success" style="margin:20px 0;">حفظ</button>
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


