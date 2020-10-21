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
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> أضافة قسم جديد للمتجر</h1>
          <div class="row">
            <div class="col-md-10">
            <?php 

              $sec_shop = new sections_shop();

              if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['add_section'])) {

                $sec_shop->get_input($_POST['name'], $_POST['desc'], $_POST['name_unique'], '', 'add');
              }

              ?>
              <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                  <label for="name" class="col-sm-3 control-label">أسم القسم <span class="star">*</span></label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="name" id="name" value="<?php if(isset($_POST['name'])) { echo $_POST['name']; } ?>" placeholder="ادخل الأسم الأول">
                  </div>
                </div>

                <div class="form-group">
                  <label for="desc" class="col-sm-3 control-label">وصف القسم</label>
                  <div class="col-sm-9">
                      <textarea rows="4" class="form-control" name="desc" id="desc" placeholder="ادخل وصف حول القسم"><?php if(isset($_POST['desc'])) { echo $_POST['desc']; } ?></textarea>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="name" class="col-sm-3 control-label">الأسم الفريد <span class="star">*</span></label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="name_unique" id="name" value="<?php if(isset($_POST['name_unique'])) { echo $_POST['name_unique']; } ?>" placeholder="ادخل الأسم الفريد باللغة الأنكليزية">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-4 col-sm-6">
                    <button type="submit" name="add_section" class="btn btn-block btn-success" style="margin:20px 0;">أضافة</button>
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


