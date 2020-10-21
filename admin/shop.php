    <!-- Start Header Section -->
    <?php require_once __DIR__ .'/../app/core/session.php'; ?>
    <?php require_once 'inc/top-header.php'; ?>
    <title><?php echo SITENAME; ?> - أداراة المنتجات</title>
    <?php require_once 'inc/header.php'; ?>

    <!-- Start Content Page Section -->
    <div class="container-fluid">
      <div class="row">
      <!-- Start Sidebar Page Section -->
        <div class="col-sm-3 col-md-2 sidebar">
          <?php require_once 'inc/sidebar.php'; ?>
        </div>
        <?php 
        $shop = new shop();
        if(isset($_GET['del']) and is_numeric($_GET['del'])) {
          $id = $_GET['del'];
          $all = $shop->select('id', 'shop', 'WHERE id = ?');
          $all->execute(array($_GET['del']));
          $res = $all->rowCount();
          if($res > 0) {
            $del = $shop->delete('shop', 'WHERE id = ?');
            $del->execute(array($_GET['del']));
            $msg->redirecr_page(' ', $_SERVER['HTTP_REFERER'], 0);
          } else {
            $msg->redirecr_page(' ', 'shop.php', 0);
          }
        } else {
          $id = 0;
        }
        
        ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> المنتجات</h1>
          <div class="col-md-12">
          
          <div class="row">
              <?php
              
              if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['update_description'])) {

                $shop->update_secription($_POST['description']);
  
              }
              $get_desc = $shop->select('*', 'shop_section', 'WHERE section_id = 1');
              $get_desc->execute(array());
              $data_desc = $get_desc->fetch();
              ?>
              
              <div class="col-md-10 col-md-offset-1">
              <div class="btns-sectons">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                  <select name="select" id="" >

                    <option value="0" <?php if(isset($_GET['select']) and $_GET['select'] == '0') { echo 'selected'; } ?> >الكل</option>
                    <?php 
                    $get_sections = $shop->select('*', 'shop_section');
                    $get_sections->execute(array());
                    $get_all = $get_sections->fetchAll();
                    foreach($get_all as $get_sec) {

                    ?>
                    <option value="<?php echo $get_sec['section_id']; ?>" <?php if(isset($_GET['select']) and $_GET['select'] == $get_sec['section_id']) { echo 'selected'; } ?>  ><?php echo $get_sec['section_name']; ?></option>
                    <?php } ?>

                  </select>
                  <input type="submit" value="أختر" name="select-btn">
                  <a href="sections_shop.php" class="btnManage-sec" target="_blank">أدارة الأقسام <i class="glyphicon glyphicon-list"></i></a>
                </form>
              </div>
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
                            if($_SERVER['REQUEST_METHOD'] == 'GET' AND isset($_GET['select'])) {
                            if($_GET['select'] == 0) {
                              $query = 'ORDER BY id DESC';
                            } else {
                              $query = 'WHERE cat_id = ' . $_GET['select'] . ' ORDER BY id DESC';
                            }
                            $get_data = $msg->select('*', 'shop', $query);
                            $get_data->execute(array());
                            $all_data = $get_data->fetchAll();
                            $c = 1;
                            foreach ($all_data as $data) {
                            
                            ?>
                            <tr class="text-center custom-td" style="position: relative!important;">
                                <td><div class="about-td"><?php echo $c; $c++; ?></div></td>
                                <td><div class="about-td"><?php echo mb_substr($data['name'], 0, 20, "utf-8"); ?></div></td>
                                <td><div class="about-td td-img" style="width: 100px;height: 46px;"><img src="uplodas/<?php echo $data['dir'] . '/' . $data['img_1']; ?>"></div></td>
                                <td><div class="about-td"><a href="edit_product.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-info">تعديل</a></div></td>
                                <td><div class="about-td"><a href="?del=<?php echo $data['id']; ?>" class="btn btn-sm btn-danger confirm">حذف</a></div></td>
                            </tr>
                            <?php }
                            } else {
                            $get_data = $msg->select('*', 'shop', 'ORDER BY id DESC');
                            $get_data->execute(array());
                            $all_data = $get_data->fetchAll();
                            $c = 1;
                            foreach ($all_data as $data) {
                            
                            ?>
                            <tr class="text-center custom-td" style="position: relative!important;">
                                <td><div class="about-td"><?php echo $c; $c++; ?></div></td>
                                <td><div class="about-td"><?php echo mb_substr($data['name'], 0, 20, "utf-8"); ?></div></td>
                                <td><div class="about-td td-img" style="width: 100px;height: 46px;"><img src="uplodas/<?php echo $data['dir'] . '/' . $data['img_1']; ?>"></div></td>
                                <td><div class="about-td"><a href="edit_product.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-info">تعديل</a></div></td>
                                <td><div class="about-td"><a href="?del=<?php echo $data['id']; ?>" class="btn btn-sm btn-danger confirm">حذف</a></div></td>
                            </tr>
                            <?php } 
                            }
                            ?>
                        </tbody>
                    </table>
                    <a href="add_product.php" class="btn-add"><i class="fas fa-plus-circle"></i> أضافة</a>
                  </div>
              </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Start Footer Page Section -->
    <?php require_once 'inc/footer.php'; ?>


