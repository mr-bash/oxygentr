<?php 



?>
<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="title" class="col-sm-3 control-label">أسم المشروع<span class="star">*</span></label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="name" id="title" value="<?php if(isset($_POST['name'])) { echo $_POST['name']; } ?>" placeholder="ادخل أسم المشروع">
                      <input type="hidden" name="section_id" value="<?php echo $_GET['id']; ?>">
                      <input type="hidden" name="type_works" value="<?php echo $_GET['type']; ?>">
                      <input type="file" name="photo" value="" style="visibility: hidden;">
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
                  <label for="content" class="col-sm-3 control-label">معلومات حول المشروع</label>
                  <div class="col-sm-9">
                      <textarea rows="8" class="form-control" name="content" id="content" placeholder="ادخل معلومات حول المشروع"><?php if(isset($_POST['content'])) { echo $_POST['content']; } ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="link_video" class="col-sm-3 control-label">رابط الفيديو<span class="star">*</span></label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="link_video" id="link_video" value="<?php if(isset($_POST['link_video'])) { echo $_POST['link_video']; } ?>" placeholder="ادخل أسم المشروع">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-offset-3 col-sm-offset-0 col-md-9 col-sm-6">
                    <button type="submit" name="add_works_video" class="btn btn-block btn-success" style="margin:20px 0;width: 100%;display: block">اضافة</button>
                  </div>
                </div>
            </form>