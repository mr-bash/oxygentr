    <!-- Start Header Section -->
    <?php require_once __DIR__ .'/../app/core/session.php'; ?>
    <?php require_once 'inc/top-header.php'; ?>
    <title><?php echo SITENAME; ?> - البريد الوارد</title>
    <?php require_once 'inc/header.php'; ?>

    <!-- Start Content Page Section -->
    <div class="container-fluid">
      <div class="row">
      <!-- Start Sidebar Page Section -->
        <div class="col-sm-3 col-md-2 sidebar">
          <?php require_once 'inc/sidebar.php'; ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> االبريد الوراد</h1>
          <div class="col-md-12">
          <div class="row">
              <div class="col-md-10 col-md-offset-1">
                  <div class="table-responsive">
                    <table class="table table-hover tabele-msg">
                        <thead>
                            <tr class="custom-title">
                                <th class="text-center">المرسل</th>
                                <th class="text-center">الموضوع</th>
                                <th class="text-center">.</th>
                            </tr>
                        </thead>
                        <tbody class="msg-td">
                          <?php
                          if(isset($_GET['del']) and is_numeric($_GET['del'])) {
                            $id = $_GET['del'];
                            $all = $msg->select('id', 'messages', 'WHERE id = ?');
                            $all->execute(array($_GET['del']));
                            $res = $all->rowCount();
                            if($res > 0) {
                              $del = $msg->delete('messages', 'WHERE id = ?');
                              $del->execute(array($_GET['del']));
                              $msg->redirecr_page(' ', $_SERVER['HTTP_REFERER'], 0);
                            } else {
                              $msg->redirecr_page(' ', 'inbox.php', 0);
                            }
                          } else {
                            $id = 0;
                          }
                          $all_msg = $msg->select('*', ' messages', 'ORDER BY id DESC');
                          $all_msg->execute(array());
                          $messages = $all_msg->fetchAll();

                          foreach($messages as $message) {

                          ?>

                            <tr class="text-center custom-td <?php if($message['type_read'] == 0) { echo 'old-msg'; } ?>" style="position: relative!important">
                                <td class="<?php if($message['type_read'] == 1) { echo 'new-msg'; }?>" ><a href="show_message.php?id=<?php echo $message['id']; ?>" class="cliked"><?php echo $message['name']; ?></a></td>
                                <td><a href="show_message.php?id=<?php echo $message['id']; ?>" class="cliked"><?php echo $message['subject']; ?></a></td>
                                <td><a href="show_message.php?id=<?php echo $message['id']; ?>" class="cliked"><a href="?del=<?php echo $message['id']; ?>" class="btn btn-sm btn-danger confirm">حذف</a></a></td>
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


