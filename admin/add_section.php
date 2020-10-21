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

              $sec_client = new sections_clients();

              if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['add_section'])) {

                $sec_client->get_input($_POST['name'], str_replace(' ', '-', trim($_POST['name_unique'])), $_POST['desc'], $_FILES['img_cover'], $_FILES['img_cover768'], $_FILES['img_cover576'], $_FILES['icon_dark'], $_FILES['icon_white'], '2', 'add');
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
                  <label for="name" class="col-sm-3 control-label">الأسم الفريد <span class="star">*</span></label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="name_unique" id="name" value="<?php if(isset($_POST['name_unique'])) { echo $_POST['name_unique']; } ?>" placeholder="ادخل الأسم الفريد باللغة الأنكليزية">
                  </div>
                </div>

                <div class="form-group">
                  <label for="desc" class="col-sm-3 control-label">وصف القسم</label>
                  <div class="col-sm-9">
                      <textarea rows="4" class="form-control" name="desc" id="desc" placeholder="ادخل وصف حول القسم"><?php if(isset($_POST['desc'])) { echo $_POST['desc']; } ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="img_cover" class="col-sm-3 control-label">صورة العرض <span class="star">*</span></label>
                  <div class="col-sm-9">
                      <input type="file" class="form-control" name="img_cover" id="img_cover">
                  </div>
                </div>

                <div class="form-group">
                  <label for="img_cover768" class="col-sm-3 control-label">صورة العرض في الشاشات المتوسطة <span class="star">*</span></label>
                  <div class="col-sm-9">
                      <input type="file" class="form-control" name="img_cover768" id="img_cover768">
                  </div>
                </div>

                <div class="form-group">
                  <label for="img_cover576" class="col-sm-3 control-label">صورة العرض في شاشات الموبايل <span class="star">*</span></label>
                  <div class="col-sm-9">
                      <input type="file" class="form-control" name="img_cover576" id="img_cover576">
                  </div>
                </div>

                <div class="form-group">
                  <label for="icon_dark" class="col-sm-3 control-label">شعار القسم بـ لون داكن</label>
                  <div class="col-sm-9">
                      <input type="file" class="form-control" name="icon_dark" id="icon_dark">
                  </div>
                </div>

                <div class="form-group">
                  <label for="icon_white" class="col-sm-3 control-label">شعار القسم بـ لون أبيض</label>
                  <div class="col-sm-9">
                      <input type="file" class="form-control" name="icon_white" id="icon_white">
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


