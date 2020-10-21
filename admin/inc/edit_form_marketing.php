
<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['del_img1'])) {
  $img_exist = true;
  $del1 = $works->update('works', 'work_image1 = 0', 'WHERE work_id = ?');
  $del1->execute(array($_POST['id_1']));
  $works->redirecr_page('Deleted...', $_SERVER['HTTP_REFERER'], 0);
  die();
}

if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['del_img2'])) {
  $img_exist = true;
  $del1 = $works->update('works', 'work_image2 = 0', 'WHERE work_id = ?');
  $del1->execute(array($_POST['id_2']));
  $works->redirecr_page('Deleted...', $_SERVER['HTTP_REFERER'], 0);
  die();
}

if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['del_img3'])) {
  $img_exist = true;
  $del1 = $works->update('works', 'work_image3 = 0', 'WHERE work_id = ?');
  $del1->execute(array($_POST['id_3']));
  $works->redirecr_page('Deleted...', $_SERVER['HTTP_REFERER'], 0);
  die();
}

if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['del_img4'])) {
  $img_exist = true;
  $del1 = $works->update('works', 'work_image4 = 0', 'WHERE work_id = ?');
  $del1->execute(array($_POST['id_4']));
  $works->redirecr_page('Deleted...', $_SERVER['HTTP_REFERER'], 0);
  die();
}

if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['del_img5'])) {
  $img_exist = true;
  $del1 = $works->update('works', 'work_image5 = 0', 'WHERE work_id = ?');
  $del1->execute(array($_POST['id_5']));
  $works->redirecr_page('Deleted...', $_SERVER['HTTP_REFERER'], 0);
  die();
}

if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['del_img6'])) {
  $img_exist = true;
  $del1 = $works->update('works', 'work_image6 = 0', 'WHERE work_id = ?');
  $del1->execute(array($_POST['id_6']));
  $works->redirecr_page('Deleted...', $_SERVER['HTTP_REFERER'], 0);
  die();
}

if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['del_img7'])) {
  $img_exist = true;
  $del1 = $works->update('works', 'work_image7 = 0', 'WHERE work_id = ?');
  $del1->execute(array($_POST['id_7']));
  $works->redirecr_page('Deleted...', $_SERVER['HTTP_REFERER'], 0);
  die();
}

if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['del_img8'])) {
  $img_exist = true;
  $del1 = $works->update('works', 'work_image8 = 0', 'WHERE work_id = ?');
  $del1->execute(array($_POST['id_8']));
  $works->redirecr_page('Deleted...', $_SERVER['HTTP_REFERER'], 0);
  die();
}

