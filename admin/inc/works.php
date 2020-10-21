    <!-- Start Header Section -->
    <?php require_once __DIR__ .'/../app/core/session.php'; ?>
    <?php require_once 'inc/top-header.php'; ?>
    <title><?php echo SITENAME; ?> - الشركات المعلنا معنا</title>
    <?php require_once 'inc/header.php'; ?>
    <!-- Start Content Page Section -->
    <div class="container-fluid">
      <div class="row">
      <!-- Start Sidebar Page Section -->
        <div class="col-sm-3 col-md-2 sidebar">
        <?php 
        require_once 'inc/sidebar.php'; 
        $DB = new sections_works();
        ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> أنجازاتنا</h1>
          <div class="col-md-12">

          <div class="row">
              <div class="col-md-10 col-md-offset-1">
              <div class="btns-sectons">
              
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                <select name="select" id="" >
                  <option value="all" <?php if(isset($_GET['select']) and $_GET['select'] == 'all') { echo 'selected'; } ?> >كل الأقسام ..</option>
                  <?php 
                  $get_sections = $DB->select('*', 'works_sections');
                  $get_sections->execute(array());
                  $get_all = $get_sections->fetchAll();
                  
                  foreach($get_all as $get_sec) {

                  ?>
                  <option value="<?php echo $get_sec['sec_unique'] ?>" <?php if(isset($_GET['select']) and $_GET['select'] == $get_sec['sec_unique']) { echo 'selected'; } ?> ><?php echo $get_sec['sec_name']; ?></option>
                  <?php } ?>

                </select>
                <input type="submit" value="أختر" name="select-btn">
                <a href="sections_works.php" class="btnManage-sec" target="_blank">أدارة التصنيفات <i class="glyphicon glyphicon-list"></i></a>
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
                                <th class="text-center">حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $show_all = 'ORDER BY work_id DESC';
                            if(isset($_GET['del']) and is_numeric($_GET['del'])) {
                              $id = $_GET['del'];
                              $all = $DB->select('work_id', 'works', 'WHERE work_id = ?');
                              $all->execute(array($_GET['del']));
                              $res = $all->rowCount();
                              if($res > 0) {
                                $del = $DB->delete('works', 'WHERE work_id = ?');
                                $del->execute(array($_GET['del']));
                                $DB->redirecr_page(' ', $_SERVER['HTTP_REFERER'], 0);
                              } else {
                                $DB->redirecr_page(' ', 'works.php', 0);
                              }
                            } else {
                              $id = 0;
                            }
                            if($_SERVER['REQUEST_METHOD'] == 'GET' AND isset($_GET['select-btn'])) {
                              if($_GET['select'] != 'all') {
                                $show_all = 'WHERE sec_unique = ? ORDER BY sec_id DESC';
                              }
                              $select_section = $DB->custom_query("SELECT works.*,
                                                                  works_sections.sec_name AS section_name,
                                                                  works_sections.sec_unique AS unique_name,
                                                                  works_sections.sec_id AS work_section_id
                                                                  FROM 
                                                                    works
                                                                  INNER JOIN
                                                                    works_sections
                                                                  ON
                                                                    works_sections.sec_id = works.section_id {$show_all}");
                              $select_section->execute(array($_GET['select']));
                              $info_sec = $select_section->fetchAll();
                              $counter = 0;
                              foreach($info_sec as $info_clents) {

                              
                              $counter++;
                            ?>

                            <tr class="text-center custom-td">
                                <td><?php echo $counter; ?></td>
                                <td><?php echo $info_clents['work_name']; ?></td>
                                <td><?php echo $info_clents['section_name']; ?></td>
                                <td><a href="edit_works.php?id=<?php echo $info_clents['work_id']; ?>&type=<?php echo $info_clents['work_type']; ?>&sec=<?php echo $info_clents['work_section_id']; ?>" class="btn btn-sm btn-warning">تعديل</a></td>
                                <td><a href="?del=<?php echo $info_clents['work_id']; ?>" class="btn btn-sm btn-danger confirm">حذف</a></td>
                            </tr>
                            <?php 
                            }
                              
                          } else {

                              

                              $select_all = $DB->custom_query('SELECT works.*,
                                                                      works_sections.sec_name AS section_name,
                                                                      works_sections.sec_id AS work_section_id
                                                                      FROM 
                                                                        works
                                                                      INNER JOIN
                                                                        works_sections
                                                                      ON
                                                                        works_sections.sec_id = works.section_id');
                              
                              $select_all->execute();
                              $info_all = $select_all->fetchAll();
                              $counter = 0;
                              foreach($info_all as $all_clents) {
                              

                                
                                $counter++;
                            
                            ?>

                            <tr class="text-center custom-td">
                            <td>1</td>
                                <td><?php echo $all_clents['work_name']; ?></td>
                                <td><?php echo $all_clents['section_name']; ?></td>
                                <td><a href="edit_works.php?id=<?php echo $all_clents['work_id']; ?>&type=<?php echo $all_clents['work_type']; ?>&sec=<?php echo $all_clents['work_section_id']; ?>" class="btn btn-sm btn-warning">تعديل</a></td>
                                <td><a href="?del=<?php echo $all_clents['work_id']; ?>" class="btn btn-sm btn-danger confirm">حذف</a></td>
                            </tr>
                            <?php 
                            }

                          }
                            ?>
                        </tbody>
                    </table>
                    <a href="add_works.php?id=1&type=global&name=graphic-design" class="btn-add"><i class="fas fa-plus-circle"></i> أضافة</a>
                  </div>
              </div>
          </div>
      </div>
        </div>
      </div>
    </div>
    <!-- Start Footer Page Section -->
    <?php require_once 'inc/footer.php'; ?>