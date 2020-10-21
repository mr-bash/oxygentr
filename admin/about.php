    <!-- Start Header Section -->
    <?php require_once __DIR__ .'/../app/core/session.php'; ?>
    <?php require_once 'inc/top-header.php'; ?>
    <title><?php echo SITENAME; ?> - حول الشركة</title>
    <?php require_once 'inc/header.php'; ?>

    <!-- Start Content Page Section -->
    <div class="container-fluid">
      <div class="row">
      <!-- Start Sidebar Page Section -->
        <div class="col-sm-3 col-md-2 sidebar">
          <?php require_once 'inc/sidebar.php'; ?>
        </div>
        <?php 
        $ob_about = new about();
        if(isset($_GET['del']) and is_numeric($_GET['del'])) {
          $id = $_GET['del'];
          $all = $ob_about->select('id', 'about', 'WHERE id = ?');
          $all->execute(array($_GET['del']));
          $res = $all->rowCount();
          if($res > 0) {
            $del = $ob_about->delete('about', 'WHERE id = ?');
            $del->execute(array($_GET['del']));
            $msg->redirecr_page(' ', $_SERVER['HTTP_REFERER'], 0);
          } else {
            $msg->redirecr_page(' ', 'about.php', 0);
          }
        } else {
          $id = 0;
        }
        
        ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> حول الشركة</h1>
          <div class="col-md-12">
          <div class="row">
              <div class="col-md-10 col-md-offset-1">
                  <div class="table-responsive">
                    <table class="table table-hover tabele-msg" style="height: 400px;">
                        <thead>
                            <tr class="custom-title">
                                <th class="text-center">#</th>
                                <th class="text-center">العنوان</th>
                                <th class="text-center">الصورة</th>
                                <th class="text-center">تعديل</th>
                                <!-- <th class="text-center">حذف</th> -->
                            </tr>
                        </thead>
                        <tbody class="msg-td">
                            <?php
                            
                            $get_data = $msg->select('*', 'about');
                            $get_data->execute(array());
                            $all_data = $get_data->fetchAll();
                            $c = 1;
                            foreach ($all_data as $data) {
                            
                            ?>
                            <tr class="text-center custom-td" style="position: relative!important;">
                                <td><div class="about-td"><?php echo $c; $c++; ?></div></td>
                                <td><div class="about-td"><?php echo $data['title']; ?></div></td>
                                <td><div class="about-td td-img"><img src="uplodas/about_files/<?php echo $data['img']; ?>"></div></td>
                                <td><div class="about-td"><a href="edit_about.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-info">تعديل</a></div></td>
                                <!-- <td><div class="about-td"><a href="?del=<?php //echo $data['id']; ?>" class="btn btn-sm btn-danger confirm">حذف</a></div></td> -->
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- <a href="add_about.php" class="btn-add"><i class="fas fa-plus-circle"></i> أضافة</a> -->
                  </div>
              </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Start Footer Page Section -->
    <?php require_once 'inc/footer.php'; ?>


