    <!-- Start Section Files Css And Header Html -->
    <?php require_once __DIR__ .'/app/core/init.php'; ?>
    <?php 
    $contact_data = new inbox();
    $d = $contact_data->select('*', 'contact');
    $d->execute(array());
    $conn_data = $d->fetch();    

    $title = ' - مجموعة أوكسجين';
    $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
    "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  
    $_SERVER['REQUEST_URI']; 


    ?>
    <!DOCTYPE html>
    <html lang="ar">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport"                  content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible"     content="ie=edge">
    <meta property="og:url"                content="<?php echo $link; ?> "/>
    <meta property="og:type"               content="website" />
    <meta property="og:description"        content="تعرف على أعمال وفعاليات مجموعة أوكسجين أكثر وشاهد آخر الأعمال التي تم أنجازها" />
    <meta property="og:image"              content="http://oxygen-turkey.com/portfolio.jpg" />
    <title><?php echo 'الأعمال والفعاليات' . $title; ?></title>
    <?php require_once 'inc-front/header.php'; ?>
    <!-- Start Section Header Page [Top Header, Navbar, Cover] -->
    <?php require_once 'inc-front/header-page.php'; ?>
    
    <!-- End Section Header Page -->

    <!-- Start Body Page -->
      <!-- Start About Section -->

      <section class="works">
        <div class="cover-global">
        <?php 
          $ob_ads = new ads();
          $ads = $ob_ads->select('*', 'ads', 'WHERE id = 3');
          $ads->execute(array());
          $res = $ads->fetch();
          
          if($res['display'] == 1) {
            require_once 'inc-front/banner-ads.php'; 
          } else {
            echo '<h1 class="title-section">أعمال وفعاليات مجموعة أوكسجين</h1>';
          }
          
          ?>
        </div>
        <div class="container">
          <div class="container-items">
            <?php
            $link_home = explode('/', $_SERVER['REQUEST_URI']);
            $file_open = array_pop($link_home);
            ?>
            <input id="file-work" type="hidden" value="<?php echo $file_open; ?>">
            <div class="type-work">
              <?php
                $work = new works();
                $get_sections = $work->select('*', 'works_sections');
                $get_sections->execute(array());
                $sections = $get_sections->fetchAll();
                
                foreach ($sections as $section) {

              ?>
              <!-- <a href="#">test</a> -->
              <a href="works.php?id=<?php echo $section['sec_id']; ?>" class="<?php if(isset($_GET['id']) and $_GET['id'] == $section['sec_id']) { echo 'active'; } ?>"><?php echo $section['sec_name']; ?></span>
              <?php } ?>
            </div>
            <div class="container-projects">
              <div class="row no-gutters">
                <?php
                if(isset($_GET['id']) and is_numeric($_GET['id'])) {
                  $id = $_GET['id'];
                } else {
                  $id = 0;
                }
  
                $sec_works = $work->select('*', ' works_sections', 'WHERE sec_id = ?');
                $sec_works->execute(array($id));
                $info = $sec_works->fetch();
                $check = $sec_works->rowCount();
  
                if($check == 0 and $id != 0 or isset($_GET['id']) and $id == 0) {
                  messages::set_msg('danger', 'خطأ', ' الصفحة المطلوبة غير <strong> موجودة</strong>');
                  $work->redirecr_page(messages::$msg_alert, 'works.php', 1);
                  exit();
                }

                if(isset($_GET['id']) and $id != 0) {
                  $items_works = $work->select('*', ' works', 'WHERE section_id = ?');
                  $items_works->execute(array($id));
                  $items = $items_works->fetchAll();

                  foreach ($items as $item) {
                
                ?>
                <div class="col-md-4 col-sm-12">
                  <div class="box-project">
                    <img src="<?php echo 'http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/' . $item['dir'] . '/' . $item['work_image_main']; ?>" alt="img works">
                    <div class="opc"></div>
                    <div class="info-project">
                      <h2 style="font-family: 'Raleway'"><a href="details_work.php?id=<?php echo $item['work_id']; ?>"><?php echo $item['work_name']; ?></a></h2>
                      <span><a href="details_work.php?id=<?php echo $item['work_id']; ?>"><img src="image/icons/view-project.svg" alt="<?php echo $item['work_name']; ?>" ></a></span>
                    </div>
                  </div>
                </div>
                <?php } 
                
                  } else {
                  $items_works = $work->select('*', ' works', 'WHERE section_id = 1');
                  $items_works->execute(array());
                  $get_items = $items_works->fetchAll();

                  foreach ($get_items as $get_item) {

                  ?>
                  
                  <div class="col-md-4 col-sm-12">
                    <div class="box-project">
                      <img src="<?php echo 'http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/' . $get_item['dir'] . '/' . $get_item['work_image_main']; ?>" alt="img works">
                      <div class="opc"></div>
                      <div class="info-project">
                        <h2 style="font-family: 'Raleway'"><a href="details_work.php?id=<?php echo $get_item['work_id']; ?>"><?php echo $get_item['work_name']; ?></a></h2>
                        <span><a href="details_work.php?id=<?php echo $get_item['work_id']; ?>"><img src="image/icons/view-project.svg" alt="<?php echo $get_item['work_name']; ?>" ></a></span>
                      </div>
                    </div>
                  </div>

                  <?php } 
                  
                  }?>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- End About Section -->

      <!-- Start Gallery Section -->



      <!-- End Gallery Section -->
    

      <!-- Start Clients Brands Section -->
      <?php require_once 'inc-front/upper-footer.php'; ?>
      <!-- Start Footer Section -->
      <?php require_once 'inc-front/footer.php'; ?>