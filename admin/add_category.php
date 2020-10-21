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
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> أضافة قسم جديد</h1>
          <div class="row">
            <div class="col-md-10">
              <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                <div class="form-group">
                  <label for="name" class="col-sm-3 control-label">أسم القسم</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="name" id="name" value="" placeholder="ادخل الأسم الأول">
                  </div>
                </div>

                <div class="form-group">
                  <label for="desc" class="col-sm-3 control-label">وصف القسم</label>
                  <div class="col-sm-9">
                      <textarea rows="4" class="form-control" name="desc" id="desc" placeholder="ادخل وصف حول القسم"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="icon_dark" class="col-sm-3 control-label">شعار القسم بـ لون داكن  </label>
                  <div class="col-sm-9">
                      <input type="file" class="form-control" name="icon_dark" id="icon_dark">
                  </div>
                </div>

                <div class="form-group">
                  <label for="icon_white" class="col-sm-3 control-label">شعار القسم بـ لون أبيض  </label>
                  <div class="col-sm-9">
                      <input type="file" class="form-control" name="icon_white" id="icon_white">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-4 col-sm-6">
                    <button type="submit" name="add_cat" class="btn btn-block btn-success" style="margin:20px 0;">أضافة</button>
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


