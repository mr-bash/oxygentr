    <!-- Start Header Section -->
    <?php require_once __DIR__ .'/../app/core/session.php'; ?>
    <?php require_once 'inc/top-header.php'; ?>
    <title><?php echo SITENAME; ?> - أضافة قسم لـ حول الشركة</title>
    <?php require_once 'inc/header.php'; ?>
    
    <!-- Start Content Page Section -->
    <div class="container-fluid">
      <div class="row">
      <!-- Start Sidebar Page Section -->
        <div class="col-sm-3 col-md-2 sidebar">
          <?php require_once 'inc/sidebar.php'; ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> أضافة منتج جديد</h1>
          <div class="row">
            <div class="col-md-10">
            <?php
            
            $shop = new shop();

            $id = 0;
            if(isset($_GET['id']) and is_numeric($_GET['id'])) {
              $id = $_GET['id'];
            } else {
              $id = 0;
            }

            $company = $shop->select('*', 'shop', 'WHERE id = ?');
            $company->execute(array($id));
            $info = $company->fetch();

            if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['edit_product'])) {

              $shop->get_input($_POST['name'], $_POST['code'], $_POST['select-sec'], $_POST['content'], $_FILES['image_1'], $_FILES['image_2'], $_FILES['image_3'], $_FILES['image_4'], $_FILES['image_5'], $_FILES['image_6'], $_FILES['image_7'], $_FILES['image_8'], 'edit', $_POST['product_id']);

            }

            if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['del_img2'])) {

              $del1 = $shop->update('shop', 'img_2 = 0', 'WHERE id = ?');
              $del1->execute(array($_POST['id_2']));
              $shop->redirecr_page('Deleted...', $_SERVER['HTTP_REFERER'], 0);
              die();
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['del_img3'])) {

              $del1 = $shop->update('shop', 'img_3 = 0', 'WHERE id = ?');
              $del1->execute(array($_POST['id_3']));
              $shop->redirecr_page('Deleted...', $_SERVER['HTTP_REFERER'], 0);
              die();
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['del_img4'])) {

              $del1 = $shop->update('shop', 'img_4 = 0', 'WHERE id = ?');
              $del1->execute(array($_POST['id_4']));
              $shop->redirecr_page('Deleted...', $_SERVER['HTTP_REFERER'], 0);
              die();
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['del_img5'])) {

              $del1 = $shop->update('shop', 'img_5 = 0', 'WHERE id = ?');
              $del1->execute(array($_POST['id_5']));
              $shop->redirecr_page('Deleted...', $_SERVER['HTTP_REFERER'], 0);
              die();
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['del_img6'])) {

              $del1 = $shop->update('shop', 'img_6 = 0', 'WHERE id = ?');
              $del1->execute(array($_POST['id_6']));
              $shop->redirecr_page('Deleted...', $_SERVER['HTTP_REFERER'], 0);
              die();
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['del_img7'])) {

              $del1 = $shop->update('shop', 'img_7 = 0', 'WHERE id = ?');
              $del1->execute(array($_POST['id_7']));
              $shop->redirecr_page('Deleted...', $_SERVER['HTTP_REFERER'], 0);
              die();
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['del_img8'])) {

              $del1 = $shop->update('shop', 'img_8 = 0', 'WHERE id = ?');
              $del1->execute(array($_POST['id_8']));
              $shop->redirecr_page('Deleted...', $_SERVER['HTTP_REFERER'], 0);
              die();
            }
            ?>
              <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">أسم المنتج<span class="star">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" id="name" value="<?php if(isset($info['name'])) { echo $info['name']; } ?>" placeholder="ادخل أسم المنتج">
                        <input type="hidden" name="product_id" value="<?php echo $_GET['id']; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="code" class="col-sm-3 control-label">كود المنتج<span class="star">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="code" id="code" value="<?php if(isset($info['code'])) { echo $info['code']; } ?>" placeholder="ادخل كود المنتج">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="section" class="col-sm-3 control-label">القسم <span class="star">*</span></label>
                    <div class="col-sm-9 check_select">
                      <select name="select-sec" id="section" class="col-sm-12">
                        <?php 
                        
                        $sec_shop = $shop->select('*', 'shop_section');
                        $sec_shop->execute(array());
                        $all_sections = $sec_shop->fetchAll();
                        
                        foreach($all_sections as $sec) {
                        ?>
                        <option value="<?php echo $sec['section_id']; ?>" <?php if($sec['section_id'] == $info['cat_id']) { echo 'selected'; } else { echo NULL; } ?> ><?php echo $sec['section_name']; ?></option>
                        <?php } ?>
                      </select>

                    </div>
                  </div>

                  <div class="form-group">
                    <label for="content" class="col-sm-3 control-label">معلومات حول المنتج</label>
                    <div class="col-sm-9">
                        <textarea rows="8" class="form-control" name="content" id="content" placeholder="ادخل معلومات حول المنتج"><?php if(isset($info['content'])) { echo $info['content']; } ?></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="image_1" class="col-sm-3 control-label">صورة المنتج الرئيسية <span class="star">*</span></label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control <?php if($info['img_1'] != 0) { echo 'edit_img';} ?>" name="image_1">
                        <a href="<?php echo dirname(__FILE__) . '/uplodas/' . $info["dir"] . '/' . $info['img_1'] ?>" target="_blank"><img src="uplodas/<?php echo $info['dir'] . '/' . $info['img_1']; ?>" class="thumblis-panel"></a>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-sm-3 control-label">صور منوعة حول المنتج</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control <?php if($info['img_2'] != 0) { echo 'edit_img';} ?>" name="image_2">
                        <?php
                        if($info['img_2'] != 0) {
                          echo '<a href="' . dirname(__FILE__) . '/uplodas/' . $info["dir"] . '/' . $info['img_2'] . '" target="_blank"><img src="uplodas/' . $info["dir"] . '/' . $info['img_2'] . '" class="thumblis-panel"></a>'; 
                        ?>
                          <input type="submit" value="Delete" name="del_img2" class="del-img">
                          <input type="hidden" value="<?php echo $id; ?>" name="id_2">
                        <?php }?>
                        <input type="file" class="form-control <?php if($info['img_3'] != 0) { echo 'edit_img';} ?>" name="image_3">
                        <?php
                        if($info['img_3'] != 0) {
                          echo '<a href="' . dirname(__FILE__) . '/uplodas/' . $info["dir"] . '/' . $info['img_3'] . '" target="_blank"><img src="uplodas/' . $info["dir"] . '/' . $info['img_3'] . '" class="thumblis-panel"></a>'; 
                        ?>
                          <input type="submit" value="Delete" name="del_img3" class="del-img">
                          <input type="hidden" value="<?php echo $id; ?>" name="id_3">
                        <?php }?>
                        <input type="file" class="form-control <?php if($info['img_4'] != 0) { echo 'edit_img';} ?>" name="image_4">
                        <?php
                        if($info['img_4'] != 0) {
                          echo '<a href="' . dirname(__FILE__) . '/uplodas/' . $info["dir"] . '/' . $info['img_4'] . '" target="_blank"><img src="uplodas/' . $info["dir"] . '/' . $info['img_4'] . '" class="thumblis-panel"></a>'; 
                        ?>
                          <input type="submit" value="Delete" name="del_img4" class="del-img">
                          <input type="hidden" value="<?php echo $id; ?>" name="id_4">
                        <?php }?>
                        <input type="file" class="form-control <?php if($info['img_5'] != 0) { echo 'edit_img';} ?>" name="image_5">
                        <?php
                        if($info['img_5'] != 0) {
                          echo '<a href="' . dirname(__FILE__) . '/uplodas/' . $info["dir"] . '/' . $info['img_5'] . '" target="_blank"><img src="uplodas/' . $info["dir"] . '/' . $info['img_5'] . '" class="thumblis-panel"></a>'; 
                        ?>
                          <input type="submit" value="Delete" name="del_img5" class="del-img">
                          <input type="hidden" value="<?php echo $id; ?>" name="id_5">
                        <?php }?>
                        <input type="file" class="form-control <?php if($info['img_6'] != 0) { echo 'edit_img';} ?>" name="image_6">
                        <?php
                        if($info['img_6'] != 0) {
                          echo '<a href="' . dirname(__FILE__) . '/uplodas/' . $info["dir"] . '/' . $info['img_6'] . '" target="_blank"><img src="uplodas/' . $info["dir"] . '/' . $info['img_6'] . '" class="thumblis-panel"></a>'; 
                        ?>
                          <input type="submit" value="Delete" name="del_img6" class="del-img">
                          <input type="hidden" value="<?php echo $id; ?>" name="id_6">
                        <?php }?>
                        <input type="file" class="form-control <?php if($info['img_7'] != 0) { echo 'edit_img';} ?>" name="image_7">
                        <?php
                        if($info['img_7'] != 0) {
                          echo '<a href="' . dirname(__FILE__) . '/uplodas/' . $info["dir"] . '/' . $info['img_7'] . '" target="_blank"><img src="uplodas/' . $info["dir"] . '/' . $info['img_7'] . '" class="thumblis-panel"></a>'; 
                        ?>
                          <input type="submit" value="Delete" name="del_img7" class="del-img">
                          <input type="hidden" value="<?php echo $id; ?>" name="id_7">
                        <?php }?>
                        <input type="file" class="form-control <?php if($info['img_8'] != 0) { echo 'edit_img';} ?>" name="image_8">
                        <?php
                        if($info['img_8'] != 0) {
                          echo '<a href="' . dirname(__FILE__) . '/uplodas/' . $info["dir"] . '/' . $info['img_8'] . '" target="_blank"><img src="uplodas/' . $info["dir"] . '/' . $info['img_8'] . '" class="thumblis-panel"></a>'; 
                        ?>
                          <input type="submit" value="Delete" name="del_img8" class="del-img">
                          <input type="hidden" value="<?php echo $id; ?>" name="id_8">
                        <?php }?>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-offset-3 col-sm-offset-0 col-md-9 col-sm-6">
                      <button type="submit" name="edit_product" class="btn btn-block btn-success" style="margin:20px 0;width: 100%;display: block">حفظ</button>
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


