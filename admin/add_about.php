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
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> أضافة قسم جديد لـ حول الشركة</h1>
          <div class="row">
            <div class="col-md-10">
              <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
              <?php 
              
              if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['add_about'])) {

                $ob_about = new about();

                $ob_about->get_input($_POST['title'], $_POST['content'], $_FILES['img_sec'], 'add', '');
              }
              
              ?>
                <div class="form-group">
                  <label for="title" class="col-sm-3 control-label">العنوان<span class="star">*</span></label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="title" id="title" value="<?php if(isset($_POST['title'])) { echo $_POST['title']; } ?>" placeholder="ادخل العنوان">
                  </div>
                </div>

                <div class="form-group">
                  <label for="content" class="col-sm-3 control-label">محتوى القسم</label>
                  <div class="col-sm-9">
                      <textarea rows="8" class="form-control" name="content" id="content" placeholder="ادخل محتوى حول القسم"><?php if(isset($_POST['content'])) { echo $_POST['content']; } ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="img_sec" class="col-sm-3 control-label">صورة القسم <span class="star">*</span></label>
                  <div class="col-sm-9">
                      <input type="file" class="form-control" name="img_sec" id="img_sec">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" name="add_about" class="btn btn-block btn-success" style="margin:20px 0;">اضافة</button>
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


