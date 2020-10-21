    <!-- Start Header Section -->
    <?php require_once __DIR__ .'/../app/core/session.php'; ?>
    <?php require_once 'inc/top-header.php'; ?>
    <title><?php echo SITENAME; ?> - أقسام متجر أوكسجين</title>
    <?php require_once 'inc/header.php'; ?>

    <!-- Start Content Page Section -->
    <div class="container-fluid">
      <div class="row">
      <!-- Start Sidebar Page Section -->
        <div class="col-sm-3 col-md-2 sidebar">
          <?php require_once 'inc/sidebar.php'; ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> أدارة الأقسام الخاصة بمتجر أوكسجين</h1>
          <div class="col-md-12">
          <div class="row">
              <div class="col-md-10 col-md-offset-1">
                  <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">الأسم</th>
                                <th class="text-center">تعديل</th>
                                <!-- <th class="text-center">حذف</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $DB = new sections_shop();
                            if(isset($_GET['del']) and is_numeric($_GET['del'])) {
                              $id = $_GET['del'];
                            } else {
                              $id = 0;
                            }

                            $select_section = $DB->select('*', 'shop_section');
                            $select_section->execute(array());
                            $info_sec = $select_section->fetchAll();
                            $counter = 0;
                            foreach($info_sec as $data) {

                            
                            $counter++;

                            ?>
                            <tr class="text-center custom-td">
                                <td><?php echo $counter; ?></td>
                                <td><?php echo $data['section_name']; ?></td>
                                <td><a href="edit_section_shop.php?id=<?php echo $data['section_id'] ?>" class="btn btn-sm btn-warning">تعديل</a></td>
                                <!-- <td><a href="?del=<?php echo $data['sec_id']; ?>" class="btn btn-sm btn-danger confirm_important">حذف</a></td> -->
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <a href="add_section_shop.php" class="btn-add"><i class="fas fa-plus-circle"></i> أضافة</a>
                  </div>
              </div>
          </div>
      </div>
        </div>
      </div>
    </div>
    <!-- Start Footer Page Section -->
    <?php require_once 'inc/footer.php'; ?>