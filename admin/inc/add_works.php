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
            $works = new works();
            $sections = new sections_works();
            if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['add_works_global'])) {

              $works->get_input($_POST['name'], $_POST['content'], $_FILES['img_project'], $_FILES['image_1'], $_FILES['image_2'], $_FILES['image_3'], $_FILES['image_4'], $_FILES['image_5'], $_FILES['image_6'], $_FILES['image_7'], $_FILES['image_8'], $_POST['link_project'], '', '0', '0', '0', '0', '0', $_POST['section_id'], 'global', 'add', '');

            }
            
            if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['add_works_video'])) {

              $works->get_input($_POST['name'], $_POST['content'], $_FILES['img_project'], $_FILES['photo'], $_FILES['photo'], $_FILES['photo'], $_FILES['photo'], $_FILES['photo'], $_FILES['photo'], $_FILES['photo'], $_FILES['photo'], '', $_POST['link_video'], '0', '0', '0', '0', '0', $_POST['section_id'], $_POST['type_works'], 'add', '');

            }

            if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['add_works_marketing'])) {

              $works->get_input($_POST['name'], $_POST['content'], $_FILES['img_project'], $_FILES['image_1'], $_FILES['image_2'], $_FILES['image_3'], $_FILES['image_4'], $_FILES['image_5'], $_FILES['image_6'], $_FILES['image_7'], $_FILES['image_8'], '', '', $_POST['whatsapp'], $_POST['facebook'], $_POST['instagram'], $_POST['twitter'], $_POST['youtube'], $_POST['section_id'], $_POST['type_works'], 'add', '');

            }

            ?>
            <?php 

            $get_sections = $sections->select('*', 'works_sections');
            $get_sections->execute(array());
            $all_sections = $get_sections->fetchAll();

            foreach ($all_sections as $sec) {
            
            ?>
            <a href="<?php echo  basename(__FILE__) . '?id=' . $sec['sec_id'] . '&type=' . $sec['sec_type'] . '&name=' . $sec['sec_unique']; ?>" class="<?php if(isset($_GET['name']) and $_GET['name'] == $sec['sec_unique']) { echo 'active'; } ?>"><?php echo $sec['sec_name']; ?></a>
            <?php } ?>
          </div>
          <div class="row">
            <div class="col-md-10">

              <?php if(isset($_GET['type']) and $_GET['type'] == 'video') {  ?>
                <?php require_once 'inc/add_form_video.php'; ?>
              <?php } else if(isset($_GET['type']) and $_GET['type'] == 'global') { ?>
                <?php require_once 'inc/add_form_global.php'; ?>
              <?php } else { ?>
                <?php require_once 'inc/add_form_marketing.php'; ?>
              <?php } ?>

            </div>
          </div>
        </div>
        </div>
      </div>
    <!-- Start Footer Page Section -->
    <?php require_once 'inc/footer.php'; ?>


