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
          

            if(isset($_GET['keyword']) && $_GET['keyword']){
                $keyword=$_GET['keyword'];
                $reload = "grid_laporan_pembayaran?pagination=true&keyword=$keyword";
                $sql = "SELECT kode_pembayaran.kode_bayar, invoice.no_inv, profile.nama_customer, invoice.proyek, 
                m_group.nama_group, invoice.total_inv, kode_pembayaran.nama_status
                FROM kode_pembayaran JOIN invoice ON kode_pembayaran.id_inv=invoice.id
                JOIN profile ON invoice.cust_id=profile.cust_id
                JOIN m_group ON profile.group_cust=m_group.Id
                WHERE 
                 -- cust_id LIKE '%$keyword%' OR no_inv LIKE '%$keyword%'
                m_group.nama_group LIKE '%$keyword%' OR invoice.no_inv LIKE '%$keyword%' OR profile.nama_customer LIKE '%$keyword%' OR invoice.proyek LIKE '%$keyword%'
                ORDER BY kode_pembayaran.Id";
                $result = mysqli_query($connect,$sql);
            }else{
    //            jika tidak ada pencarian pakai ini
                $reload = "grid_laporan_pembayaran?pagination=true";
                $sql =  "SELECT kode_pembayaran.kode_bayar, invoice.no_inv, profile.nama_customer, invoice.proyek, 
                m_group.nama_group, invoice.total_inv, kode_pembayaran.nama_status
                FROM kode_pembayaran JOIN invoice ON kode_pembayaran.id_inv=invoice.id
                JOIN profile ON invoice.cust_id=profile.cust_id
                JOIN m_group ON profile.group_cust=m_group.Id
                ORDER BY kode_pembayaran.Id";
                $result = mysqli_query($connect,$sql);
            }
            
            //pagination config start
            $rpp = 20; // jumlah record per halaman
            $page = intval($_GET["page"]);
             if($page<=0) $page = 1;  
            $tcount = mysqli_num_rows($result);
            $tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number
            $count = 0;
            $i = ($page-1)*$rpp;
            $no_urut = ($page-1)*$rpp;
            //pagination config end
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
        <!-- form enntry -->
        <div class="row">

          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2><b>LAPORAN STATUS PEMBAYARAN</b></h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card-box table-responsive">
                      <div class="row">
                        <div class="col-md-3">
                          <form method="get" action="">
                            <div class="form-group input-group">
                              <input type="text" name="keyword" class="form-control" placeholder="Cari.." value="<?php echo $_GET['keyword']; ?>">
                              <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">Cari
                                </button>
                              </span>
                            </div>
                          </form>
                        </div>
                        <div class="col-md-3">
                        <form action="laporan/exel_laporan_pembayaran" method="post">
                        <input type="hidden" name="sql" value="<?php echo $sql ?>" >
                          <span class="input-group-btn">
                          </span>
                          <button class="btn btn-success" type="submit">Download
                      </button>
                    <a href="grid_laporan_pembayaran" class="btn btn-sm btn-info">Refresh<i class="fa fa-refresh"></i></a>
                    </form>
                        </div>
                      </div>
                      <table id="datatable-keytable" class="table table-striped table-bordered jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Nomer </th>
                            <th class="column-title">Kode Pembayaran</th>
                            <th class="column-title">No Inv</th>
                            <th class="column-title">Customer</th>
                            <th class="column-title">Proyek </th>
                            <th class="column-title">Group </th>
                            <th class="column-title">Tagihan Inv</th>
                            <th class="column-title">Status</th>
                            </th>
                          </tr>
                        </thead>
                        <?php
                        while(($count<$rpp) && ($i<$tcount)) {
                        mysqli_data_seek($result,$i);
                        $data = mysqli_fetch_array($result);
                        // $qinvoice = mysqli_query($connect, "SELECT * FROM invoice WHERE id='$data[id_inv]'");
                        // $tmpilinvoice = mysqli_fetch_array($qinvoice);
                        // $qprofile = mysqli_query($connect, "SELECT * FROM profile WHERE cust_id='$tmpilinvoice[cust_id]'");
                        // $tmpilprofil = mysqli_fetch_array($qprofile);
                        $qstatus = mysqli_query($connect, "SELECT * FROM status WHERE nama_status='$data[nama_status]'");
                        $tmpilstatus = mysqli_fetch_array($qstatus);
                        // $qgroup = mysqli_query($connect, "SELECT * FROM m_group WHERE Id='$tmpilprofil[group_cust]'");
                        // $tmpilgroup = mysqli_fetch_array($qgroup);
                        ?>
                        <tbody>
                          <td class=" ">
                            <?php echo ++$no_urut; ?>
                          </td>
                          <td><?php echo $data['kode_bayar']; ?></td>
                          <td><?php echo $data['no_inv']; ?></td>
                          <td><?php echo $data['nama_customer']; ?></td>
                          <td><?php echo $data['proyek']; ?></td>
                          <td><?php echo $data['nama_group']; ?></td>
                          <td>Rp. <?php echo number_format($data['total_inv'], 0, ".","."); ?></td>
                          <td><a href="#" class="btn btn-sm" style="background:<?php echo $tmpilstatus['warna']; ?>"></span><?php echo $data['nama_status']; ?></a></td>
                          </tr>
                          <?php  
                            $i++; 
                           $count++;
                            }
                            ?>
                        </tbody>
                      </table>
                      <ul class="pagination">
                        <li>
                          <?php echo paginate_one($reload, $page, $tpages); ?>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /form entry -->
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