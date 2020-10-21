    <!-- Start Header Section -->
    <?php require_once __DIR__ .'/../app/core/session.php'; ?>
    <?php require_once 'inc/top-header.php'; ?>
    <title><?php echo SITENAME; ?> - البريد الوارد</title>
    <?php require_once 'inc/header.php'; ?>
    <?php
    
    $msg = new inbox();
    $all = $msg->select('COUNT(*)', ' messages', 'WHERE type_read = 1');
    $all->execute(array());
    $count_msg = $all->fetchColumn();
    
    ?>
    <!-- Start Content Page Section -->
    <div class="container-fluid">
      <div class="row">
      <!-- Start Sidebar Page Section -->
      <div class="col-sm-3 col-md-2 sidebar">
        <?php require_once 'inc/sidebar.php'; ?>
      </div>
      
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <?php
      $user_found = false;

      if(isset($_GET['id']) and is_numeric($_GET['id'])) {
      $res = $msg->select('*', 'messages', 'WHERE id = ?');
      $res->execute(array($_GET['id']));
      if($res->rowCount() > 0) {
        $user_found = true;
      }

      if($user_found and isset($_GET['id']) and is_numeric($_GET['id'])) {
        $msg_info = $msg->select('*', 'messages', 'WHERE id = ?');
        $msg_info->execute(array($_GET['id']));
        $data = $msg_info->fetch();
        $is_read = $msg->update('messages', 'type_read = 0', 'WHERE id = ?');
        $is_read->execute(array($_GET['id']));
        if($data['type_read'] == 1) {
          header("Refresh:0");
        }
      ?>
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> االبريد الوراد</h1>
          <div class="row show_msg">
          <div class="col-md-3 col-sm-6">
              <div class="box">
                <h4>الموضوع</h4>
                <span><?php echo $data['subject']; ?></span>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="box">
                <h4>المرسل</h4>
                <span><?php echo $data['name']; ?></span>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="box">
                <h4>البريد الألكتروني</h4>
                <span style="font-family: cairo"><?php echo $data['email']; ?></span>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="box">
                <h4>الهاتف</h4>
                <span><?php echo $data['phone']; ?></span>
              </div>
            </div>
          </div>
          
          <div class="read-msg">
            <div class="about-msg">
              <div><img src="../image/icons/calendar-2.svg" alt=""> <span class="date"><?php echo $data['date']; ?></span> <img src="../image/icons/timer.svg" alt=""> <span class="time"> 12:30 ص</span></div>
            </div>
            <p><?php echo $data['content']; ?></p>
          </div>
      <?php  }
    }
        ?>
        </div>
      </div>
    </div>
    <!-- Start Footer Page Section -->
    <?php require_once 'inc/footer.php'; ?>


