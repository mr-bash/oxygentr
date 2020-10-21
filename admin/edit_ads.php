    <!-- Start Header Section -->
    <?php require_once __DIR__ .'/../app/core/session.php'; ?>
    <?php require_once 'inc/top-header.php'; ?>
    <title><?php echo SITENAME; ?> - تعديل قسم</title>
    <?php require_once 'inc/header.php'; ?>
    
    <!-- Start Content Page Section -->
    <div class="container-fluid">
      <div class="row">
      <!-- Start Sidebar Page Section -->
        <div class="col-sm-3 col-md-2 sidebar">
          <?php require_once 'inc/sidebar.php'; ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> تعديل قسم خاص بعملائنا</h1>
          <div class="row">
            <div class="col-md-10">
            <?php 
            
            $id = 0;
            if(isset($_GET['id']) and is_numeric($_GET['id'])) {
              $id = $_GET['id'];
            } else {
              $id = 0;
            }
            $ads = new ads();
            $info_ads = $ads->select('*', 'ads', 'WHERE id = ?');
            $info_ads->execute(array($id));
            $info = $info_ads->fetch();

            if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['edit_ads'])) {

              $ads->get_input($_FILES['img_ads'], 'edit', $_POST['id']);
            
            }
            
            ?>
              <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                
                <div class="form-group">
                  <label for="img_ads" class="col-sm-3 control-label">صورة الأعلان  </label>
                  <div class="col-sm-9">
                      <input type="file" class="form-control" name="img_ads" id="img_ads">
                      <a href="<?php echo dirname(__FILE__) . '/uplodas/ads/' . $info['image'] ?>" target="_blank"><img src="uplodas/ads/<?php echo $info['image']; ?>" class="thumblis-panel" style="background-color: #8b8b8b;width: 100%; height: auto"></a>
                      <input type="hidden" value="<?php echo $id; ?>" name="id">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-4 col-sm-6">
                    <button type="submit" name="edit_ads" class="btn btn-block btn-success" style="margin:20px 0;">حفظ</button>
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


