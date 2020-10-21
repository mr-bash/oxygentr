    <!-- Start Header Section -->
    <?php require_once __DIR__ .'/../app/core/session.php'; ?>
    <?php require_once 'inc/top-header.php'; ?>
    <title><?php echo SITENAME; ?> - أضافة عضو جديد</title>
    <!-- Files CSS -->
    <link rel="stylesheet" href="../webfonts/custom-fonts.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/apexcharts.css">
    <link rel="stylesheet" href="css/dashbaord.css">
    <link rel="stylesheet" href="../css/style.css">
    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/html5shiv.min.js"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/respond.min.js"></script>
    <![endif]-->
    <style>
    .jops-turkey div.title::after
    {
      width: 96.5%;
      right: 20px;
    }
    </style>
    </head>

    <body>
    <?php require_once 'inc/navbar.php'; ?>
    
    <!-- End Section Header Page -->

    <!-- Start Body Page -->
      <!-- Start Show Jops Turkey Section -->

      <section class="jops-turkey show-jop">
        <div class="cover-global">
          <h1 class="title-section">فرص العمل في تركيا</h1>
        </div>
        <div class="container">
          <div class="container-items">
            <div class="row no-gutters">
              <div>
                <aside class="sections-jops">
                  <?php
                  
                  $jops = new jops();
                  $id = 0;
                  if(isset($_GET['id']) and is_numeric($_GET['id'])) {
                    $id = $_GET['id'];
                  } else {
                    $id = 0;
                  }

                  $all_jops = $jops->select('*', 'jops', 'WHERE jop_id = ?');
                  $all_jops->execute(array($id));
                  $data_jops = $all_jops->fetch();

                  $check_sec = false;
                  $ch = $jops->select("*", "jops_sections", "WHERE sec_id = ?");
                  $ch->execute(array($data_jops['jop_section']));
                  $info = $ch->rowCount();
                  $data_id = $ch->fetch();
                  if($info > 0) {
                    $check_sec = true;
                  }
                  if(!$check_sec) {
                    messages::set_msg('danger', 'عذراً', 'الصفحة غير <strong> موجودة</strong>');
                    $jops->redirecr_page(messages::$msg_alert, './', 0);
                  }

                  $sections_jop = $jops->select('*', 'jops_sections', 'WHERE sec_id != ?');
                  $sections_jop->execute(array($id));
                  $all_sec = $sections_jop->fetchAll();
                  ?>
                </aside>
              </div>
              <div class="col-md-12">
                <div class="row no-gutters">
                  <div class="col-md-6 col-sm-12">
                    <div class="details-header">
                      <div>
                        <img src="../image/icons/factory.svg" alt=""> <span>أسم الشركة : <span style="font-family: 'Raleway'"><?php echo $data_jops['jop_company']; ?></span></span>
                      </div>
                      <div>
                        <img src="../image/icons/placeholder-2.svg" alt=""> <span>العنوان : <span><?php echo $data_jops['jop_address']; ?></span></span>
                      </div>
                      <div>
                        <img src="../image/icons/collaboration.svg" alt=""> <span >العدد المطلوب : <span style="font-family: 'Raleway'"><?php echo $data_jops['jop_count']; ?></span></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="details-header">
                      <div>
                        <img src="../image/icons/email-2.svg" alt=""> <span>البريد الألكتروني : <span style="font-family: 'Raleway'"><?php echo $data_jops['jop_email']; ?></span></span>
                      </div>
                      <div>
                        <img src="../image/icons/domain.svg" alt=""> <span>الموقع الألكتروني : <a href="<?php echo $data_jops['jop_site']; ?>" style="font-family: 'Raleway'" target="_blank"><?php echo $data_jops['jop_site']; ?></a></span>
                      </div>
                      <div>
                        <img src="../image/icons/smartphone-2.svg" alt=""> <span>رقم الهاتف : <span><bdi><?php echo $data_jops['jop_phone']; ?></bdi></span></span>
                      </div>
                    </div>
                  </div>
                  <div class="row no-gutters">
                    <div class ="col-md-8 col-sm-12">
                      <div class="container-content" style="width: 100%;">
                        <div class="about-content">
                          <div class="box-img"><img src="uplodas/<?php echo $data_jops['jop_dir'] . '/' . $data_jops['jop_img']; ?>" alt="<?php echo $data_jops['jop_title'] ?>"></div>
                          <h3><?php echo $data_jops['jop_title']; ?></h3>
                          <div class="about-post">
                            <div><img src="../image/icons/price-tag.svg" alt=""> <a href="../jops_cat.php?id=<?php echo $data_id['sec_id']; ?>" target="_blank"><?php echo $data_id['sec_name']; ?></a></div>
                            <div><img src="../image/icons/calendar-2.svg" alt=""> <span class="date"><?php echo $data_jops['jop_date']; ?></span> <img src="image/icons/timer.svg" alt=""> <span class="time"> 12:30 ص</span></div>
                          </div>
                        </div>
                        <div class="text-content">
                          <p>
                            <?php echo $data_jops['jop_content']; ?>
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                      <aside>
                        <div>
                          <h5>نوع الدوام</h5>
                          <span><?php echo $data_jops['jop_type']; ?></span>
                        </div>
                        <div>
                          <h5>الراتب</h5>
                          <span>- <?php echo $data_jops['jop_salary']; ?> -</span>
                        </div>
                        <div>
                          <h5>آخر موعد للتقديم</h5>
                          <span><?php echo $data_jops['jop_lastdate']; ?></span>
                        </div>
                        <div>
                          <h5>عدد سنوات الخبرة</h5>
                          <span><?php echo $data_jops['jop_experience']; ?></span>
                        </div>
                        <div class="share">
                          <a href="#">مشاركة <img src="../image/icons/share.svg" alt=""></a>
                        </div>
                      </aside>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <a href="jops.php" class="go-back">رجوع <i class="fas fa-undo"></i></a>
        </div>
        
      </section>
      <!-- End Show Jops Turkey Section -->

    <!-- Start Footer Page Section -->
    <?php require_once 'inc/footer.php'; ?>