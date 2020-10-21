    <!-- Start Header Section -->
    <?php require_once __DIR__ .'/../app/core/session.php'; ?>
    <?php require_once 'inc/top-header.php'; ?>
    <title><?php echo SITENAME; ?> - أقسام الموقع</title>
    <?php require_once 'inc/header.php'; ?>

    <!-- Start Content Page Section -->
    <div class="container-fluid">
      <div class="row">
      <!-- Start Sidebar Page Section -->
        <div class="col-sm-3 col-md-2 sidebar">
          <?php require_once 'inc/sidebar.php'; ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> أقسام الموقع</h1>
          <div class="col-md-12">
          <div class="row">
              <div class="col-md-10 col-md-offset-1">
                  <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">الأسم</th>
                                <th class="text-center">وصف القسم</th>
                                <th class="text-center">أيقونة القسم</th>
                                <th class="text-center">صورة العرض</th>
                                <th class="text-center">تعديل</th>
                                <!-- <th class="text-center">حذف</th> -->
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                            $DB = new sections_clients();
                            if(isset($_GET['del']) and is_numeric($_GET['del'])) {
                              $id = $_GET['del'];
                              $all = $DB->select('sec_id', 'clients_sections', 'WHERE sec_id = ?');
                              $all->execute(array($_GET['del']));
                              $res = $all->rowCount();
                              if($res > 0) {
                                $del = $DB->delete('clients_sections', 'WHERE sec_id = ?');
                                $del->execute(array($_GET['del']));
                                $DB->redirecr_page(' ', $_SERVER['HTTP_REFERER'], 0);
                              } else {
                                $DB->redirecr_page(' ', 'sections_clients.php', 0);
                              }
                            } else {
                              $id = 0;
                            }

                            $select_section = $DB->select('*', 'clients_sections');
                            $select_section->execute(array());
                            $info_sec = $select_section->fetchAll();
                            $counter = 0;
                            foreach($info_sec as $data) {

                            
                            $counter++;
                            ?>
                            <tr class="text-center custom-td">
                                <td><?php echo $counter; ?></td>
                                <td><?php echo $data['sec_name']; ?></td>
                                <td><?php echo $data['sec_description']; ?></td>
                                <td><img src="uplodas/<?php echo $data['dir'] . '/' . $data['icon_dark']; ?>" alt="about oxygen" width="17px"></td>
                                <td><img src="uplodas/<?php echo $data['dir'] . '/' . $data['sec_cover']; ?>" alt="about oxygen" width="90px"></td>
                                <td><a href="edit_section.php?id=<?php echo $data['sec_id']; ?>" class="btn btn-sm btn-warning">تعديل</a></td>
                                <!-- <td><a href="#" class="btn btn-sm btn-danger confirm_important">حذف</a></td> -->
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <a href="add_section.php" class="btn-add"><i class="fas fa-plus-circle"></i> أضافة</a>
                  </div>
              </div>
          </div>
      </div>
        </div>
      </div>
    </div>
    <!-- Start Footer Page Section -->
    <?php require_once 'inc/footer.php'; ?>