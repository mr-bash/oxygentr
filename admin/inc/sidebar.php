
          <?php
          $link_home = explode('/', $_SERVER['REQUEST_URI']);
          $file_open = array_pop($link_home);
          
          $ater_open = explode('?', $file_open)[0];
          // echo '<pre>';
          // print_r($ater_open);
          // die();

          $msg = new inbox();
          $all = $msg->select('COUNT(*)', ' messages', 'WHERE type_read = 1');
          $all->execute(array());
          $count_msg = $all->fetchColumn();
          
          ?>
          <ul class="nav nav-sidebar">
            <li class="<?php if($file_open == 'index.php') { echo 'active'; } ?>" ><a href="./index.php"><i class="fas fa-cog"></i> لوحة التحكم <span class="sr-only">(current)</span></a></li>
            <li class="<?php if($file_open == 'clients.php' or $file_open == 'add_clients.php' or $ater_open == 'edit_clients.php' or $ater_open == 'clients.php') { echo 'active'; } ?>" ><a href="clients.php"><i class="fab fa-audible"></i> عملائنا</a></li>
            <li class="<?php if($file_open == 'about.php' or $file_open == 'add_about.php' or $ater_open == 'edit_about.php' or $ater_open == 'about.php') { echo 'active'; } ?>" ><a href="about.php"><i class="fas fa-question-circle"></i> من نحن</a></li>
            <li class="<?php if($file_open == 'services.php' or $file_open == 'add_services.php' or $ater_open == 'edit_services.php' or $ater_open == 'services.php') { echo 'active'; } ?>" ><a href="services.php"><i class="fas fa-sliders-h"></i> خدماتنا</a></li>
            <li class="<?php if($file_open == 'works.php' or $file_open == 'add_works.php' or $ater_open == 'edit_works.php' or $ater_open == 'works.php' or $ater_open == 'add_works.php') { echo 'active'; } ?>" ><a href="works.php"><i class="fas fa-trophy"></i> إنجازاتنا</a></li>
            <li class="<?php if($file_open == 'shop.php' or $file_open == 'add_product.php' or $ater_open == 'edit_product.php' or $ater_open == 'shop.php' or $ater_open == 'add_product.php' or $file_open == 'sections_shop.php' or $file_open == 'add_section_shop.php' or $ater_open == 'edit_section_shop.php') { echo 'active'; } ?>" ><a href="shop.php"><i class="fas fa-cart-arrow-down"></i> المتجر</a></li>
            <li class="<?php if($file_open == 'jops.php' or $file_open == 'add_jops.php' or $ater_open == 'edit_jops.php' or $ater_open == 'jops.php' or $ater_open == 'add_jops.php') { echo 'active'; } ?>" ><a href="jops.php"><i class="fas fa-briefcase"></i> فرص العمل</a></li>
            <li class="<?php if($file_open == 'inbox.php' or $ater_open == 'show_message.php') { echo 'active'; } ?>"><a href="inbox.php"><i class="fas fa-inbox"></i> البريد الوارد <?php if(isset($count_msg) and $count_msg > 0) { echo '<span class="num-msg">' . $count_msg . '</span>'; } ?></a></li>
            <li class="<?php if($file_open == 'ads.php' or $file_open == 'edit_ads.php' or $ater_open == 'edit_ads.php' or $ater_open == 'ads.php' or $ater_open == 'edit_ads.php') { echo 'active'; } ?>" ><a href="ads.php"><i class="fas fa-globe"></i> الأعلانات</a></li>
            <li class="<?php if($file_open == 'contact_info.php') { echo 'active'; } ?>" ><a href="contact_info.php"><i class="fas fa-info-circle"></i> معلومات الأتصال</a></li>
            <li class="<?php if($ater_open == 'profile.php') { echo 'active'; }  ?>" ><a href="profile.php?id=<?php echo $_SESSION['info_user']['id']; ?>"><i class="fas fa-user"></i> الملف الشخصي</a></li>
            <li class="<?php if($file_open == 'members.php' or $file_open == 'add_member.php' or $ater_open == 'edit_member.php') { echo 'active'; } ?>" ><a href="members.php"><i class="fas fa-users-cog"></i> الاعضاء المسجلين</a></li>
          </ul>
