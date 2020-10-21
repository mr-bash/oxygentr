    <!-- Start Header Section -->
    <?php require_once __DIR__ .'/../app/core/session.php'; ?>
    <?php require_once 'inc/top-header.php'; ?>
    <title><?php echo SITENAME; ?> - أضافة قسم لـ حول الشركة</title>
    <?php require_once 'inc/header.php'; ?>
    
    <!-- Start Content Page Section -->
    <div class="container-fluid">
      <div class="row">
      <!-- Start Sidebar Page Section -->
        <div class="col-sm-3 col-md-2 sidebar">
          <?php require_once 'inc/sidebar.php'; ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> أضافة مشروع جديد</h1>
          <div class="type-work">
          <?php
            if(isset($_GET['id']) and is_numeric($_GET['id'])) {
              $id = $_GET['id'];
            } else {
              $id = 0;
            }

            if(isset($_GET['sec']) and is_numeric($_GET['sec'])) {
              $sec = $_GET['sec'];
            } else {
              $sec = 0;
            }

            $works = new works();
            $sections = new sections_works();
            $sec_work = $works->select('*', 'works', 'WHERE work_id = ?');
            $sec_work->execute(array($id));
            $info = $sec_work->fetch();
            $check = $sec_work->rowCount();

            $get_sections = $sections->select('*', 'works_sections', 'WHERE sec_id = ?');
            $get_sections->execute(array($sec));
            $sec = $get_sections->fetch();
            $check_sec = $sec_work->rowCount();

            if($check == 0 and $id != 0 or isset($_GET['id']) and $_GET['id'] == 0 or isset($_GET['sec']) and $info['section_id'] != $_GET['sec'] or isset($_GET['type']) and $info['work_type'] != $_GET['type']) {
              messages::set_msg('danger', 'خطأ', ' الصفحة المطلوبة غير <strong> موجودة</strong>');
              $works->redirecr_page(messages::$msg_alert, 'works.php', 0);
              exit();
            }
            if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['edit_works_global'])) {

              $works->get_input($_POST['name'], $_POST['content'], $_FILES['img_project'], $_FILES['image_1'], $_FILES['image_2'], $_FILES['image_3'], $_FILES['image_4'], $_FILES['image_5'], $_FILES['image_6'], $_FILES['image_7'], $_FILES['image_8'], $_POST['link_project'], '', '0', '0', '0', '0', '0', $_POST['section_id'], $_POST['type_works'], 'edit', $_POST['id_post']);
              
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['edit_works_video'])) {

              $works->get_input($_POST['name'], $_POST['content'], $_FILES['img_project'], $_FILES['photo'], $_FILES['photo'], $_FILES['photo'], $_FILES['photo'], $_FILES['photo'], $_FILES['photo'], $_FILES['photo'], $_FILES['photo'], '', $_POST['link_video'], '0', '0', '0', '0', '0', $_POST['section_id'], $_POST['type_works'], 'edit', $_POST['id_post']);
              
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['edit_works_marketing'])) {

              $works->get_input($_POST['name'], $_POST['content'], $_FILES['img_project'], $_FILES['image_1'], $_FILES['image_2'], $_FILES['image_3'], $_FILES['image_4'], $_FILES['image_5'], $_FILES['image_6'], $_FILES['image_7'], $_FILES['image_8'], '', '', $_POST['whatsapp'], $_POST['facebook'], $_POST['instagram'], $_POST['twitter'], $_POST['youtube'], $_POST['section_id'], $_POST['type_works'], 'edit', $_POST['id_post']);
              
            }

            ?>
            <a href="<?php echo  basename(__FILE__) . '?id=' . $sec['sec_id'] . '&type=' . $sec['sec_type'] . '&name=' . $sec['sec_unique']; ?>" class="<?php if(isset($_GET['sec']) and $_GET['sec'] == $sec['sec_id']) { echo 'active'; } ?>"><?php echo $sec['sec_name']; ?></a>
          </div>
          <div class="row">
            <div class="col-md-10">

            <?php if(isset($_GET['type']) and $_GET['type'] == 'video') {  ?>
                <?php require_once 'inc/edit_form_video.php'; ?>
              <?php } else if(isset($_GET['type']) and $_GET['type'] == 'global') { ?>
                <?php require_once 'inc/edit_form_global.php'; ?>
              <?php } else { ?>
                <?php require_once 'inc/edit_form_marketing.php'; ?>
              <?php } ?>

            </div>
          </div>
        </div>
        </div>
      </div>
    <!-- Start Footer Page Section -->
    <?php require_once 'inc/footer.php'; ?>


