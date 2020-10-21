

<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name" class="col-sm-3 control-label">أسم المشروع<span class="star">*</span></label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="name" id="name" value="<?php if(isset($_POST['name'])) { echo $_POST['name']; } ?>" placeholder="ادخل أسم المشروع">
                      <input type="hidden" name="section_id" value="<?php echo $_GET['id']; ?>">
                      <input type="hidden" name="type_works" value="<?php echo $_GET['type']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="content" class="col-sm-3 control-label">معلومات حول المشروع</label>
                  <div class="col-sm-9">
                      <textarea rows="8" class="form-control" name="content" id="content" placeholder="ادخل معلومات حول المشروع"><?php if(isset($_POST['name'])) { echo $_POST['content']; } ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="img_project" class="col-sm-3 control-label">صورة المشروع الرئيسية <span class="star">*</span></label>
                  <div class="col-sm-9">
                      <input type="file" class="form-control" name="img_project" id="img_project">
                      <span class="size-img">366px X 330px</span>
                  </div>
                </div>

                <div class="form-group">
                  <label for="" class="col-sm-3 control-label">صور منوعة حول المشروع</label>
                  <div class="col-sm-9">
                      <input type="file" class="form-control" name="image_1">
                      <input type="file" class="form-control" name="image_2">
                      <input type="file" class="form-control" name="image_3">
                      <input type="file" class="form-control" name="image_4">
                      <input type="file" class="form-control" name="image_5">
                      <input type="file" class="form-control" name="image_6">
                      <input type="file" class="form-control" name="image_7">
                      <input type="file" class="form-control" name="image_8">
                  </div>
                </div>

                <div class="form-group">
                  <label for="whatsapp" class="col-sm-3 control-label">WhatsApp</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="whatsapp" id="whatsapp" value="<?php if(isset($_POST['whatsapp'])) { echo $_POST['whatsapp']; } ?>" placeholder="ادخل رقم الواتس اب الخاص لصاحب الشركة (اختياري)">
                  </div>
                </div>

                <div class="form-group">
                  <label for="facebook" class="col-sm-3 control-label">Facebook</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="facebook" id="facebook" value="<?php if(isset($_POST['facebook'])) { echo $_POST['facebook']; } ?>" placeholder="ادخل حساب فيسبوك الخاص بالشركة (اختياري)">
                  </div>
                </div>

                <div class="form-group">
                  <label for="instagram" class="col-sm-3 control-label">Instagram</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="instagram" id="instagram" value="<?php if(isset($_POST['instagram'])) { echo $_POST['instagram']; } ?>" placeholder="ادخل حساب انستاغرام الخاص بالشركة (اختياري)">
                  </div>
                </div>

                <div class="form-group">
                  <label for="twitter" class="col-sm-3 control-label">Twitter</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="twitter" id="twitter" value="<?php if(isset($_POST['twitter'])) { echo $_POST['twitter']; } ?>" placeholder="ادخل حساب تويتر الخاص بالشركة (اختياري)">
                  </div>
                </div>

                <div class="form-group">
                  <label for="youtube" class="col-sm-3 control-label">Youtube</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="youtube" id="youtube" value="<?php if(isset($_POST['youtube'])) { echo $_POST['youtube']; } ?>" placeholder="ادخل حساب يوتيوب الخاص بالشركة (اختياري)">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-offset-3 col-sm-offset-0 col-md-9 col-sm-6">
                    <button type="submit" name="add_works_marketing" class="btn btn-block btn-success" style="margin:20px 0;width: 100%;display: block">اضافة</button>
                  </div>
                </div>
            </form>