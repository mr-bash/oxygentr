    <!-- Start Header Section -->
    <?php require_once __DIR__ .'/../app/core/session.php'; ?>
    <?php require_once 'inc/top-header.php'; ?>
    <title><?php echo SITENAME; ?> - تعديل قسم</title>
    <?php require_once 'inc/header.php'; ?>
    
    <!-- Start Content Page Section -->
    <div class="container-fluid">
      <div class="row">
      <!-- Start Sidebar Page Section -->
        <div class="col-sm-3 col-md-2 sidebar">
          <?php require_once 'inc/sidebar.php'; ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> تعديل قسم خاص بعملائنا</h1>
          <div class="row">
            <div class="col-md-10">
            <?php 
            
            $id = 0;
            if(isset($_GET['id']) and is_numeric($_GET['id'])) {
              $id = $_GET['id'];
            } else {
              $id = 0;
            }
            $sections = new sections_jops();
            $sec_clients = $sections->select('*', 'jops_sections', 'WHERE sec_id = ?');
            $sec_clients->execute(array($id));
            $sec = $sec_clients->fetch();

            if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['edit_cat'])) {

              $sections->get_input($_POST['name'], str_replace(' ', '-', trim($_POST['name_unique'])), $_FILES['icon_dark'], $_FILES['icon_white'], $_POST['id_post'], 'edit');
            
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['del_dark'])) {

              $del1 = $sections->update('jops_sections', 'icon_dark = 0', 'WHERE sec_id = ?');
              $del1->execute(array($_POST['id']));
              $sections->redirecr_page('Deleted...', $_SERVER['HTTP_REFERER'], 0);
              die();
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['del_white'])) {

              $del2 = $sections->update('jops_sections', 'icon_white = 0', 'WHERE sec_id = ?');
              $del2->execute(array($_POST['id']));
              $sections->redirecr_page('Deleted...', $_SERVER['HTTP_REFERER'], 0);
              die();
            }
            
            ?>
              <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name" class="col-sm-3 control-label">أسم القسم</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="name" id="name" value="<?php echo $sec['sec_name']; ?>" placeholder="ادخل الأسم القسم">
                      <input type="hidden" value="<?php echo $id; ?>" name="id_post">
                  </div>
                </div>

                <div class="form-group">
                  <label for="name" class="col-sm-3 control-label">الأسم الفريد <span class="star">*</span></label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="name_unique" id="name" value="<?php echo $sec['sec_unique']; ?>" placeholder="ادخل الأسم الفريد باللغة الأنكليزية">
                  </div>
                </div>

                <div class="form-group">
                  <label for="icon_dark" class="col-sm-3 control-label">شعار القسم بـ لون داكن  </label>
                  <div class="col-sm-9">
                      <input type="file" class="form-control" name="icon_dark" id="icon_dark">
                      <?php
                        if($sec['icon_dark'] != 0) {
                        ?>
                      <a href="<?php echo dirname(__FILE__) . '/uplodas/' . $sec["dir"] . '/' . $sec['icon_dark'] ?>" target="_blank"><img src="uplodas/<?php echo $sec['dir'] . '/' . $sec['icon_dark']; ?>" class="thumblis-panel"></a>
                      <input type="submit" value="Delete" name="del_dark" class="del-img">
                      <input type="hidden" value="<?php echo $id; ?>" name="id">
                      <?php }?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="icon_white" class="col-sm-3 control-label">شعار القسم بـ لون أبيض  </label>
                  <div class="col-sm-9">
                      <input type="file" class="form-control" name="icon_white" id="icon_white">
                      <?php
                        if($sec['icon_white'] != 0) {
                        ?>
                      <a href="<?php echo dirname(__FILE__) . '/uplodas/' . $sec["dir"] . '/' . $sec['icon_white'] ?>" target="_blank"><img src="uplodas/<?php echo $sec['dir'] . '/' . $sec['icon_white']; ?>" class="thumblis-panel" style="background-color: #8b8b8b;"></a>
                      <input type="submit" value="Delete" name="del_white" class="del-img">
                      <input type="hidden" value="<?php echo $id; ?>" name="id">
                      <?php }?>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-4 col-sm-6">
                    <button type="submit" name="edit_cat" class="btn btn-block btn-success" style="margin:20px 0;">حفظ</button>
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


