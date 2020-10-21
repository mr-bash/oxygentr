    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="../"><img src="../image/oxygen.png" alt="brand oxygen"> لوحة التحكم  - مجموعة أوكسجين</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
          <?php 
          
          $link_home = explode('/', $_SERVER['REQUEST_URI']);
          $file_open = array_pop($link_home);
          $ater_open = explode('?', $file_open)[0];

          $msg = new inbox();
          $all = $msg->select('COUNT(*)', ' messages', 'WHERE type_read = 1');
          $all->execute(array());
          $count_msg = $all->fetchColumn();
          
          
          ?>
          <?php if(isset($_SESSION['loged']) and $_SESSION['loged'] == true) { ?>
            <li class="<?php if($file_open == 'index.php') { echo 'active'; } ?> sc-small"><a href="./index.php"><i class="fas fa-cog"></i> لوحة التحكم <span class="sr-only">(current)</span></a></li>
            <li class="<?php if($file_open == 'clients.php' or $file_open == 'add_clients.php' or $ater_open == 'edit_clients.php' or $ater_open == 'clients.php') { echo 'active'; } ?> sc-small"><a href="clients.php"><i class="fab fa-audible"></i> عملائنا</a></li>
            <li class="<?php if($file_open == 'about.php' or $file_open == 'add_about.php' or $ater_open == 'edit_about.php' or $ater_open == 'about.php') { echo 'active'; } ?> sc-small"><a href="about.php"><i class="fas fa-question-circle"></i> من نحن</a></li>
            <li class="<?php if($file_open == 'services.php' or $file_open == 'add_services.php' or $ater_open == 'edit_services.php' or $ater_open == 'services.php') { echo 'active'; } ?> sc-small"><a href="services.php"><i class="fas fa-sliders-h"></i> خدماتنا</a></li>
            <li class="<?php if($file_open == 'works.php' or $file_open == 'add_works.php' or $ater_open == 'edit_works.php' or $ater_open == 'works.php') { echo 'active'; } ?> sc-small"><a href="works.php"><i class="fas fa-trophy"></i> إنجازاتنا</a></li>
            <li class="<?php if($file_open == 'shop.php' or $file_open == 'add_product.php' or $ater_open == 'edit_product.php' or $ater_open == 'shop.php' or $ater_open == 'add_product.php' or $file_open == 'sections_shop.php' or $file_open == 'add_section_shop.php' or $ater_open == 'edit_section_shop.php') { echo 'active'; } ?> sc-small"><a href="shop.php"><i class="fas fa-cart-arrow-down"></i> المتجر</a></li>
            <li class="<?php if($file_open == 'jops.php' or $file_open == 'add_jops.php' or $ater_open == 'edit_jops.php' or $ater_open == 'jops.php') { echo 'active'; } ?> sc-small"><a href="jops.php"><i class="fas fa-trophy"></i> فرص العمل</a></li>
            <li class="<?php if($file_open == 'inbox.php' or $ater_open == 'show_message.php') { echo 'active'; } ?> sc-small"><a href="inbox.php"><i class="fas fa-inbox"></i><?php if(isset($count_msg) and $count_msg > 0) { echo '<span class="num-msg">' . $count_msg . '</span>'; } ?> البريد الوارد</a></li>
            <li class="<?php if($file_open == 'contact_info.php') { echo 'active'; } ?> sc-small"><a href="contact_info.php"><i class="fas fa-info-circle"></i> معلومات الأتصال</a></li>
            <li class="<?php if($file_open == 'ads.php' or $file_open == 'edit_ads.php' or $ater_open == 'edit_ads.php' or $ater_open == 'ads.php') { echo 'active'; } ?> sc-small"><a href="ads.php"><i class="fas fa-globe"></i> الأعلانات</a></li>
            <li class="<?php if($ater_open == 'profile.php') { echo 'active'; } ?> sc-small"><a href="profile.php?id=<?php echo $_SESSION['info_user']['id']; ?>"><i class="fas fa-user"></i> الملف الشخصي</a></li>
            <li class="<?php if($file_open == 'members.php' or $file_open == 'add_member.php' or $ater_open == 'edit_member.php') { echo 'active'; } ?> sc-small"><a href="members.php"><i class="fas fa-users-cog"></i> الاعضاء المسجلين</a></li>
            <li class="sc-small"><a href="../"><i class="glyphicon glyphicon-home"></i> مشاهدة الموقع</a></li>
            <li class="sc-small"><a href="logout.php"><i class="fas fa-sign-out-alt"></i> تسجيل الخروج</a></li>
          <?php } ?>
            <li class="sc-big"><a href="../" target="_blank"><i class="glyphicon glyphicon-home"></i> مشاهدة الموقع</a></li>

            <?php if(isset($_SESSION['loged']) and $_SESSION['loged'] == true) { ?>
            <li class="dropdown sc-big" id="test" >
              <a class="sc-big" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="padding: 15px 41px;"><i class="glyphicon glyphicon-cog"></i> الاعدادات <span class="caret"></span></a>
              <ul class="dropdown-menu" style="right: -46px;">
                <li><a href="profile.php?id=<?php echo $_SESSION['info_user']['id']; ?>">الملف الشخصي</a></li>
                <li><a href="contact_info.php">معلومات الأتصال</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="logout.php">تسجيل الخروج</a></li>
              </ul>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>