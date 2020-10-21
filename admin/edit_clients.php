    <!-- Start Header Section -->
    <?php require_once __DIR__ .'/../app/core/session.php'; ?>
    <?php require_once 'inc/top-header.php'; ?>
    <title><?php echo SITENAME; ?> - تعديل بيانات شركة</title>
    <?php require_once 'inc/header.php'; ?>
    
    <!-- Start Content Page Section -->
    <div class="container-fluid">
      <div class="row">
      <!-- Start Sidebar Page Section -->
        <div class="col-sm-3 col-md-2 sidebar">
          <?php require_once 'inc/sidebar.php'; ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> تعديل بيانات شركة</h1>
          <div class="row">
            <div class="col-md-10">
              <?php
              $id = 0;
              if(isset($_GET['id']) and is_numeric($_GET['id'])) {
                $id = $_GET['id'];
              } else {
                $id = 0;
              }
              $clients = new clients();
              $company = $clients->select('*', 'clients_company', 'WHERE id = ?');
              $company->execute(array($id));
              $info = $company->fetch();

              if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['edit_clients'])) {

                $brand_footer = 0;
                if(isset($_POST['check_brand'])) {
                  $brand_footer = $_POST['check_brand'];
                }
                $clients->get_input($_FILES['brand'], $_POST['title'], $_POST['link'], $_POST['desc'], $_FILES['image_1'], $_FILES['image_2'], $_FILES['image_3'], $_FILES['image_4'], $_FILES['image_5'], $_POST['select-sec'], $_POST['address'], $_POST['type'], $_POST['count'], $_POST['site'], $_POST['phone1'], $_POST['phone2'], $_POST['mail'], $_POST['face'], $_POST['twetter'], $_POST['insta'], $_POST['youtube'], $_POST['whatsapp'], 'edit', $_POST['id'], $brand_footer);
              
              }

              if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['del_img1'])) {
                $img_exist = true;
                $del1 = $clients->update('clients_company', 'image_1 = 0', 'WHERE id = ?');
                $del1->execute(array($_POST['id_1']));
                $clients->redirecr_page('Deleted...', $_SERVER['HTTP_REFERER'], 0);
                die();

              }

              if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['del_img2'])) {

                $del1 = $clients->update('clients_company', 'image_2 = 0', 'WHERE id = ?');
                $del1->execute(array($_POST['id_2']));
                $clients->redirecr_page('Deleted...', $_SERVER['HTTP_REFERER'], 0);
                die();
              }

              if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['del_img3'])) {

                $del1 = $clients->update('clients_company', 'image_3 = 0', 'WHERE id = ?');
                $del1->execute(array($_POST['id_3']));
                $clients->redirecr_page('Deleted...', $_SERVER['HTTP_REFERER'], 0);
                die();
              }

              if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['del_img4'])) {

                $del1 = $clients->update('clients_company', 'image_4 = 0', 'WHERE id = ?');
                $del1->execute(array($_POST['id_4']));
                $clients->redirecr_page('Deleted...', $_SERVER['HTTP_REFERER'], 0);
                die();
              }

              if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['del_img5'])) {

                $del1 = $clients->update('clients_company', 'image_5 = 0', 'WHERE id = ?');
                $del1->execute(array($_POST['id_5']));
                $clients->redirecr_page('Deleted...', $_SERVER['HTTP_REFERER'], 0);
                die();
              }
              
              ?>
              <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="brand" class="col-sm-2 control-label">شعار الشركة </label>
                  <div class="col-sm-10">
                      <input type="file" class="form-control edit_img" name="brand" id="brand">
                      <a href="<?php echo dirname(__FILE__) . '/uplodas/' . $info["dir"] . '/' . $info['brand'] ?>" target="_blank"><img src="uplodas/<?php echo $info['dir'] . '/' . $info['brand']; ?>" class="thumblis-panel"></a>
                  </div>

                  <div class="col-sm-10">
                  <label for="check_brand" class="col-sm-6 control-label custom-label">أضافة الشعار داخل الفوتر أسفل الصفحة </label>
                    <input type="checkbox" class="form-control custom-checkbox" name="check_brand" value="1" id="check_brand" <?php if($info["brand_footer"] == 1) { echo 'checked'; } ?> >
                  </div>
                </div>

                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">أسم الشركة</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" name="title" id="title" value="<?php echo $info['name']; ?>" placeholder="ادخل أسم الشركة">
                      <input type="hidden" name="id" value="<?php echo $info['id']; ?>" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="link" class="col-sm-2 control-label">رابط الفيديو</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" name="link" id="link" value="<?php echo $info['link_video']; ?>" placeholder="ادخل رابط فيديو اليوتيوب كاملاً الخاص بالشركة">
                  </div>
                </div>

                <div class="form-group">
                  <label for="desc" class="col-sm-2 control-label">حول الشركة</label>
                  <div class="col-sm-10">
                      <textarea rows="4" class="form-control" name="desc" id="desc" placeholder="ادخل وصف حول الشركة"><?php echo $info['description']; ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="image1" class="col-sm-2 control-label">صور حول الشركة </label>
                  <div class="col-sm-10">
                      <input type="file" class="form-control <?php if($info['image_1'] != 0) { echo 'edit_img';} ?>" name="image_1" id="image1">
                      <?php
                        if($info['image_1'] != 0) {
                          echo '<a href="' . dirname(__FILE__) . '/uplodas/' . $info["dir"] . '/' . $info['image_1'] . '" target="_blank"><img src="uplodas/' . $info["dir"] . '/' . $info['image_1'] . '" class="thumblis-panel"></a>'; 
                        
                      ?>
                        <input type="hidden" value="<?php echo $id; ?>" name="id_1">
                      <?php }?>
                      <input type="file" class="form-control <?php if($info['image_2'] != 0) { echo 'edit_img';} ?>" name="image_2" id="image2">
                      <?php
                        if($info['image_2'] != 0) {
                          echo '<a href="' . dirname(__FILE__) . '/uplodas/' . $info["dir"] . '/' . $info['image_2'] . '" target="_blank"><img src="uplodas/' . $info["dir"] . '/' . $info['image_2'] . '" class="thumblis-panel"></a>'; 
                        
                      ?>
                        <input type="submit" value="Delete" name="del_img2" class="del-img">
                        <input type="hidden" value="<?php echo $id; ?>" name="id_2">
                      <?php }?>
                      <input type="file" class="form-control <?php if($info['image_3'] != 0) { echo 'edit_img';} ?>" name="image_3" id="image3">
                      <?php
                        if($info['image_3'] != 0) {
                          echo '<a href="' . dirname(__FILE__) . '/uplodas/' . $info["dir"] . '/' . $info['image_3'] . '" target="_blank"><img src="uplodas/' . $info["dir"] . '/' . $info['image_3'] . '" class="thumblis-panel"></a>'; 
                        
                      ?>
                        <input type="submit" value="Delete" name="del_img3" class="del-img">
                        <input type="hidden" value="<?php echo $id; ?>" name="id_3">
                      <?php }?>
                      <input type="file" class="form-control <?php if($info['image_4'] != 0) { echo 'edit_img';} ?>" name="image_4" id="image4">
                      <?php
                        if($info['image_4'] != 0) {
                          echo '<a href="' . dirname(__FILE__) . '/uplodas/' . $info["dir"] . '/' . $info['image_4'] . '" target="_blank"><img src="uplodas/' . $info["dir"] . '/' . $info['image_4'] . '" class="thumblis-panel"></a>'; 
                        
                      ?>
                        <input type="submit" value="Delete" name="del_img4"  class="del-img">
                        <input type="hidden" value="<?php echo $id; ?>" name="id_4">
                      <?php }?>
                      <input type="file" class="form-control <?php if($info['image_5'] != 0) { echo 'edit_img';} ?>" name="image_5" id="image5">
                      <?php
                        if($info['image_5'] != 0) {
                          echo '<a href="' . dirname(__FILE__) . '/uplodas/' . $info["dir"] . '/' . $info['image_5'] . '" target="_blank"><img src="uplodas/' . $info["dir"] . '/' . $info['image_5'] . '" class="thumblis-panel"></a>'; 
            
                      ?>
                        <input type="submit" value="Delete" name="del_img5"  class="del-img confirm">
                        <input type="hidden" value="<?php echo $id; ?>" name="id_5">
                      <?php }?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="section" class="col-sm-2 control-label">القسم</label>
                  <div class="col-sm-10">
                    <select name="select-sec" id="section" class="col-sm-12">
                    <?php
                      
                      $sec_clients = $clients->select('*', 'clients_sections');
                      $sec_clients->execute(array());
                      $all_sections = $sec_clients->fetchAll();
                      
                      foreach($all_sections as $sec) {
                      ?>
                      <option value="<?php echo $sec['sec_id']; ?>" <?php if($sec['sec_id'] == $info['section_id']) { echo 'selected'; } else { echo NULL; } ?> ><?php echo $sec['sec_name']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <hr>
                <h5>معلومات حول الشركة :</h5>
                <div class="form-group col-md-6 col-sm-12">
                  <label for="address" class="col-sm-4 control-label">العنوان</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="address" id="address" value="<?php echo $info['address']; ?>" placeholder="ادخل عنوان الشركة">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="type" class="col-sm-4 control-label">التصنيف</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="type" id="type" value="<?php echo $info['type']; ?>" placeholder="ادخل تصنيف الشركة">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="count" class="col-sm-4 control-label">عدد الفروع</label>
                  <div class="col-sm-8">
                      <input type="number" class="form-control" name="count" id="count" value="<?php echo $info['number_branches']; ?>" placeholder="ادخل عدد الفروع">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="site" class="col-sm-4 control-label">الموقع الألكتروني</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="site" id="site" value="<?php echo $info['web_site']; ?>" placeholder="أدخل رابط الموقع الألكتروني">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="phone1" class="col-sm-4 control-label">رقم الهاتف 1</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="phone1" id="phone1" value="<?php echo $info['phone_1']; ?>" placeholder="أدخل رقم الهاتف">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="phone2" class="col-sm-4 control-label">رقم الهاتف 2</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="phone2" id="phone2" value="<?php echo $info['phone_2']; ?>" placeholder="أدخل رقم هاتف آخر متوفر">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="mail" class="col-sm-4 control-label">البريد الألكتروني</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="mail" id="mail" value="<?php echo $info['email']; ?>" placeholder="أدخل البريد الألكتروني">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="face" class="col-sm-4 control-label">Facebook</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="face" id="face" value="<?php echo $info['facebook']; ?>" placeholder="أدخل حساب Facebook">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="twetter" class="col-sm-4 control-label">Twetter</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="twetter" id="twetter" value="<?php echo $info['twetter']; ?>" placeholder="أدخل حساب Twetter">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="insta" class="col-sm-4 control-label">Instagram</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="insta" id="insta" value="<?php echo $info['insta']; ?>" placeholder="أدخل حساب Instagram">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="youtube" class="col-sm-4 control-label">Youtube</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="youtube" id="youtube" value="<?php echo $info['youtube']; ?>" placeholder="أدخل حساب Youtube">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                  <label for="whatsapp" class="col-sm-4 control-label">Whatsapp</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="whatsapp" id="whatsapp" value="<?php echo $info['whatsapp']; ?>" placeholder="أدخل حساب Whatsapp">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" name="edit_clients" class="btn btn-block btn-success" style="margin:20px 0;">تعديل</button>
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


