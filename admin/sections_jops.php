    <!-- Start Header Section -->
    <?php require_once __DIR__ .'/../app/core/session.php'; ?>
    <?php require_once 'inc/top-header.php'; ?>
    <title><?php echo SITENAME; ?> - أقسام فرص العمل</title>
    <?php require_once 'inc/header.php'; ?>

    <!-- Start Content Page Section -->
    <div class="container-fluid">
      <div class="row">
      <!-- Start Sidebar Page Section -->
        <div class="col-sm-3 col-md-2 sidebar">
          <?php require_once 'inc/sidebar.php'; ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> أدارة الأقسام الخاصة بفرص العمل</h1>
          <div class="col-md-12">
          <div class="row">
              <div class="col-md-10 col-md-offset-1">
                  <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">الأسم</th>
                                <th class="text-center">أيقونة القسم</th>
                                <th class="text-center">تعديل</th>
                                <th class="text-center">حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                            $DB = new sections_jops();
                            if(isset($_GET['del']) and is_numeric($_GET['del'])) {
                              $id = $_GET['del'];
                              $all = $DB->select('sec_id', 'jops_sections', 'WHERE sec_id = ?');
                              $all->execute(array($_GET['del']));
                              $res = $all->rowCount();
                              if($res > 0) {
                                $del = $DB->delete('jops_sections', 'WHERE sec_id = ?');
                                $del->execute(array($_GET['del']));
                                $DB->redirecr_page(' ', $_SERVER['HTTP_REFERER'], 0);
                              } else {
                                $DB->redirecr_page(' ', 'sections_jops.php', 0);
                              }
                            } else {
                              $id = 0;
                            }

                            $select_section = $DB->select('*', 'jops_sections');
                            $select_section->execute(array());
                            $info_sec = $select_section->fetchAll();
                            $counter = 0;
                            foreach($info_sec as $data) {

                            
                            $counter++;
                            ?>
                            <tr class="text-center custom-td">
                                <td><?php echo $counter; ?></td>
                                <td><?php echo $data['sec_name']; ?></td>
                                <td><img src="uplodas/<?php echo $data['dir'] . '/' . $data['icon_dark']; ?>" alt="about oxygen" width="17px"></td>
                                <td><a href="edit_section_jops.php?id=<?php echo $data['sec_id']; ?>" class="btn btn-sm btn-warning">تعديل</a></td>
                                <td><a href="?del=<?php echo $data['sec_id']; ?>" class="btn btn-sm btn-danger confirm_important">حذف</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <a href="add_section_jops.php" class="btn-add"><i class="fas fa-plus-circle"></i> أضافة</a>
                  </div>
              </div>
          </div>
      </div>
        </div>
      </div>
    </div>
    <!-- Start Footer Page Section -->
    <?php require_once 'inc/footer.php'; ?>