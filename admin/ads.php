    <!-- Start Header Section -->
    <?php require_once __DIR__ .'/../app/core/session.php'; ?>
    <?php require_once 'inc/top-header.php'; ?>
    <title><?php echo SITENAME; ?> - أدارة الأعلانات</title>
    <?php require_once 'inc/header.php'; ?>

    <!-- Start Content Page Section -->
    <div class="container-fluid">
      <div class="row">
      <!-- Start Sidebar Page Section -->
        <div class="col-sm-3 col-md-2 sidebar">
          <?php require_once 'inc/sidebar.php'; ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> أدارة الأعلانات</h1>
          <div class="col-md-12">
          <div class="row">
              <div class="col-md-10 col-md-offset-1">
                  <div class="table-responsive">
                    <table class="table table-hover tabele-msg" style="height: 400px;">
                        <thead>
                            <tr class="custom-title">
                                <th class="text-center">#</th>
                                <th class="text-center">القسم</th>
                                <th class="text-center">الصورة</th>
                                <th class="text-center">تعديل</th>
                                <th class="text-center">تعطيل</th>
                            </tr>
                        </thead>
                        <tbody class="msg-td">
                            <?php 
                            
                            $ads = new ads();
                            $database = $ads->select("*",'ads', 'ORDER BY id DESC');
                            $database->execute(array());
                            $iformation = $database->fetchAll();
                            $y = 1;
                            foreach ($iformation as $info) {
                              
                            ?>
                            <tr class="text-center custom-td" style="position: relative!important;">
                                <td><div class="about-td"><?php echo $y; $y++; ?></div></td>
                                <td><div class="about-td"><?php echo $info['section']; ?></div></td>
                                <td><div class="about-td td-img"  style="width: 90px; height:50px"><img src="uplodas/ads/<?php echo $info['image']; ?>" width="100%" height="80%"></div></td>
                                <td><div class="about-td"><a href="edit_ads.php?id=<?php echo $info['id']; ?>" class="btn btn-sm btn-info">تعديل</a></div></td>
                                <?php if ($info['display'] == 1) { ?>
                                <td><div class="about-td"><a href="display_ads.php?id=<?php echo $info['id']; ?>" class="btn btn-sm btn-danger">تعطيل</a></div></td>
                                <?php } else { ?>
                                  <td><div class="about-td"><a href="display_ads.php?id=<?php echo $info['id']; ?>" class="btn btn-sm btn-success">تفعيل</a></div></td>
                                <?php } ?>
                            </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                  </div>
              </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Start Footer Page Section -->
    <?php require_once 'inc/footer.php'; ?>


