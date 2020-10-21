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
              $sections = new sections_shop();
              $sec_clients = $sections->select('*', 'shop_section', 'WHERE section_id = ?');
              $sec_clients->execute(array($id));
              $sec = $sec_clients->fetch();

              if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['edit_cat'])) {

                $sections->get_input($_POST['name'], $_POST['desc'], $_POST['name_unique'], $_POST['id_post'], 'edit');
              
              }
              
              ?>
              <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name" class="col-sm-3 control-label">أسم القسم</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="name" id="name" value="<?php if(isset($sec['section_name'])) { echo $sec['section_name']; } ?>" placeholder="ادخل الأسم القسم">
                      <input type="hidden" value="<?php echo $id; ?>" name="id_post">
                  </div>
                </div>

                <div class="form-group">
                  <label for="desc" class="col-sm-3 control-label">وصف القسم</label>
                  <div class="col-sm-9">
                      <textarea rows="4" class="form-control" name="desc" id="desc" placeholder="ادخل وصف حول القسم"><?php if(isset($sec['section_description'])) { echo $sec['section_description']; } ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="name" class="col-sm-3 control-label">الأسم الفريد <span class="star">*</span></label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="name_unique" id="name" value="<?php if(isset($sec['section_description'])) { echo $sec['section_description']; } ?>" placeholder="ادخل الأسم الفريد باللغة الأنكليزية">
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


