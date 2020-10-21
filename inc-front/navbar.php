<!-- Start Navbar -->
    <nav class="sc-big">
        <?php
        
        $link_home = explode('/', $_SERVER['REQUEST_URI']);
        $file_open = array_pop($link_home);
        $ater_open = explode('?', $file_open)[0];
        ?>
        <div class="container">
          <ul>
            <li><a href="index.php" class="<?php if($file_open == 'index.php') { echo 'active'; } ?>" class="active">الرئيسية <img src="image/icons/home-<?php if($file_open == 'index.php') { echo 'blue'; } else { echo 'white'; } ?>.svg" alt="about oxygen" width="17px"></a></li>
            <li><a href="about.php" class="<?php if($file_open == 'about.php') { echo 'active'; } ?>">من نحن <img src="image/icons/about-<?php if($file_open == 'about.php') { echo 'blue'; } else { echo 'white'; } ?>.svg" alt="about oxygen" width="17px"></a></li>
            <li><a href="services.php" class="<?php if($file_open == 'services.php') { echo 'active'; } ?>" >خدماتنا <img src="image/icons/services-<?php if($file_open == 'services.php') { echo 'blue'; } else { echo 'white'; } ?>.svg" alt="services oxygen" width="16px"></a></li>
            <li><a href="works.php" class="<?php if($file_open == 'works.php') { echo 'active'; } ?>" >أنجازاتنا <img src="image/icons/badge-<?php if($file_open == 'works.php') { echo 'blue'; } else { echo 'white'; } ?>.svg" alt="achievements oxygen" width="17px"></a></li>
            <li><a href="blog/index.php" class="" >المدونة <img src="image/icons/star-white.svg" alt="for You" width="17px" style="top: 60%"></a></li>
            <li><a href="products.php?id=1" class="<?php if($file_open == 'products.php' or $ater_open == 'products.php' or $ater_open == 'details_product.php') { echo 'active'; } ?>" >متجر أوكسجين <img src="image/icons/shopping4-<?php if($file_open == 'products.php' or $ater_open == 'details_product.php') { echo 'blue'; } else { echo 'white'; } ?>.svg" alt="directory turkey" width="16px" style="top: 60%"></a></li>
            <li><a href="contact.php" class="<?php if($file_open == 'contact.php') { echo 'active'; } ?>" >مركز المساعدة <img src="image/icons/support-<?php if($file_open == 'contact.php') { echo 'blue'; } else { echo 'white'; } ?>.svg" alt="oxygen customer service" width="17.5px"></a></li>
          </ul>
        </div>
      </nav>
      <nav class="sc-small">
        <div class="container">
          <div class="menu-bar">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
          </div>
          <ul>
            <li><a href="index.php" class="<?php if($file_open == 'index.php') { echo 'active'; } ?>" >الرئيسية <img src="image/icons/home-<?php if($file_open == 'index.php') { echo 'white'; } else { echo 'blue'; } ?>.svg" alt="about oxygen" width="17px"></a></li>
            <li><a href="about.php" class="<?php if($file_open == 'about.php') { echo 'active'; } ?>" >من نحن <img src="image/icons/about-<?php if($file_open == 'about.php') { echo 'white'; } else { echo 'blue'; } ?>.svg" alt="about oxygen" width="17px"></a></li>
            <li><a href="services.php" class="<?php if($file_open == 'services.php') { echo 'active'; } ?>" >خدماتنا <img src="image/icons/services-<?php if($file_open == 'services.php') { echo 'white'; } else { echo 'blue'; } ?>.svg" alt="services oxygen" width="16px"></a></li>
            <li><a href="works.php" class="<?php if($file_open == 'works.php') { echo 'active'; } ?>" >أنجازاتنا <img src="image/icons/badge-<?php if($file_open == 'works.php') { echo 'white'; } else { echo 'blue'; } ?>.svg" alt="achievements oxygen" width="17px"></a></li>
            <li><a href="blog/index.php" class="<?php if($file_open == 'blog/index.php') { echo 'active'; } ?>" >المدونة <img src="image/icons/star-<?php if($file_open == 'blog/index.php') { echo 'white'; } else { echo 'blue'; } ?>.svg" alt="for You" width="17px" style="top: 60%"></a></li>
            <li><a href="products.php?id=1" class="<?php if($file_open == 'products.php' or $ater_open == 'products.php' or $ater_open == 'details_product.php') { echo 'active'; } ?>" >متجر أوكسجين <img src="image/icons/shopping4-<?php if($file_open == 'products.php' or $ater_open == 'details_product.php') { echo 'white'; } else { echo 'blue'; } ?>.svg" alt="shop" width="16px" style="top: 60%"></a></li>
            <li><a href="contact.php" class="<?php if($file_open == 'contact.php') { echo 'active'; } ?>" >مركز المساعدة <img src="image/icons/support-<?php if($file_open == 'contact.php') { echo 'white'; } else { echo 'blue'; } ?>.svg" alt="oxygen customer service" width="17.5px"></a></li>
          </ul>
        </div>
      </nav>
      <!-- End Navbar -->