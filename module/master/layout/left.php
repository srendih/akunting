<div class="navbar nav_title" style="border: 0;">
          <a href="#" class="site_title"><i class="fa fa-calculator"></i> <span>PT BDN</span></a>
        </div>

        <div class="clearfix"></div>
            <div class="profile clearfix">
                        <div class="profile_pic">
                          <img src="images/foto.png" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                          <span>Selamat Datang,</span>
                          <h2><?php echo $_SESSION['username']; ?></h2>
                        </div>
                      </div>
                      <!-- /menu profile quick info -->
                      <br />
                  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                  <div class="menu_section">
                  <h3>Dashboard</h3>
                  <ul class="nav side-menu">
                    <li><a href="dashboard"><i class="fa fa-home"></i> Home</a></li>
                    <!-- hak admin -->
                    <?php 
                    if($_SESSION['hak_level']=='admin') {
                     ?>
                    <li><a><i class="fa fa-edit"></i> Master<span class="fa fa-chevron-down"></span> <span class="label label-success pull-right">Data Master</span></a>
                    <ul class="nav child_menu">
                        <li><a href="grid_user">User</a></li>
                        <li><a href="grid_group">Group </a></li>
                        <li><a href="grid_profil">User Profil </a></li>
                        <li><a href="grid_sales">Sales </a></li>
                        <li><a href="grid_status">Status </a></li>
                        <li><a>Limit Piutang<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="grid_limit_cust">Limit Customer</a>
                            </li>
                            <li><a href="grid_limit_group">Limit Group</a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li><a><i class="fa fa-table"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                  <li><a>Invoice<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li class="sub_menu"><a href="grid_invoice">Input Invoice</a>
                      </li>
                      <li><a href="grid_invoice_tgl_terima">Input Invoice Tanggal Terima</a>
                      </li>
                      <li><a href="grid_edit_invoice_pembayaran">Input Invoice Pembayaran</a>
                     <!--  </li>
                      <li><a href="grid_invoice_pembayaran">Input Invoice Pembayaran</a>
                      </li> -->
                    </ul>
                  </li>
                      <li><a href="grid_kode_pembayaran">Kode Pembayaran</a></li>
                      <li><a href="grid_tanda_terima">Tanda Terima</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a>Laporan Pembayaran<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li class="sub_menu"><a href="grid_total_uang_masuk">Total Pembayaran Detail</a>
                      </li>
                      <li><a href="grid_total_pembayaran">Total Laporan Pembayaran</a>
                      </li>
                    </ul>
                  </li>
                      <li><a href="grid_total_piutang">Total Sisa Limit</a></li>
                      <li><a href="grid_total_hutang">Total Piutang</a></li>
                      <li><a href="grid_laporan_pembayaran">Laporan Status Pembayaran </a></li>
                    </ul>
                  </li>
                    <?php } ?>
                    <!-- end hak admin -->
                    <!-- hak admin2 -->
                    <?php if($_SESSION['hak_level']=='admin2') {
                     ?>
                     <li><a><i class="fa fa-edit"></i> Master<span class="fa fa-chevron-down"></span> <span class="label label-success pull-right">Data Master</span></a>
                    <ul class="nav child_menu">
                        <li><a href="grid_group">Group </a></li>
                        <li><a href="grid_profil">User Profil </a></li>
                        <li><a href="grid_sales">Sales </a></li>
                        <li><a>Limit Piutang<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="grid_limit_cust">Limit Customer</a>
                            </li>
                            <li><a href="grid_limit_group">Limit Group</a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                  <li><a><i class="fa fa-table"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                  <li><a>Invoice<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li class="sub_menu"><a href="grid_invoice">Input Invoice</a>
                      </li>
                      <li><a href="grid_invoice_tgl_terima">Input Invoice Tanggal Terima</a>
                      </li>
                      <li><a href="grid_invoice_pembayaran">Input Invoice Pembayaran</a>
                      </li>
                    </ul>
                  </li>
                      <li><a href="grid_kode_pembayaran">Kode Pembayaran</a></li>
                      <li><a href="grid_tanda_terima">Tanda Terima</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a>Laporan Pembayaran<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li class="sub_menu"><a href="grid_total_uang_masuk">Total Pembayaran Detail</a>
                      </li>
                      <li><a href="grid_total_pembayaran">Total Laporan Pembayaran</a>
                      </li>
                    </ul>
                  </li>
                  <li><a href="grid_total_piutang">Total Sisa Limit</a></li>
                      <li><a href="grid_total_hutang">Total Piutang</a></li>
                      <li><a href="grid_laporan_pembayaran">Laporan Status Pembayaran </a></li>
                    </ul>
                  </li>
                <?php } ?>
                <!-- end hak admin2 -->
                <!-- hak admin4 -->
                <?php if($_SESSION['hak_level']=='admin4') {
                 ?>
                  <li><a><i class="fa fa-clone"></i>Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="grid_total_piutang">Total Sisa Limit</a></li>
                      <li><a href="grid_total_hutang">Total Piutang</a></li>
                    </ul>
                  </li>
                <?php } ?>
                <!-- end hak admin4 -->
                <!-- hak admin3 -->
                <?php if($_SESSION['hak_level']=='admin3') {
                 ?>
                 <li><a><i class="fa fa-table"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                  <li><a>Invoice<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li class="sub_menu"><a href="grid_invoice">Input Invoice</a>
                      </li>
                      <li><a href="grid_invoice_tgl_terima">Invoice Tanggal Terima</a>
                      </li>
                      <li><a href="grid_invoice_pembayaran">Invoice Pembayaran</a>
                      </li>
                    </ul>
                  </li>
                      <li><a href="grid_kode_pembayaran">Kode Pembayaran</a></li>
                      <li><a href="grid_tanda_terima">Tanda Terima</a></li>
                      
                    </ul>
                  </li>
                 <!-- <li><a><i class="fa fa-table"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                  <li class=""><a href="grid_invoice">Invoice</a>
                  <li><a href="grid_kode_pembayaran">Kode Pembayaran</a></li>
                  <li><a href="grid_tanda_terima">Tanda Terima</a></li>
                      
                    </ul>
                  </li> -->
                <?php } ?>
                <!-- end hak admin3 -->
                </ul>
              </div>
            </div>