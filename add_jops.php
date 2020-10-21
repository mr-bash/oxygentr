    <!-- Start Section Files Css And Header Html -->
    <?php require_once 'inc-front/top-header.php'; ?>
    <title><?php echo 'أضافة فرصة عمل' . $title; ?></title>

    <link rel="stylesheet" href="webfonts/custom-fonts.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="admin/css/dashbaord.css">
    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/html5shiv.min.js"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
    <!-- Start Section Header Page [Top Header, Navbar, Cover] -->
    <?php require_once 'inc-front/header-nav.php'; ?>
    
    <!-- End Section Header Page -->

    <!-- Start Body Page -->
      <!-- Start Jops Turkey Section -->

      <section class="jops-turkey">
        <div class="cover-global">
        <?php 
          $ob_ads = new ads();
          $ads = $ob_ads->select('*', 'ads', 'WHERE id = 7');
          $ads->execute(array());
          $res = $ads->fetch();
          
          if($res['display'] == 1) {
            require_once 'inc-front/banner-ads.php'; 
          } else {
            echo '<h1 class="title-section">أضافة فرصة عمل جديدة</h1>';
          }
          
          ?>
        </div>
        <div class="container">
          <div class="container-items custom-container-items">
            <h2 class="head-jop">أضافة فرصة عمل جديدة</h2>
            <div class="row">
            <?php 

              $jops = new jops();

              if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['add_jops'])) {
                echo '<div class="continer-backend">';
                $jops->get_input($_POST['title'], $_FILES['img'], $_POST['content'], $_POST['name_company'], $_POST['address'], $_POST['count'], $_POST['mail'], $_POST['site'], $_POST['phone'], $_POST['type-work'], $_POST['salary'], $_POST['last-date'], $_POST['experience'], $_POST['select-sec'], '0', 'add', '');
                echo '</div>';
              }

              ?>
              <form class="form-horizontal form_clients col-sm-12" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                <div class="show_content">
                </div>
                  <div class="form-group col-sm-12">
                    <div class="row">
                      <label for="title" class="col-sm-2 control-label custom-label-style">عنوان الوظيفة <span class="star">*</span></label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control check_error" name="title" id="title" value="<?php if(isset($_POST['title'])) { echo $_POST['title']; } else { echo NULL; } ?>" placeholder="ادخل عنوان الوظيفة">
                          <div class="alert alert-danger alert-dismissible" role="alert" style="">
                            <strong>تنبيه</strong> الحقل فارغ<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                      </div>
                    </div>
                  </div>

                <div class="form-group col-sm-12">
                  <div class="row">
                    <label for="img" class="col-sm-2 control-label custom-label-style">صورة حول الوظيفة <span class="star">*</span></label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="img" id="img" style="direction: rtl;">
                    </div>
                  </div>
                </div>

                <div class="form-group col-sm-12">
                  <div class="row">
                    <label for="content" class="col-sm-2 control-label custom-label-style">معلومات الوظيفة <span class="star">*</span></label>
                    <div class="col-sm-10">
                        <textarea rows="4" class="form-control check_error" name="content" id="content" placeholder="ادخل معلومات حول الوظيفة"><?php if(isset($_POST['content'])) { echo $_POST['content']; } else { echo NULL; } ?></textarea>
                        <div class="alert alert-danger alert-dismissible" role="alert" style="">
                          <strong>تنبيه</strong> الحقل فارغ<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="form-group col-sm-12">
                  <div class="row">
                    <label for="section" class="col-sm-2 control-label custom-label-style">القسم <span class="star">*</span></label>
                    <div class="col-sm-10 check_select">
                      <select name="select-sec" id="section" class="col-sm-12">
                        <?php if(!isset($_POST['select-sec']) or isset($_POST['select-sec']) and $_POST['select-sec'] == '0') { echo '<option value="0">أختر قسم ....</option>'; } ?>
                        <?php 
                        
                        $sec_jops = $jops->select('*', 'jops_sections');
                        $sec_jops->execute(array());
                        $all_sections = $sec_jops->fetchAll();
                        
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
                </div>

                <hr>
                <h5 style="margin: 20px 0 40px;font-weight: 600;color: #999999">معلومات حول صاحب الطلب :</h5>
                <div class="row">
                <div class="form-group col-md-6 col-sm-12">
                  <div class="row">
                    <label for="name_company" class="col-sm-3 control-label custom-label-style">أسم الشركة</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name_company" id="name_company" value="<?php if(isset($_POST['name_company'])) { echo $_POST['name_company']; } else { echo NULL; } ?>" placeholder="ادخل أسم الشركة">
                    </div>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <div class="row">
                    <label for="address" class="col-sm-3 control-label custom-label-style">عنوان الشركة</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="address" id="address" value="<?php if(isset($_POST['address'])) { echo $_POST['address']; } else { echo NULL; } ?>" placeholder="ادخل عنوان الشركة">
                    </div>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <div class="row">
                    <label for="count" class="col-sm-3 control-label custom-label-style">عدد الموظفين</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="count" id="count" value="<?php if(isset($_POST['count'])) { echo $_POST['count']; } else { echo '1'; } ?>" placeholder="ادخل عدد الموظفين المطلوبين">
                    </div>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <div class="row">
                    <label for="mail" class="col-sm-3 control-label custom-label-style">البريد الألكتروني</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="mail" id="mail" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } else { echo NULL; } ?>" placeholder="أدخل البريد الألكتروني">
                    </div>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <div class="row">
                    <label for="site" class="col-sm-3 control-label custom-label-style">الموقع الشخصي</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="site" id="site" value="<?php if(isset($_POST['site'])) { echo $_POST['site']; } else { echo NULL; } ?>" placeholder="أدخل رابط الموقع الألكتروني">
                    </div>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <div class="row">
                    <label for="phone1" class="col-sm-3 control-label custom-label-style">رقم الهاتف</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="phone" id="phone" value="<?php if(isset($_POST['phone'])) { echo $_POST['phone']; } else { echo NULL; } ?>" placeholder="أدخل رقم الهاتف">
                    </div>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <div class="row">
                    <label for="type-work" class="col-sm-3 control-label custom-label-style">نوع الدوام</label>
                    <div class="col-sm-9">
                      <select name="type-work" id="type-work" class="col-sm-12">
                      <option value="دوام كامل">دوام كامل</option>
                      <option value="دوام كامل">دوام جزئي</option>
                      <option value="دوام كامل">عمل حر</option>
                      <option value="دوام كامل">عمل بأتفاق</option>
                      </select>
                    </div>
                  </div>
                </div>

                

                <div class="form-group col-md-6 col-sm-12">
                  <div class="row">
                    <label for="salary" class="col-sm-3 control-label custom-label-style">الراتب</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="salary" id="salary" value="<?php if(isset($_POST['salary'])) { echo $_POST['salary']; } else { echo NULL; } ?>" placeholder="أدخل الراتب">
                    </div>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <div class="row">
                    <label for="last-date" class="col-sm-3 control-label custom-label-style">تاريخ أنتهاء الطلب</label>
                    <div class="col-sm-9">
                        <input type="date" min="<?php echo date('Y-m-d'); ?>" class="form-control" name="last-date" id="last-date" value="<?php if(isset($_POST['last-date'])) { echo $_POST['last-date']; } else { echo NULL; } ?>" placeholder="أدخل تاريخ أنتهاء طلب الوظيفة" >
                    </div>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <div class="row">
                    <label for="experience" class="col-sm-3 control-label custom-label-style">سنوات الخبرة</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="experience" id="experience" value="<?php if(isset($_POST['experience'])) { echo $_POST['experience']; } else { echo NULL; } ?>" placeholder="أدخل عدد سنوات الخبرة">
                    </div>
                  </div>
                </div>

                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <button type="submit" name="add_jops" class="btn btn-block btn-success" style="margin:20px 0;">اضافة</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <!-- End Jops Turkey Section -->
    

      <!-- Start Clients Brands Section -->
      <?php require_once 'inc-front/upper-footer.php'; ?>
      <!-- Start Footer Section -->
      <?php require_once 'inc-front/footer.php'; ?>