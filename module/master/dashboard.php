<!DOCTYPE html>
<html lang="en">
  <?php
  include "layout/head.php";
   ?>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            

            <!-- menu profile quick info -->
           <?php
           $querytandaterima = mysqli_query($connect, "SELECT COUNT(id) AS surat FROM invoice WHERE tgl_terima IS NULL ORDER BY id");
           $tmpilterima = mysqli_fetch_assoc($querytandaterima);
           $querysurat = mysqli_query($connect, "SELECT COUNT(id) AS tanda_terima FROM invoice WHERE tgl_terima IS NOT NULL");
           $tmpilsurat = mysqli_fetch_assoc($querysurat);
           $querytotaluang = mysqli_query($connect, "SELECT SUM(total_bayar) AS total FROM pembayaran ORDER BY Id");
           $tmpiltotal = mysqli_fetch_assoc($querytotaluang);
           $queryuser = mysqli_query($connect, "SELECT COUNT(Id) AS total_user FROM user ORDER BY Id");
           $tmpiluser = mysqli_fetch_assoc($queryuser);
           $queryTopsales = mysqli_query($connect, "SELECT id_sales, COUNT(id_sales) AS total FROM invoice GROUP BY id_sales ORDER BY total DESC LIMIT 0,10");
           $nosales = 1;
           $querycust = mysqli_query($connect, "SELECT pembayaran.id_inv, invoice.cust_id, COUNT(pembayaran.id_inv) AS total FROM pembayaran JOIN invoice ON pembayaran.id_inv=invoice.id GROUP BY pembayaran.id_inv ORDER BY total DESC LIMIT 0,10");
           $querytoppengajuan = mysqli_query($connect, "SELECT cust_id, COUNT(cust_id) AS total FROM invoice GROUP BY cust_id ORDER BY total DESC LIMIT 0,10");
           $nopengajuan = 1;
           $nocust = 1;
            ?>

            <!-- sidebar menu -->
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
                <?php 
                include "layout/left.php";
                ?>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
      <?php
      include "layout/top.php";
       ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <?php if($_SESSION['hak_level']=='admin4') { } else { ?>
          <!-- top tiles -->
          <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="grid_tanda_terima">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-book"></i></div>
                  <div class="count"><?php echo $tmpilterima['surat']; ?></div>
                  <h3>Total Tanda Terima</h3>
                  <p>yang belum dikirim</p>
                </div>
              </a>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="grid_total_uang_masuk">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-money"></i></div>
                  <div class="count"><?php echo number_format($tmpiltotal['total'],0,".","."); ?></div>
                  <h3>Total Uang Semua</h3>
                  <p>jumlah uang masuk</p>
                </div>
                </a>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="grid_user">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-users"></i></div>
                  <div class="count"><?php echo $tmpiluser['total_user']; ?></div>
                  <h3>Total User</h3>
                  <p>jumlah user yang terdaftar</p>
                </div>
              </a>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="grid_tanda_terima">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-book"></i></div>
                  <div class="count"><?php echo $tmpilsurat['tanda_terima']; ?></div>
                  <h3>Total Tanda Terima</h3>
                  <p>Yang Sudah Dikirim</p>
                </div>
              </a>
              </div>
              <!-- <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count">179</div>
                  <h3>New Sign ups</h3>
                  <p>Lorem ipsum psdea itgum rixt.</p>
                </div>
              </div> -->
            </div>
              <?php } ?>
          <!-- /top tiles -->
          <div class="row">
          <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Top Sales <small>penjualan</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <ul class="list-unstyled top_profiles scroll-view">
                    <?php 
                      while($datasales = mysqli_fetch_array($queryTopsales)){
                        $querisales = mysqli_query($connect, "SELECT * FROM user_sales WHERE id='$datasales[id_sales]'");
                        $tmpilsales = mysqli_fetch_array($querisales);
                      ?>
                    <li class="media event">
                      <a class="pull-left border-aero profile_thumb">
                        <i class="fa fa-user green"></i>
                      </a>
                      
                      <div class="media-body">
                        <a class="title" href="#">No. <?php echo $nosales++; ?></a>
                        <p><strong>Nama Sales :<?php echo $tmpilsales['nm_sales']; ?></strong>
                        </p>
                        <p><strong>Total :<?php echo $datasales['total']; ?></strong>
                        </p>
                      </div>
                    </li>
                          <?php }?>
                        </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Top Customer <small>pembayaran</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                    <ul class="list-unstyled top_profiles scroll-view">
                    <?php 
                      while($datacust = mysqli_fetch_array($querycust)){
                      $queryprofil = mysqli_query($connect, "SELECT * FROM profile WHERE cust_id = '$datacust[cust_id]'");
                      $tmpilprofil = mysqli_fetch_array($queryprofil);
                      ?>
                    <li class="media event">
                      <a class="pull-left border-aero profile_thumb">
                        <i class="fa fa-user green"></i>
                      </a>
                      
                      <div class="media-body">
                        <a class="title" href="#">No. <?php echo $nocust++; ?></a>
                        <p><strong>Nama CUstomer :<?php echo $tmpilprofil['nama_customer']; ?></strong>
                        </p>
                        <p><strong>Total :<?php echo $datacust['total']; ?></strong>
                        </p>
                      </div>
                    </li>
                          <?php }?>
                        </ul>
                  </div>
                  <div class="x_content">
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Top Customer <small>Pengajuan Paling Banyak</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <ul class="list-unstyled top_profiles scroll-view">
                    <?php 
                      while($datatoppengajauan = mysqli_fetch_array($querytoppengajuan)){
                      $q = mysqli_query($connect, "SELECT * FROM profile WHERE cust_id = '$datatoppengajauan[cust_id]'");
                      $tmpilprofile = mysqli_fetch_array($q);
                      ?>
                    <li class="media event">
                      <a class="pull-left border-aero profile_thumb">
                        <i class="fa fa-user green"></i>
                      </a>
                      
                      <div class="media-body">
                        <a class="title" href="#">No. <?php echo $nopengajuan++; ?></a>
                        <p><strong>Nama CUstomer :<?php echo $tmpilprofile['nama_customer']; ?></strong>
                        </p>
                        <p><strong>Total :<?php echo $datatoppengajauan['total']; ?></strong>
                        </p>
                      </div>
                    </li>
                          <?php }?>
                        </ul>
                  </div>
                </div>
              </div>
</div>
          <br />
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include "layout/footer.php"; ?>
        <!-- /footer content -->
      </div>
    </div>
<?php
    include "layout/js_bottom.php";
 ?>
 
