    <!-- Start Header Section -->
    <?php require_once __DIR__ .'/../app/core/session.php'; ?>
    <?php require_once 'inc/top-header.php'; ?>
    <title><?php echo SITENAME; ?> - أضافة شركة</title>
    <?php require_once 'inc/header.php'; ?>
    
    <!-- Start Content Page Section -->
    <div class="container-fluid">
      <div class="row">
      <!-- Start Sidebar Page Section -->
        <div class="col-sm-3 col-md-2 sidebar">
          <?php require_once 'inc/sidebar.php'; ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> أضافة شركة</h1>
          <div class="row">
            <div class="col-md-10">
            <?php 

              $clients = new clients();

              if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['add_clients'])) {
                
                $brand_footer = 0;
                if(isset($_POST['check_brand'])) {
                  $brand_footer = $_POST['check_brand'];
                }
                $clients->get_input($_FILES['brand'], $_POST['title'], $_POST['link'], $_POST['desc'], $_FILES['image_1'], $_FILES['image_2'], $_FILES['image_3'], $_FILES['image_4'], $_FILES['image_5'], $_POST['select-sec'], $_POST['address'], $_POST['type'], $_POST['count'], $_POST['site'], $_POST['phone1'], $_POST['phone2'], $_POST['mail'], $_POST['face'], $_POST['twetter'], $_POST['insta'], $_POST['youtube'], $_POST['whatsapp'], 'add', '2', $brand_footer);

              }

              ?>
              <form class="form-horizontal form_clients" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                <div class="show_content">
                </div>
                <div class="form-group">
                  <label for="brand" class="col-sm-2 control-label">شعار الشركة <span class="star">*</span></label>
                  <div class="col-sm-10">
                      <input type="file" class="form-control" name="brand" id="brand">
                  </div>

                  <div class="col-sm-10">
                  <label for="check_brand" class="col-sm-6 control-label custom-label">أضافة الشعار داخل الفوتر أسفل الصفحة </label>
                    <input type="checkbox" class="form-control custom-checkbox" name="check_brand" value="1" id="check_brand">
                  </div>
                </div>

                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">أسم الشركة</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control check_error" name="title" id="title" value="<?php if(isset($_POST['title'])) { echo $_POST['title']; } else { echo NULL; } ?>" placeholder="ادخل أسم الشركة">
                      <div class="alert alert-danger alert-dismissible" role="alert" style="">
                        <strong>تنبيه</strong> الحقل فارغ<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="link" class="col-sm-2 control-label">رابط الفيديو</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control check_error" name="link" id="link" value="<?php if(isset($_POST['link'])) { echo $_POST['link']; } else { echo NULL; } ?>" placeholder="ادخل رابط فيديو اليوتيوب كاملاً الخاص بالشركة">
                      <div class="alert alert-danger alert-dismissible" role="alert" style="">
                        <strong>تنبيه</strong> الحقل فارغ<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="desc" class="col-sm-2 control-label">حول الشركة</label>
                  <div class="col-sm-10">
                      <textarea rows="4" class="form-control check_error" name="desc" id="desc" placeholder="ادخل وصف حول الشركة"><?php if(isset($_POST['desc'])) { echo $_POST['desc']; } else { echo NULL; } ?></textarea>
                      <div class="alert alert-danger alert-dismissible" role="alert" style="">
                        <strong>تنبيه</strong> الحقل فارغ<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="image1" class="col-sm-2 control-label">صور حول الشركة <span class="star">*</span></label>
                  <div class="col-sm-10">
                      <input type="file" class="form-control" name="image_1" id="image_1">
                      <input type="file" class="form-control" name="image_2" id="image_2">
                      <input type="file" class="form-control" name="image_3" id="image_3">
                      <input type="file" class="form-control" name="image_4" id="image_4">
                      <input type="file" class="form-control" name="image_5" id="image_5">
                  </div>
                </div>

                <div class="form-group">
                  <label for="section" class="col-sm-2 control-label">القسم <span class="star">*</span></label>
                  <div class="col-sm-10 check_select">
                    <select name="select-sec" id="section" class="col-sm-12">
                      <?php if(!isset($_POST['select-sec']) or isset($_POST['select-sec']) and $_POST['select-sec'] == '0') { echo '<option value="0">أختر قسم ....</option>'; } ?>
                      <?php 
                      
                      $sec_clients = $clients->select('*', 'clients_sections');
                      $sec_clients->execute(array());
                      $all_sections = $sec_clients->fetchAll();
                      
                      foreach($all_sections as $sec) {
                      ?>
                      <option value="<?php echo $sec['sec_id']; ?>" <?php if(isset($_POST['select-sec']) and $_POST['select-sec'] == $sec['sec_id']) { echo 'selected'; } else { echo NULL; } ?> ><?php echo $sec['sec_name']; ?></option>
                      <?php } ?>
                    </select>

                    <div class="alert alert-danger alert-dismissible error_select" role="alert" style="padding-top: 25px; top: 20px;">
                      <strong>تنبيه</strong> الحقل فارغ<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  </div>
                </div>
                <hr>
                <h5>معلومات حول الشركة :</h5>
                <div class="form-group col-md-6 col-sm-12">
                  <label for="address" class="col-sm-4 control-label">العنوان</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control check_error check" name="address" id="address" value="<?php if(isset($_POST['address'])) { echo $_POST['address']; } else { echo NULL; } ?>" placeholder="ادخل عنوان الشركة">
                      <div class="alert alert-danger alert-dismissible" role="alert" style="">
                        <strong>تنبيه</strong> الحقل فارغ<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="type" class="col-sm-4 control-label">التصنيف</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control check_error check" name="type" id="type" value="<?php if(isset($_POST['type'])) { echo $_POST['type']; } else { echo NULL; } ?>" placeholder="ادخل تصنيف الشركة">
                      <div class="alert alert-danger alert-dismissible" role="alert" style="">
                        <strong>تنبيه</strong> الحقل فارغ<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="count" class="col-sm-4 control-label">عدد الفروع</label>
                  <div class="col-sm-8">
                      <input type="number" class="form-control check_error" name="count" id="count" value="<?php if(isset($_POST['count'])) { echo $_POST['count']; } else { echo NULL; } ?>" placeholder="ادخل عدد الفروع">
                      <div class="alert alert-danger alert-dismissible" role="alert" style="">
                        <strong>تنبيه</strong> الحقل فارغ<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="site" class="col-sm-4 control-label">الموقع الألكتروني</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control check_error" name="site" id="site" value="<?php if(isset($_POST['site'])) { echo $_POST['site']; } else { echo NULL; } ?>" placeholder="أدخل رابط الموقع الألكتروني">
                      <div class="alert alert-danger alert-dismissible" role="alert" style="">
                        <strong>تنبيه</strong> الحقل فارغ<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="phone1" class="col-sm-4 control-label">رقم الهاتف 1</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control check_error" name="phone1" id="phone1" value="<?php if(isset($_POST['phone1'])) { echo $_POST['phone1']; } else { echo NULL; } ?>" placeholder="أدخل رقم الهاتف">
                      <div class="alert alert-danger alert-dismissible" role="alert" style="">
                        <strong>تنبيه</strong> الحقل فارغ<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="phone2" class="col-sm-4 control-label">رقم الهاتف 2</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="phone2" id="phone2" value="<?php if(isset($_POST['phone2'])) { echo $_POST['phone2']; } else { echo NULL; } ?>" placeholder="أدخل رقم هاتف آخر متوفر">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="mail" class="col-sm-4 control-label">البريد الألكتروني</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control check_error" name="mail" id="mail" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } else { echo NULL; } ?>" placeholder="أدخل البريد الألكتروني">
                      <div class="alert alert-danger alert-dismissible" role="alert" style="">
                        <strong>تنبيه</strong> الحقل فارغ<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="face" class="col-sm-4 control-label">Facebook</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control check_error" name="face" id="face" value="<?php if(isset($_POST['face'])) { echo $_POST['face']; } else { echo NULL; } ?>" placeholder="أدخل حساب Facebook">
                      <div class="alert alert-danger alert-dismissible" role="alert" style="">
                        <strong>تنبيه</strong> الحقل فارغ<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="twetter" class="col-sm-4 control-label">Twetter</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control check_error" name="twetter" id="twetter" value="<?php if(isset($_POST['twetter'])) { echo $_POST['twetter']; } else { echo NULL; } ?>" placeholder="أدخل حساب Twetter">
                      <div class="alert alert-danger alert-dismissible" role="alert" style="">
                        <strong>تنبيه</strong> الحقل فارغ<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="insta" class="col-sm-4 control-label">Instagram</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control check_error" name="insta" id="insta" value="<?php if(isset($_POST['insta'])) { echo $_POST['insta']; } else { echo NULL; } ?>" placeholder="أدخل حساب Instagram">
                      <div class="alert alert-danger alert-dismissible" role="alert" style="">
                        <strong>تنبيه</strong> الحقل فارغ<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="youtube" class="col-sm-4 control-label">Youtube</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control check_error" name="youtube" id="youtube" value="<?php if(isset($_POST['youtube'])) { echo $_POST['youtube']; } else { echo NULL; } ?>" placeholder="أدخل حساب Youtube">
                      <div class="alert alert-danger alert-dismissible" role="alert" style="">
                        <strong>تنبيه</strong> الحقل فارغ<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="whatsapp" class="col-sm-4 control-label">Whatsapp</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control check_error" name="whatsapp" id="whatsapp" value="<?php if(isset($_POST['whatsapp'])) { echo $_POST['whatsapp']; } else { echo NULL; } ?>" placeholder="أدخل حساب Whatsapp">
                      <div class="alert alert-danger alert-dismissible" role="alert" style="">
                        <strong>تنبيه</strong> الحقل فارغ<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" name="add_clients" class="btn btn-block btn-success" style="margin:20px 0;">اضافة</button>
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


