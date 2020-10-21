    <!-- Start Section Files Css And Header Html -->
    <?php 
    require_once __DIR__ .'/app/core/init.php';
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
    <!-- <meta property="og:title"              content="When Great Minds Don’t Think Alike" /> -->
    <meta property="og:description"        content="مركز التواصل مع خدمة العملاء لا تتردد بالتواصل معنا" />
    <meta property="og:image"              content="http://oxygen-turkey.com/contact.jpg" />
    <title><?php echo 'تواصل معنا' . $title; ?></title>
    <?php require_once 'inc-front/header.php'; ?>
    <!-- Start Section Header Page [Top Header, Navbar, Cover] -->
    <?php require_once 'inc-front/header-nav.php'; ?>
    
    <!-- End Section Header Page -->

    <!-- Start Body Page -->

      <section class="contact">
        <div class="cover-global" style="top: 20px;">
        <?php 
          $ob_ads = new ads();
          $ads = $ob_ads->select('*', 'ads', 'WHERE id = 5');
          $ads->execute(array());
          $res = $ads->fetch();
          
          if($res['display'] == 1) {
            require_once 'inc-front/banner-ads.php'; 
          } else {
            echo '<h1 class="title-section">لا تتردد تواصل معنا للأستفسار</h1>';
          }
          
          ?>
        </div>
        <div class="container">
          <div class="container-items" style="padding-bottom: 30px;">
          <?php 

          $inbox = new inbox();
          if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['send_msg'])) {

            $inbox->get_input($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['subject'], $_POST['content'], '');
          
          }
          
          
          ?>
            <form class="form-horizontal form_clients" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="form-group custom-input">
                    <label for="name">الأسم</label>
                    <input type="text" name="name" value="<?php if(isset($_POST['name'])) { echo $_POST['name']; } ?>" placeholder="أدخل أسمك هنا">
                  </div>
                  <div class="form-group custom-input">
                    <label for="name">البريد الألكتروني</label>
                    <input type="text" name="email" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>"  placeholder="أدخل بريدك الألكتروني هنا">
                  </div>
                  <div class="form-group custom-input">
                    <label for="name">الهاتف</label>
                    <input type="text" name="phone" value="<?php if(isset($_POST['phone'])) { echo $_POST['phone']; } ?>"  placeholder="أدخل رقم هاتفك هنا">
                  </div>
                  <div class="form-group custom-input">
                    <label for="name">الموضوع</label>
                    <input type="text" name="subject" value="<?php if(isset($_POST['subject'])) { echo $_POST['subject']; } ?>"  placeholder="أدخل موضوع الرسالة هنا">
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="form-group form-group-custom">
                    <label for="content">الرسالة</label>
                    <div class="custom-textarea">
                      <textarea name="content" id="content" placeholder="أدخل الرسالة هنا"><?php if(isset($_POST['content'])) { echo $_POST['content']; } ?></textarea>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                    </div>
                  </div>
                  <div class="form-group box-send">
                    <input type="submit" name="send_msg" value="أرسال" class="btn-send">
                    <i class="fas fa-paper-plane"></i>
                  </div>
                </div>
              </div>
            </form>
              <div class="information-contact">
                <div class="row">
                  <div class="col-md-6 col-sm-12">
                    <div class="socialmedia">
                      <a href="https://wa.me/+<?php echo $conn_data['whatsapp']; ?>" target="_blank"><img src="image/icons/whatsApp.svg" alt="">
                      <a href="<?php echo $conn_data['facebook']; ?>" target="_blank"><img src="image/icons/Facebook.svg" alt="">
                      <a href="<?php echo $conn_data['twitter']; ?>" target="_blank"><img src="image/icons/twitter.svg" alt="">
                      <a href="<?php echo $conn_data['behance']; ?>"><img src="image/icons/behance.svg" alt="">
                      <!-- <a href="<?php echo $conn_data['facebook']; ?>"><img src="image/icons/linkedin.svg" alt=""> -->
                      <a href="<?php echo $conn_data['youtube']; ?>" target="_blank"><img src="image/icons/youtube.svg" alt="">
                      <a href="<?php echo $conn_data['instagram']; ?>" target="_blank"><img src="image/icons/Instagram.svg" alt="">
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="info">
                      <div>
                        <img src="image/icons/location.svg" alt="">
                        <a href="https://g.page/oxygen-istanbul" target="_blank" style="font-family: 'Raleway'"><?php echo $conn_data['address']; ?></a>
                      </div>
                      <div class="to-left">
                        <bdo><?php echo $conn_data['phone1'] . ' / ' . $conn_data['phone2']; ?></bdo> <span>أرقامنا :</span>
                        <img src="image/icons/smartphone.svg" alt="">
                      </div>
                      <div>
                        <img src="image/icons/mail.svg" alt="">
                        <span>بريدنا الألكتروني: </span><span style="font-family: 'Raleway'"><?php echo $conn_data['email']; ?></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </section>

            <!-- End Jops Section -->

      <!-- Start Clients Brands Section -->
      <?php require_once 'inc-front/upper-footer.php'; ?>
      <!-- Start Footer Section -->
      <?php require_once 'inc-front/footer.php'; ?>