?>
<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name" class="col-sm-3 control-label">أسم المشروع<span class="star">*</span></label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="name" id="name" value="<?php if(isset($info['work_name'])) { echo $info['work_name']; } ?>" placeholder="ادخل أسم المشروع">
                      <input type="hidden" name="section_id" value="<?php echo $_GET['sec']; ?>">
                      <input type="hidden" name="id_post" value="<?php echo $_GET['id']; ?>">
                      <input type="hidden" name="type_works" value="<?php echo $_GET['type']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="content" class="col-sm-3 control-label">صورة الغلاف المصغرة</label>
                  <div class="col-sm-9">
                      <textarea rows="8" class="form-control" name="content" id="content" placeholder="ادخل معلومات حول المشروع"><?php if(isset($info['work_content'])) { echo $info['work_content']; } ?></textarea>
                      <span class="size-img">366px X 330px</span>
                  </div>
                </div>

                <div class="form-group">
                  <label for="img_project" class="col-sm-3 control-label">صورة المشروع الرئيسية <span class="star">*</span></label>
                  <div class="col-sm-9">
                      <input type="file" class="form-control" name="img_project" id="img_project">
                      <a href="<?php echo dirname(__FILE__) . '/uplodas/' . $info["dir"] . '/' . $info['work_image_main'] ?>" target="_blank"><img src="uplodas/<?php echo $info['dir'] . '/' . $info['work_image_main']; ?>" class="thumblis-panel"></a>
                  </div>
                </div>

                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">صور منوعة حول المشروع</label>
                  <div class="col-sm-9">
                      <input type="file" class="form-control" name="image_1">
                      <?php
                        if($info['work_image1'] != 0) {
                          echo '<a href="' . dirname(__FILE__) . '/uplodas/' . $info["dir"] . '/' . $info['work_image1'] . '" target="_blank"><img src="uplodas/' . $info["dir"] . '/' . $info['work_image1'] . '" class="thumblis-panel"></a>'; 
                        
                      ?>
                        <input type="submit" value="Delete" name="del_img1" class="del-img">
                        <input type="hidden" value="<?php echo $id; ?>" name="id_1">
                      <?php }?>
                      <input type="file" class="form-control" name="image_2">
                      <?php
                        if($info['work_image2'] != 0) {
                          echo '<a href="' . dirname(__FILE__) . '/uplodas/' . $info["dir"] . '/' . $info['work_image2'] . '" target="_blank"><img src="uplodas/' . $info["dir"] . '/' . $info['work_image2'] . '" class="thumblis-panel"></a>'; 
                        
                      ?>
                        <input type="submit" value="Delete" name="del_img2" class="del-img">
                        <input type="hidden" value="<?php echo $id; ?>" name="id_2">
                      <?php }?>
                      <input type="file" class="form-control" name="image_3">
                      <?php
                        if($info['work_image3'] != 0) {
                          echo '<a href="' . dirname(__FILE__) . '/uplodas/' . $info["dir"] . '/' . $info['work_image3'] . '" target="_blank"><img src="uplodas/' . $info["dir"] . '/' . $info['work_image3'] . '" class="thumblis-panel"></a>'; 
                        
                      ?>
                        <input type="submit" value="Delete" name="del_img3" class="del-img">
                        <input type="hidden" value="<?php echo $id; ?>" name="id_3">
                      <?php }?>
                      <input type="file" class="form-control" name="image_4">
                      <?php
                        if($info['work_image4'] != 0) {
                          echo '<a href="' . dirname(__FILE__) . '/uplodas/' . $info["dir"] . '/' . $info['work_image4'] . '" target="_blank"><img src="uplodas/' . $info["dir"] . '/' . $info['work_image4'] . '" class="thumblis-panel"></a>'; 
                        
                      ?>
                        <input type="submit" value="Delete" name="del_img4" class="del-img">
                        <input type="hidden" value="<?php echo $id; ?>" name="id_4">
                      <?php }?>
                      <input type="file" class="form-control" name="image_5">
                      <?php
                        if($info['work_image5'] != 0) {
                          echo '<a href="' . dirname(__FILE__) . '/uplodas/' . $info["dir"] . '/' . $info['work_image5'] . '" target="_blank"><img src="uplodas/' . $info["dir"] . '/' . $info['work_image5'] . '" class="thumblis-panel"></a>'; 
                        
                      ?>
                        <input type="submit" value="Delete" name="del_img5" class="del-img">
                        <input type="hidden" value="<?php echo $id; ?>" name="id_5">
                      <?php }?>
                      <input type="file" class="form-control" name="image_6">
                      <?php
                        if($info['work_image6'] != 0) {
                          echo '<a href="' . dirname(__FILE__) . '/uplodas/' . $info["dir"] . '/' . $info['work_image6'] . '" target="_blank"><img src="uplodas/' . $info["dir"] . '/' . $info['work_image6'] . '" class="thumblis-panel"></a>'; 
                        
                      ?>
                        <input type="submit" value="Delete" name="del_img6" class="del-img">
                        <input type="hidden" value="<?php echo $id; ?>" name="id_6">
                      <?php }?>
                      <input type="file" class="form-control" name="image_7">
                      <?php
                        if($info['work_image7'] != 0) {
                          echo '<a href="' . dirname(__FILE__) . '/uplodas/' . $info["dir"] . '/' . $info['work_image7'] . '" target="_blank"><img src="uplodas/' . $info["dir"] . '/' . $info['work_image7'] . '" class="thumblis-panel"></a>'; 
                        
                      ?>
                        <input type="submit" value="Delete" name="del_img7" class="del-img">
                        <input type="hidden" value="<?php echo $id; ?>" name="id_7">
                      <?php }?>
                      <input type="file" class="form-control" name="image_8">
                      <?php
                        if($info['work_image8'] != 0) {
                          echo '<a href="' . dirname(__FILE__) . '/uplodas/' . $info["dir"] . '/' . $info['work_image8'] . '" target="_blank"><img src="uplodas/' . $info["dir"] . '/' . $info['work_image8'] . '" class="thumblis-panel"></a>'; 
                        
                      ?>
                        <input type="submit" value="Delete" name="del_img8" class="del-img">
                        <input type="hidden" value="<?php echo $id; ?>" name="id_8">
                      <?php }?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="whatsapp" class="col-sm-3 control-label">WhatsApp</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="whatsapp" id="whatsapp" value="<?php if(isset($info['whatsapp'])) { echo $info['whatsapp']; } ?>" placeholder="ادخل رقم الواتس اب الخاص لصاحب الشركة (اختياري)">
                  </div>
                </div>

                <div class="form-group">
                  <label for="facebook" class="col-sm-3 control-label">Facebook</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="facebook" id="facebook" value="<?php if(isset($info['facebook'])) { echo $info['facebook']; } ?>" placeholder="ادخل حساب فيسبوك الخاص بالشركة (اختياري)">
                  </div>
                </div>

                <div class="form-group">
                  <label for="instagram" class="col-sm-3 control-label">Instagram</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="instagram" id="instagram" value="<?php if(isset($info['instagram'])) { echo $info['instagram']; } ?>" placeholder="ادخل حساب انستاغرام الخاص بالشركة (اختياري)">
                  </div>
                </div>

                <div class="form-group">
                  <label for="twitter" class="col-sm-3 control-label">Twitter</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="twitter" id="twitter" value="<?php if(isset($info['twitter'])) { echo $info['twitter']; } ?>" placeholder="ادخل حساب تويتر الخاص بالشركة (اختياري)">
                  </div>
                </div>

                <div class="form-group">
                  <label for="youtube" class="col-sm-3 control-label">Youtube</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="youtube" id="youtube" value="<?php if(isset($info['youtube'])) { echo $info['youtube']; } ?>" placeholder="ادخل حساب يوتيوب الخاص بالشركة (اختياري)">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-offset-3 col-sm-offset-0 col-md-9 col-sm-6">
                    <button type="submit" name="edit_works_marketing" class="btn btn-block btn-success" style="margin:20px 0;width: 100%;display: block">حفظ</button>
                  </div>
                </div>
            </form>