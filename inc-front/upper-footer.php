<!-- Start Our Clients -->
        <section class="our-clients">
          <div class="container">
            <div class="container-images">
                <span class="to-right"><i class="fas fa-chevron-right"></i></span>
                <div class="brands-clients">
                <!-- <a href="#" style="margin: auto 80px;"><img src="image/Brands Clients/mateen.tr.png" height="125px"></a>
                  <a href="#" style="margin: auto 20px;"><img src="image/Brands Clients/mt.png" alt="" height="125px"></a>
                  <a href="#" style="margin: auto 20px;"><img src="image/Brands Clients/recc.png" alt="" height="125px"></a>
                  <a href="#" style="margin: auto 80px;"><img src="image/Brands Clients/mateen.tr.png" height="125px"></a> -->
                  <?php 
                  $contact_data = new inbox();
                  $get_data = $contact_data->select('*', 'clients_company', 'WHERE brand_footer = 1 ORDER BY id DESC');
                  $get_data->execute(array());
                  $brands = $get_data->fetchAll();

                  foreach ($brands as $brand) {
                    ?>
                    <a href="#" style="margin: auto 80px;"><img src="<?php echo 'http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/' . $brand['dir'] . '/' . $brand['brand']; ?>" height="125px"></a>
                    <?php
                  }
                  ?>
                </div>
                <span class="to-left"><i class="fas fa-chevron-left"></i></span>
            </div>
          </div>
        </section>
      <!-- End Our Clients -->