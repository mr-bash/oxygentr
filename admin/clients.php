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
        $DB = new clients();
        ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> الشركات المعلنا معنا</h1>
          <div class="col-md-12">

          <div class="row">
              <div class="col-md-10 col-md-offset-1">
              <div class="btns-sectons">
              
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                <select name="select" id="" >
                  <option value="all" <?php if(isset($_GET['select']) and $_GET['select'] == 'all') { echo 'selected'; } ?> >كل الأقسام ..</option>
                  <?php 
                  $get_sections = $DB->select('*', 'clients_sections');
                  $get_sections->execute(array());
                  $get_all = $get_sections->fetchAll();
                  
                  foreach($get_all as $get_sec) {

                  ?>
                  <option value="<?php echo $get_sec['sec_unique'] ?>" <?php if(isset($_GET['select']) and $_GET['select'] == $get_sec['sec_unique']) { echo 'selected'; } ?> ><?php echo $get_sec['sec_name']; ?></option>
                  <?php } ?>

                </select>
                <input type="submit" value="أختر" name="select-btn">
                <a href="sections_clients.php" class="btnManage-sec" target="_blank">أدارة الأقسام <i class="glyphicon glyphicon-list"></i></a>
              </form>
            </div>
                  <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">الأسم</th>
                                <th class="text-center">حول الشركة</th>
                                <th class="text-center">القسم</th>
                                <th class="text-center">تعديل</th>
                                <th class="text-center">تعطيل</th>
                                <th class="text-center">حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $show_all = 'ORDER BY id DESC';
                            if(isset($_GET['del']) and is_numeric($_GET['del'])) {
                              $id = $_GET['del'];
                              $all = $DB->select('id', 'clients_company', 'WHERE id = ?');
                              $all->execute(array($_GET['del']));
                              $res = $all->rowCount();
                              if($res > 0) {
                                $del = $DB->delete('clients_company', 'WHERE id = ?');
                                $del->execute(array($_GET['del']));
                                $DB->redirecr_page(' ', $_SERVER['HTTP_REFERER'], 0);
                              } else {
                                $DB->redirecr_page(' ', 'clients.php', 0);
                              }
                            } else {
                              $id = 0;
                            }
                            if($_SERVER['REQUEST_METHOD'] == 'GET' AND isset($_GET['select-btn'])) {
                              if($_GET['select'] != 'all') {
                                $show_all = 'WHERE sec_unique = ? ORDER BY id DESC';
                              }
                              $select_section = $DB->custom_query("SELECT clients_company.*,
                                                                      clients_sections.sec_name AS section_name,
                                                                      clients_sections.sec_unique AS unique_name
                                                                      FROM 
                                                                        clients_company
                                                                      INNER JOIN
                                                                        clients_sections
                                                                      ON
                                                                        clients_sections.sec_id = clients_company.section_id {$show_all}");
                              $select_section->execute(array($_GET['select']));
                              $info_sec = $select_section->fetchAll();
                              $counter = 0;
                              foreach($info_sec as $info_clents) {

                              
                              $counter++;
                            ?>

                            <tr class="text-center custom-td">
                                <td><?php echo $counter; ?></td>
                                <td><?php echo $info_clents['name']; ?></td>
                                <td><?php echo mb_substr($info_clents['description'], 0, 30) . '...'; ?></td>
                                <td><?php echo $info_clents['section_name']; ?></td>
                                <td><a href="edit_clients.php?id=<?php echo $info_clents['id']; ?>" class="btn btn-sm btn-warning">تعديل</a></td>
                                <td><a href="edit_clients.php?id=<?php echo $info_clents['id']; ?>" class="btn btn-sm btn-info">تعطيل</a></td>
                                <td><a href="?del=<?php echo $info_clents['id']; ?>" class="btn btn-sm btn-danger confirm">حذف</a></td>
                            </tr>
                            <?php 
                            }
                              
                          } else {

                              

                              $select_all = $DB->custom_query('SELECT clients_company.*,
                                                                      clients_sections.sec_name AS section_name
                                                                      FROM 
                                                                        clients_company
                                                                      INNER JOIN
                                                                        clients_sections
                                                                      ON
                                                                        clients_sections.sec_id = clients_company.section_id');
                              
                              $select_all->execute();
                              $info_all = $select_all->fetchAll();
                              $counter = 0;
                              foreach($info_all as $all_clents) {
                              

                                
                                $counter++;
                            
                            ?>

                            <tr class="text-center custom-td">
                                <td><?php echo $counter; ?></td>
                                <td><?php echo $all_clents['name']; ?></td>
                                <td><?php echo mb_substr($all_clents['description'], 0, 30) . '...'; ?></td>
                                <td><?php echo $all_clents['section_name']; ?></td>
                                <td><a href="edit_clients.php?id=<?php echo $all_clents['id']; ?>" class="btn btn-sm btn-warning">تعديل</a></td>
                                <td><a href="#>" class="btn btn-sm btn-info">تعطيل</a></td>
                                <td><a href="?del=<?php echo $all_clents['id']; ?>" class="btn btn-sm btn-danger confirm">حذف</a></td>
                            </tr>
                            <?php 
                            }

                          }
                            ?>
                        </tbody>
                    </table>
                    <a href="add_clients.php" class="btn-add"><i class="fas fa-plus-circle"></i> أضافة</a>
                  </div>
              </div>
          </div>
      </div>
        </div>
      </div>
    </div>
    <!-- Start Footer Page Section -->
    <?php require_once 'inc/footer.php'; ?>