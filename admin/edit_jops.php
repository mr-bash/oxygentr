    <!-- Start Header Section -->
    <?php require_once __DIR__ .'/../app/core/session.php'; ?>
    <?php require_once 'inc/top-header.php'; ?>
    <title><?php echo SITENAME; ?> - أضافة فرصة عمل</title>
    <?php require_once 'inc/header.php'; ?>
    
    <!-- Start Content Page Section -->
    <div class="container-fluid">
      <div class="row">
      <!-- Start Sidebar Page Section -->
        <div class="col-sm-3 col-md-2 sidebar">
          <?php require_once 'inc/sidebar.php'; ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> أضافة فرصة عمل</h1>
          <div class="row">
            <div class="col-md-10">
            <?php 

              
              $id = 0;
              if(isset($_GET['id']) and is_numeric($_GET['id'])) {
                $id = $_GET['id'];
              } else {
                $id = 0;
              }
              $jops = new jops();
              $jop = $jops->select('*', 'jops', 'WHERE jop_id = ?');
              $jop->execute(array($id));
              $info = $jop->fetch();
              

              if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['edit_jops'])) {
                
                $jops->get_input($_POST['title'], $_FILES['img'], $_POST['content'], $_POST['name_company'], $_POST['address'], $_POST['count'], $_POST['mail'], $_POST['site'], $_POST['phone'], $_POST['type-work'], $_POST['salary'], $_POST['last-date'], $_POST['experience'], $_POST['select-sec'], '1', 'edit', $_POST['id']);

              }

              ?>
              <form class="form-horizontal form_clients" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                <div class="show_content">
                </div>

                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">عنوان الوظيفة <span class="star">*</span></label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control check_error" name="title" id="title" value="<?php if(isset($info['jop_title'])) { echo $info['jop_title']; } else { echo NULL; } ?>" placeholder="ادخل عنوان الوظيفة">
                      <input type="hidden" name="id" value="<?php echo $id; ?>">
                      <div class="alert alert-danger alert-dismissible" role="alert" style="">
                        <strong>تنبيه</strong> الحقل فارغ<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="img" class="col-sm-2 control-label">صورة حول الوظيفة <span class="star">*</span></label>
                  <div class="col-sm-10">
                      <input type="file" class="form-control" name="img" id="img">
                      <a href="<?php echo dirname(__FILE__) . '/uplodas/' . $info["jop_dir"] . '/' . $info['jop_img'] ?>" target="_blank"><img src="uplodas/<?php echo $info['jop_dir'] . '/' . $info['jop_img']; ?>" class="thumblis-panel"></a>
                  </div>
                </div>

                <div class="form-group">
                  <label for="content" class="col-sm-2 control-label">معلومات الوظيفة <span class="star">*</span></label>
                  <div class="col-sm-10">
                      <textarea rows="4" class="form-control check_error" name="content" id="content" placeholder="ادخل معلومات حول الوظيفة"><?php if(isset($info['jop_content'])) { echo $info['jop_content']; } else { echo NULL; } ?></textarea>
                      <div class="alert alert-danger alert-dismissible" role="alert" style="">
                        <strong>تنبيه</strong> الحقل فارغ<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="section" class="col-sm-2 control-label">القسم <span class="star">*</span></label>
                  <div class="col-sm-10 check_select">
                    <select name="select-sec" id="section" class="col-sm-12">
                      <?php if(!isset($info['select-sec']) or isset($info['select-sec']) and $info['select-sec'] == '0') { echo '<option value="0">أختر قسم ....</option>'; } ?>
                      <?php 
                      
                      $sec_jops = $jops->select('*', 'jops_sections');
                      $sec_jops->execute(array());
                      $all_sections = $sec_jops->fetchAll();
                      
                      foreach($all_sections as $sec) {
                      ?>
                      <option value="<?php echo $sec['sec_id']; ?>" <?php if($sec['sec_id'] == $info['jop_section']) { echo 'selected'; } else { echo NULL; } ?> ><?php echo $sec['sec_name']; ?></option>
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
                <h5 style="margin: 20px 0 40px;font-weight: 600;color: #999999">معلومات حول صاحب الطلب :</h5>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="name_company" class="col-sm-4 control-label">أسم الشركة</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="name_company" id="name_company" value="<?php if(isset($info['jop_company'])) { echo $info['jop_company']; } else { echo NULL; } ?>" placeholder="ادخل أسم الشركة">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="address" class="col-sm-4 control-label">عنوان الشركة</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="address" id="address" value="<?php if(isset($info['jop_address'])) { echo $info['jop_address']; } else { echo NULL; } ?>" placeholder="ادخل عنوان الشركة">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="count" class="col-sm-4 control-label">عدد الموظفين</label>
                  <div class="col-sm-8">
                      <input type="number" class="form-control" name="count" id="count" value="<?php if(isset($info['jop_count'])) { echo $info['jop_count']; } else { echo '1'; } ?>" placeholder="ادخل عدد الموظفين المطلوبين">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="mail" class="col-sm-4 control-label">البريد الألكتروني</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="mail" id="mail" value="<?php if(isset($info['jop_email'])) { echo $info['jop_email']; } else { echo NULL; } ?>" placeholder="أدخل البريد الألكتروني">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="site" class="col-sm-4 control-label">الموقع الشخصي</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="site" id="site" value="<?php if(isset($info['jop_site'])) { echo $info['jop_site']; } else { echo NULL; } ?>" placeholder="أدخل رابط الموقع الألكتروني">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="phone1" class="col-sm-4 control-label">رقم الهاتف</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="phone" id="phone" value="<?php if(isset($info['jop_phone'])) { echo $info['jop_phone']; } else { echo NULL; } ?>" placeholder="أدخل رقم الهاتف">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="type-work" class="col-sm-4 control-label">نوع الدوام</label>
                  <div class="col-sm-8">
                    <select name="type-work" id="type-work" class="col-sm-12">
                    <option value="دوام كامل" <?php if($info['jop_type'] == 'دوام كامل') { echo 'selected'; } else { echo NULL; } ?> >دوام كامل</option>
                    <option value="دوام جزئي" <?php if($info['jop_type'] == 'دوام جزئي') { echo 'selected'; } else { echo NULL; } ?> >دوام جزئي</option>
                    <option value="عمل حر" <?php if($info['jop_type'] == 'عمل حر') { echo 'selected'; } else { echo NULL; } ?> >عمل حر</option>
                    <option value="عمل بأتفاق" <?php if($info['jop_type'] == 'عمل بأتفاق') { echo 'selected'; } else { echo NULL; } ?> >عمل بأتفاق</option>
                    </select>
                  </div>
                </div>

                

                <div class="form-group col-md-6 col-sm-12">
                  <label for="salary" class="col-sm-4 control-label">الراتب</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="salary" id="salary" value="<?php if(isset($info['jop_salary'])) { echo $info['jop_salary']; } else { echo NULL; } ?>" placeholder="أدخل الراتب">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="last-date" class="col-sm-4 control-label">تاريخ أنتهاء الطلب</label>
                  <div class="col-sm-8">
                      <input type="date" min="<?php echo date('Y-m-d'); ?>" class="form-control" name="last-date" id="last-date" value="<?php if(isset($info['jop_lastdate'])) { echo $info['jop_lastdate']; } else { echo NULL; } ?>" placeholder="أدخل تاريخ أنتهاء طلب الوظيفة" >
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="experience" class="col-sm-4 control-label">سنوات الخبرة</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="experience" id="experience" value="<?php if(isset($info['jop_experience'])) { echo $info['jop_experience']; } else { echo NULL; } ?>" placeholder="أدخل عدد سنوات الخبرة">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" name="edit_jops" class="btn btn-block btn-success" style="margin:20px 0;">حفظ</button>
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