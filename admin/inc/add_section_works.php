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

              if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['add_section_works'])) {
                
                $sec_works->get_input($_POST['name'], str_replace(' ', '-', trim($_POST['name_unique'])), $_POST['type'], 'add', '');

              }
              ?>
              <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                  <label for="name" class="col-sm-3 control-label">أسم القسم <span class="star">*</span></label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="name" id="name" value="<?php if(isset($_POST['name'])) { echo $_POST['name']; } ?>" placeholder="ادخل أسم القسم">
                  </div>
                </div>

                <div class="form-group">
                  <label for="name_unique" class="col-sm-3 control-label">أسم القسم الفريد <span class="star">*</span></label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="name_unique" id="name_unique" value="<?php if(isset($_POST['name_unique'])) { echo $_POST['name_unique']; } ?>" placeholder="ادخل الأسم الفريد">
                  </div>
                </div>

                <div class="form-group">
                  <label for="section" class="col-sm-3 control-label">نوع القسم <span class="star">*</span></label>
                  <div class="col-sm-9 check_select">
                    <select name="type" id="section" class="col-sm-12">
                      
                      <option value="global">أعتيادي</option>
                      <option value="video">فيديو</option>
                    </select>
                  </div>
                </div>

                

                <div class="form-group">
                  <div class="col-sm-offset-4 col-sm-6">
                    <button type="submit" name="add_section_works" class="btn btn-block btn-success" style="margin:20px 0;">أضافة</button>
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


