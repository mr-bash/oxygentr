<?php require_once 'inc-front/header-nav.php'; ?>
<?php
$sections = $contact_data->select('*', 'clients_sections');
$sections->execute(array());
$all_sec = $sections->fetchAll();
?>
<!-- Start Cover -->
<div class="cover">
  <?php 
  $c1 = 1;
  foreach ($all_sec as $cover) {

  ?>
  <div class="img-c img-cover<?php echo $c1; $c1++; ?>" style="background-image: url(admin/uplodas/<?php echo $cover['dir'] . '/' . $cover['sec_cover']; ?>)" data-sc768="<?php echo 'background-image: url(admin/uplodas/' . $cover['dir'] . '/' . $cover['sec_cover768'] . ');' ?>" data-sc576="<?php echo 'background-image: url(admin/uplodas/' . $cover['dir'] . '/' . $cover['sec_cover576'] . ');' ?>"></div>
  <?php
  }
  $h1 = 1;
  foreach ($all_sec as $hover) {

  ?>
  <div class="img-h hover-cover<?php echo $h1; $h1++; ?>" style="background-image: url(admin/uplodas/<?php echo $hover['dir'] . '/' . $hover['sec_cover']; ?>)"></div>
  <?php } ?>
  <div class="container">
    <div class="sections">
      <div class="boxs-sections">
        <div class="row no-gutters">
          <?php 
          
          
          $i = 1;
          foreach($all_sec as $sec) {

          ?>
          <a href="section_client.php?id=<?php echo $sec['sec_id']; ?>" class="col-md-2 col-sm-3" data=".cover .hover-cover<?php echo $i; $i++; ?>" data-in="<?php echo 'admin/uplodas/'.  $sec['dir'] . '/' . $sec['icon_white']; ?>" data-out="<?php echo 'admin/uplodas/'.  $sec['dir'] . '/' . $sec['icon_dark']; ?>"><?php echo $sec['sec_name']; ?> <img src="admin/uplodas/<?php echo $sec['dir'] . '/' . $sec['icon_dark']; ?>" alt="<?php echo $sec['sec_name']; ?>" width="19px"></a>
          <img src="admin/uplodas/<?php echo $sec['dir'] . '/' . $sec['icon_white']; ?>" style="display: none;" width="0" height="0">
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Cover -->
<div class="call-direct">
  <a href="https://wa.me/+<?php echo $conn_data['whatsapp']; ?>" target="_blank"><i class="fab fa-whatsapp"></i></a>
</div>
</header>