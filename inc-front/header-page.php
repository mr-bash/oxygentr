<?php require_once 'inc-front/header-nav.php'; ?>
<?php
$sections = $contact_data->select('*', 'clients_sections');
$sections->execute(array());
$all_sec = $sections->fetchAll();
?>

<div class="call-direct">
  <a href="https://wa.me/+<?php echo $conn_data['whatsapp']; ?>" target="_blank"><i class="fab fa-whatsapp"></i></a>
</div>
</header>