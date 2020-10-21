    <!-- Start Header Section -->
    <?php require_once __DIR__ .'/../app/core/session.php'; ?>
    <?php require_once 'inc/top-header.php'; ?>
    <title><?php echo SITENAME; ?> - خدماتنا</title>
    <?php require_once 'inc/header.php'; ?>

    <!-- Start Content Page Section -->
    <div class="container-fluid">
      <div class="row">
      <!-- Start Sidebar Page Section -->
        <div class="col-sm-3 col-md-2 sidebar">
          <?php require_once 'inc/sidebar.php'; ?>
        </div>
        <?php 
        $ob_services = new services();
        if(isset($_GET['del']) and is_numeric($_GET['del'])) {
          $id = $_GET['del'];
          $all = $ob_services->select('id', 'services', 'WHERE id = ?');
          $all->execute(array($_GET['del']));
          $res = $all->rowCount();
          if($res > 0) {
            $del = $ob_services->delete('services', 'WHERE id = ?');
            $del->execute(array($_GET['del']));
            $msg->redirecr_page(' ', $_SERVER['HTTP_REFERER'], 0);
          } else {
            $msg->redirecr_page(' ', 'services.php', 0);
          }
        } else {
          $id = 0;
        }
        
        ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> خدماتنا</h1>
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
                                <th class="text-center">حذف</th>
                            </tr>
                        </thead>
                        <tbody class="msg-td">
                        <?php
                            
                            $get_data = $msg->select('*', 'services');
                            $get_data->execute(array());
                            $all_data = $get_data->fetchAll();
                            $c = 1;
                            foreach ($all_data as $data) {
                            
                            ?>
                            <tr class="text-center custom-td" style="position: relative!important;">
                                <td><div class="about-td"><?php echo $c; $c++; ?></div></td>
                                <td><div class="about-td"><?php echo mb_substr($data['title'], 0, 12) . '...'; ?></div></td>
                                <td><div class="about-td td-img"  style="width: 90px; height:50px"><img src="uplodas/services_files/<?php echo $data['img']; ?>" ></div></td>
                                <td><div class="about-td"><a href="edit_services.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-info">تعديل</a></div></td>
                                <td><div class="about-td"><a href="?del=<?php echo $data['id']; ?>" class="btn btn-sm btn-danger confirm">حذف</a></div></td>
                            </tr>
                            <?php } ?>
                            
                        </tbody>
                    </table>
                    <a href="add_services.php" class="btn-add"><i class="fas fa-plus-circle"></i> أضافة</a>
                  </div>
              </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Start Footer Page Section -->
    <?php require_once 'inc/footer.php'; ?>


