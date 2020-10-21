
<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name" class="col-sm-3 control-label">أسم المشروع<span class="star">*</span></label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="name" id="name" value="<?php if(isset($_POST['name'])) { echo $_POST['name']; } ?>" placeholder="ادخل أسم المشروع">
                      <input type="hidden" name="section_id" value="<?php echo $_GET['id']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="content" class="col-sm-3 control-label">معلومات حول المشروع</label>
                  <div class="col-sm-9">
                      <textarea rows="8" class="form-control" name="content" id="content" placeholder="ادخل معلومات حول المشروع"><?php if(isset($_POST['name'])) { echo $_POST['content']; } ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="img_project" class="col-sm-3 control-label">صورة الغلاف المصغرة <span class="star">*</span></label>
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
                  <label for="link_project" class="col-sm-3 control-label">رابط المشروع</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="link_project" id="link_project" value="<?php if(isset($_POST['link_project'])) { echo $_POST['link_project']; } ?>" placeholder="ادخل رابط المشروع (اختياري)">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-offset-3 col-sm-offset-0 col-md-9 col-sm-6">
                    <button type="submit" name="add_works_global" class="btn btn-block btn-success" style="margin:20px 0;width: 100%;display: block">اضافة</button>
                  </div>
                </div>
            </form>