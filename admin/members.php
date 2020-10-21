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
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> الاعضاء المسجلين</h1>
          <div class="col-md-12">

          <div class="row">
              <div class="col-md-10 col-md-offset-1">
                  <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">أسم المستخدم</th>
                                <th class="text-center">البريد الألكتروني</th>
                                <th class="text-center">تعديل</th>
                                <th class="text-center">حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $DB = new profile();
                            if(isset($_GET['del']) and is_numeric($_GET['del'])) {
                                $id = $_GET['del'];
                                $all = $DB->select('id', 'admins', 'ORDER BY id DESC');
                                $all->execute(array($_GET['del']));
                                $res = $all->rowCount();
                                if($res > 0) {
                                  $del = $DB->delete('admins', 'WHERE id = ?');
                                  $del->execute(array($_GET['del']));
                                  $DB->redirecr_page(' ', $_SERVER['HTTP_REFERER'], 0);
                                } else {
                                  $DB->redirecr_page(' ', 'members.php', 0);
                                }
                              } else {
                                $id = 0;
                              }
                              $show_members = $DB->select('*', 'admins');
                              $show_members->execute(array());
                              $members = $show_members->fetchAll();
                              $counter = 0;
                              foreach($members as $member) {

                              
                              $counter++;
                            ?>
                            <tr class="text-center custom-td">
                                <td><?php echo $counter; ?></td>
                                <td><?php echo $member['username']; ?></td>
                                <td><?php echo $member['email']; ?></td>
                                <td><a href="edit_member.php?id=<?php echo $member['id']; ?>" class="btn btn-sm btn-warning">تعديل</a></td>
                                <td><a href="?del=<?php echo $member['id']; ?>" class="btn btn-sm btn-danger confirm">حذف</a></td>
                            </tr>
                              <?php  } ?>
                        </tbody>
                    </table>
                    <a href="add_member.php" class="btn-add"><i class="fas fa-plus-circle"></i> أضافة</a>
                  </div>
              </div>
          </div>
      </div>
        </div>
      </div>
    </div>
    <!-- Start Footer Page Section -->
    <?php require_once 'inc/footer.php'; ?>