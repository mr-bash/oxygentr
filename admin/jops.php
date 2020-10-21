    <!-- Start Header Section -->
    <?php require_once __DIR__ .'/../app/core/session.php'; ?>
    <?php require_once 'inc/top-header.php'; ?>
    <title><?php echo SITENAME; ?> - الوظائف</title>
    <?php require_once 'inc/header.php'; ?>
    <!-- Start Content Page Section -->
    <div class="container-fluid">
      <div class="row">
      <!-- Start Sidebar Page Section -->
        <div class="col-sm-3 col-md-2 sidebar">
        <?php 
        require_once 'inc/sidebar.php'; 
        $DB = new sections_jops();
        ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> الوظائف</h1>
          <div class="col-md-12">

          <div class="row">
              <div class="col-md-10 col-md-offset-1">
              <div class="btns-sectons">
              
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                <select name="select" id="" >
                  <option value="all" <?php if(isset($_GET['select']) and $_GET['select'] == 'all') { echo 'selected'; } ?> >كل الأقسام ..</option>
                  <?php 
                  $get_sections = $DB->select('*', 'jops_sections');
                  $get_sections->execute(array());
                  $get_all = $get_sections->fetchAll();
                  $approve = '';
                  foreach($get_all as $get_sec) {

                  ?>
                  <option value="<?php echo $get_sec['sec_unique'] ?>" <?php if(isset($_GET['select']) and $_GET['select'] == $get_sec['sec_unique']) { echo 'selected'; } ?> ><?php echo $get_sec['sec_name']; ?></option>
                  <?php } ?>

                </select>
                <input type="submit" value="أختر" name="select-btn">
                <a href="sections_jops.php" class="btnManage-sec" target="_blank">أدارة الأقسام <i class="glyphicon glyphicon-list"></i></a>
              </form>
            </div>
                  <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">الأسم</th>
                                <th class="text-center">القسم</th>
                                <th class="text-center">تعديل</th>
                                <th class="text-center">الحالة</th>
                                <th class="text-center">مشاهدة</th>
                                <th class="text-center">حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $show_all = 'ORDER BY jop_id DESC';
                            if(isset($_GET['del']) and is_numeric($_GET['del'])) {
                              $id = $_GET['del'];
                              $all = $DB->select('jop_id', 'jops', 'WHERE jop_id = ?');
                              $all->execute(array($_GET['del']));
                              $res = $all->rowCount();
                              if($res > 0) {
                                $del = $DB->delete('jops', 'WHERE jop_id = ?');
                                $del->execute(array($_GET['del']));
                                $DB->redirecr_page(' ', $_SERVER['HTTP_REFERER'], 0);
                              } else {
                                $DB->redirecr_page(' ', 'jops.php', 0);
                              }
                            } else {
                              $id = 0;
                            }
                            if($_SERVER['REQUEST_METHOD'] == 'GET' AND isset($_GET['select-btn'])) {
                              if($_GET['select'] != 'all') {
                                $show_all = 'WHERE sec_unique = ? ORDER BY sec_id DESC';
                              }
                              $select_section = $DB->custom_query("SELECT jops.*,
                                                                  jops_sections.sec_name AS section_name,
                                                                  jops_sections.sec_unique AS unique_name,
                                                                  jops_sections.sec_id AS jops_section_id
                                                                  FROM 
                                                                    jops
                                                                  INNER JOIN
                                                                  jops_sections
                                                                  ON
                                                                  jops_sections.sec_id = jops.jop_section {$show_all}");
                              $select_section->execute(array($_GET['select']));
                              $info_sec = $select_section->fetchAll();
                              $counter = 0;
                              foreach($info_sec as $info_jops) {

                              
                              $counter++;
                            ?>

                            <tr class="text-center custom-td">
                                <td><?php echo $counter; ?></td>
                                <td><?php echo $info_jops['jop_title']; ?></td>
                                <td><?php echo $info_jops['section_name']; ?></td>
                                <td><a href="edit_works.php?id=<?php echo $info_jops['jop_id']; ?>" class="btn btn-sm btn-warning">تعديل</a></td>
                                <td><a href="approve.php?id=<?php echo $info_jops['jop_id']; ?>" class="btn btn-sm btn-success">تفعيل</a></td>
                                <td><a href="details_jop.php?id=<?php echo $info_jops['jop_id']; ?>" class="btn btn-sm btn-info">مشاهدة</a></td>
                                <td><a href="?del=<?php echo $info_jops['jop_id']; ?>" class="btn btn-sm btn-danger confirm">حذف</a></td>
                            </tr>
                            <?php 
                            }
                              
                          } else {

                              

                              $select_all = $DB->custom_query('SELECT jops.*,
                                                                      jops_sections.sec_name AS section_name,
                                                                      jops_sections.sec_id AS jops_section_id
                                                                      FROM 
                                                                        jops
                                                                      INNER JOIN
                                                                        jops_sections
                                                                      ON
                                                                        jops_sections.sec_id = jops.jop_section');
                              
                              $select_all->execute();
                              $info_all = $select_all->fetchAll();
                              $counter = 0;
                              foreach($info_all as $all_jops) {
                              

                                
                                $counter++;
                            
                            ?>

                            <tr class="text-center custom-td">
                            <td><?php echo $counter; ?></td>
                                <td><?php echo $all_jops['jop_title']; ?></td>
                                <td><?php echo $all_jops['section_name']; ?></td>
                                <td><a href="edit_jops.php?id=<?php echo $all_jops['jop_id']; ?>" class="btn btn-sm btn-warning">تعديل</a></td>
                                <?php if ($all_jops['jop_status'] == '0') { ?>
                                <td><a href="approve.php?id=<?php echo $all_jops['jop_id']; ?>" class="btn btn-sm btn-danger status-btn" data-status="disabled">معطل</a></td>
                                <?php } else { ?>
                                <td><a href="approve.php?id=<?php echo $all_jops['jop_id']; ?>" class="btn btn-sm btn-success status-btn" data-status="enabled">مفعل</a></td>
                                <?php } ?>
                                <td><a href="details_jop.php?id=<?php echo $all_jops['jop_id']; ?>" class="btn btn-sm btn-info">مشاهدة</a></td>
                                <td><a href="?del=<?php echo $all_jops['jop_id']; ?>" class="btn btn-sm btn-danger confirm">حذف</a></td>
                            </tr>
                            <?php 
                            }

                          }
                            ?>
                        </tbody>
                    </table>
                    <a href="add_jops.php" class="btn-add"><i class="fas fa-plus-circle"></i> أضافة</a>
                  </div>
              </div>
          </div>
      </div>
        </div>
      </div>
    </div>
    <!-- Start Footer Page Section -->
    <?php require_once 'inc/footer.php'; ?>