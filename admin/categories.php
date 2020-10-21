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
          <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> أقسام الموقع</h1>
          <div class="col-md-12">
          <div class="row">
              <div class="col-md-10 col-md-offset-1">
                  <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">الأسم</th>
                                <th class="text-center">وصف القسم</th>
                                <th class="text-center">شعار القسم</th>
                                <th class="text-center">تعديل</th>
                                <th class="text-center">حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center custom-td">
                                <td>1</td>
                                <td>الرئيسية</td>
                                <td>الصفحة الرئيسية للموقع</td>
                                <td><img src="../image/icons/home-blue.svg" alt="about oxygen" width="17px"></td>
                                <td><a href="edit_category.php?id=1" class="btn btn-sm btn-warning">تعديل</a></td>
                                <td><a href="?del=1" class="btn btn-sm btn-danger confirm">حذف</a></td>
                            </tr>
                            <tr class="text-center custom-td">
                                <td>1</td>
                                <td>الرئيسية</td>
                                <td>الصفحة الرئيسية للموقع</td>
                                <td><img src="../image/icons/home-blue.svg" alt="about oxygen" width="17px"></td>
                                <td><a href="edit_category.php?id=1" class="btn btn-sm btn-warning">تعديل</a></td>
                                <td><a href="?del=1" class="btn btn-sm btn-danger confirm">حذف</a></td>
                            </tr>
                            <tr class="text-center custom-td">
                                <td>1</td>
                                <td>الرئيسية</td>
                                <td>الصفحة الرئيسية للموقع</td>
                                <td><img src="../image/icons/home-blue.svg" alt="about oxygen" width="17px"></td>
                                <td><a href="edit_category.php?id=1" class="btn btn-sm btn-warning">تعديل</a></td>
                                <td><a href="?del=1" class="btn btn-sm btn-danger confirm">حذف</a></td>
                            </tr>
                            <tr class="text-center custom-td">
                                <td>1</td>
                                <td>الرئيسية</td>
                                <td>الصفحة الرئيسية للموقع</td>
                                <td><img src="../image/icons/home-blue.svg" alt="about oxygen" width="17px"></td>
                                <td><a href="edit_category.php?id=1" class="btn btn-sm btn-warning">تعديل</a></td>
                                <td><a href="?del=1" class="btn btn-sm btn-danger confirm">حذف</a></td>
                            </tr>
                            <tr class="text-center custom-td">
                                <td>1</td>
                                <td>الرئيسية</td>
                                <td>الصفحة الرئيسية للموقع</td>
                                <td><img src="../image/icons/home-blue.svg" alt="about oxygen" width="17px"></td>
                                <td><a href="edit_category.php?id=1" class="btn btn-sm btn-warning">تعديل</a></td>
                                <td><a href="?del=1" class="btn btn-sm btn-danger confirm">حذف</a></td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="add_category.php" class="btn-add"><i class="fas fa-plus-circle"></i> أضافة</a>
                  </div>
                  <!-- <nav class="text-center">
                    <ul class="pagination">
                      <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                    </ul>
                  </nav> -->
              </div>
          </div>
      </div>
        </div>
      </div>
    </div>
    <!-- Start Footer Page Section -->
    <?php require_once 'inc/footer.php'; ?>