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
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> أضافة منتج جديد</h1>
          <div class="row">
            <div class="col-md-10">
            <?php
            
            $shop = new shop();

            if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['add_product'])) {

              $shop->get_input($_POST['name'], $_POST['code'], $_POST['select-sec'], $_POST['content'], $_FILES['image_1'], $_FILES['image_2'], $_FILES['image_3'], $_FILES['image_4'], $_FILES['image_5'], $_FILES['image_6'], $_FILES['image_7'], $_FILES['image_8'], 'add', '');

            }

            ?>
              <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">أسم المنتج<span class="star">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" id="name" value="<?php if(isset($_POST['name'])) { echo $_POST['name']; } ?>" placeholder="ادخل أسم المنتج">
                        <input type="hidden" name="section_id" value="<?php echo $_GET['id']; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="code" class="col-sm-3 control-label">كود المنتج<span class="star"></span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="code" id="code" value="<?php if(isset($_POST['code'])) { echo $_POST['code']; } ?>" placeholder="ادخل كود المنتج">

                    </div>
                  </div>

                  <div class="form-group">
                    <label for="section" class="col-sm-3 control-label">القسم <span class="star">*</span></label>
                    <div class="col-sm-9 check_select">
                      <select name="select-sec" id="section" class="col-sm-12">
                        <?php if(!isset($_POST['select-sec']) or isset($_POST['select-sec']) and $_POST['select-sec'] == '0') { echo '<option value="0">أختر قسم ....</option>'; } ?>
                        <?php 
                        
                        $sec_shop = $shop->select('*', 'shop_section');
                        $sec_shop->execute(array());
                        $all_sections = $sec_shop->fetchAll();
                        
                        foreach($all_sections as $sec) {
                        ?>
                        <option value="<?php echo $sec['section_id']; ?>" <?php if(isset($_POST['select-sec']) and $_POST['select-sec'] == $sec['section_id']) { echo 'selected'; } else { echo NULL; } ?> ><?php echo $sec['section_name']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="content" class="col-sm-3 control-label">معلومات حول المنتج</label>
                    <div class="col-sm-9">
                        <textarea rows="8" class="form-control" name="content" id="content" placeholder="ادخل معلومات حول المنتج"><?php if(isset($_POST['content'])) { echo $_POST['content']; } ?></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="image_1" class="col-sm-3 control-label">صورة المنتج الرئيسية <span class="star">*</span></label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" name="image_1" id="image_1">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-sm-3 control-label">صور منوعة حول المنتج</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" name="image_2">
                        <input type="file" class="form-control" name="image_3">
                        <input type="file" class="form-control" name="image_4">
                        <input type="file" class="form-control" name="image_5">
                        <input type="file" class="form-control" name="image_6">
                        <input type="file" class="form-control" name="image_7">
                        <input type="file" class="form-control" name="image_8">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-offset-3 col-sm-offset-0 col-md-9 col-sm-6">
                      <button type="submit" name="add_product" class="btn btn-block btn-success" style="margin:20px 0;width: 100%;display: block">اضافة</button>
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


