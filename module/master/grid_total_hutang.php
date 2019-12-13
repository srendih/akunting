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
            // $qugroup = mysqli_query($connect, "SELECT * FROM m_group WHERE Id='$tmpilprofi[group_cust]'");    

            if(isset($_POST['caritanggal'])){

              if(empty($_POST['tgl_awal'] && $_POST['tgl_akhir'])) {
                $keyword=$_POST['keyword'];
                $reload = "grid_total_uang_masuk?pagination=true&keyword=$keyword";
                $sql =  "SELECT invoice.no_inv, invoice.cust_id, profile.nama_customer, m_group.nama_group, SUM(invoice.sisa_bayar) AS total_sisa_bayar, invoice.tgl_inv, SUM(invoice.total_inv) AS total_invoice, SUM(invoice.bayar_inv) AS total_bayar
                FROM invoice JOIN profile ON invoice.cust_id=profile.cust_id
                JOIN m_group ON profile.group_cust=m_group.Id 
                WHERE invoice.cust_id LIKE '%$keyword%' OR invoice.no_inv LIKE '%$keyword%' OR m_group.nama_group LIKE '%$keyword%'
                GROUP BY invoice.cust_id
                 ORDER BY invoice.Id";

                $result = mysqli_query($connect,$sql);

              }
              if(empty($_POST['keyword'])) {
                $tgl1 = $_POST['tgl_awal'];
                $tgl2 = $_POST['tgl_akhir'];
                $reload = "grid_total_hutang?pagination=true&keyword=$tgl1";
                $sql =  "SELECT invoice.no_inv, invoice.cust_id, profile.nama_customer, m_group.nama_group, SUM(invoice.sisa_bayar) AS total_sisa_bayar, invoice.tgl_inv, SUM(invoice.total_inv) AS total_invoice, SUM(invoice.bayar_inv) AS total_bayar
                FROM invoice JOIN profile ON invoice.cust_id=profile.cust_id
                JOIN m_group ON profile.group_cust=m_group.Id 
                WHERE invoice.tgl_inv BETWEEN '$tgl1' AND '$tgl2'
                GROUP BY invoice.cust_id
                 ORDER BY invoice.Id";

                $result = mysqli_query($connect,$sql);

              }
              if(!empty($_POST['keyword'] && $_POST['tgl_awal'] && $_POST['tgl_akhir'])) {
                $keyword=$_POST['keyword'];
                $tgl1 = $_POST['tgl_awal'];
                $tgl2 = $_POST['tgl_akhir'];
                $reload = "grid_total_hutang?pagination=true&keyword=$keyword";
                // $sql =  "SELECT * FROM pembayaran WHERE tgl_bayar BETWEEN '$tgl1' AND '$tgl2' ORDER BY Id";
                $sql =  "SELECT invoice.no_inv, invoice.cust_id, profile.nama_customer, m_group.nama_group, SUM(invoice.sisa_bayar) AS total_sisa_bayar, invoice.tgl_inv, SUM(invoice.total_inv) AS total_invoice, SUM(invoice.bayar_inv) AS total_bayar
                FROM invoice JOIN profile ON invoice.cust_id=profile.cust_id
                JOIN m_group ON profile.group_cust=m_group.Id 
                WHERE invoice.tgl_inv BETWEEN '$tgl1' AND '$tgl2' AND
                invoice.cust_id LIKE '%$keyword%' OR invoice.no_inv LIKE '%$keyword%' OR m_group.nama_group LIKE '%$keyword%'
                GROUP BY invoice.cust_id
                 ORDER BY pembayaran.Id";
                $result = mysqli_query($connect,$sql);
            }

          }
            else
            {
                $reload = "grid_total_hutang?pagination=true";
                $sql =  "SELECT invoice.no_inv, invoice.cust_id, profile.nama_customer, m_group.nama_group, invoice.sisa_bayar AS total_sisa_bayar, invoice.tgl_inv, invoice.total_inv AS total_invoice, SUM(pembayaran.total_bayar) AS total_bayar
                FROM invoice JOIN profile ON invoice.cust_id=profile.cust_id
                JOIN m_group ON profile.group_cust=m_group.Id JOIN pembayaran ON invoice.id=pembayaran.id_inv
                GROUP BY invoice.cust_id
                ORDER BY invoice.id";
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
                <h2><b>LAPORAN PIUTANG</b></h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card-box table-responsive">
                      <div class="row">
                        <div class="col-md-2">
                      <form method="post" action="">
                        <input type="text" name="keyword" class="form-control" placeholder="Cari.." value="<?php echo $_POST['keyword']; ?>">
                        </div>
                        <div class="col-md-3">
                          <div class='input-group date' id='myDatepicker3'>
                          <input type="text" name="tgl_awal" class="form-control" value="<?php echo $_POST['tgl_awal']; ?>" placeholder="tanggal awal">
                          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                          </span>
                      </div>
                        </div>
                        <div class="col-md-3">
                          <div class='input-group date' id='myDatepicker1'>
                          <input type="text" name="tgl_akhir" class="form-control" value="<?php echo $_POST['tgl_akhir']; ?>" placeholder="tanggal akhir">
                          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                          </span>
                          <span class="input-group-btn">
                          <button class="btn btn-primary" name="caritanggal" type="submit">Cari
                          </span>
                      </button>
                      </div>
                        </div>
                        </form>
                        <div class="col-md-3">
                        <form action="laporan/exel_laporan_hutang" method="post">
                        <input type="hidden" name="sql" value="<?php echo $sql ?>" >
                          <span class="input-group-btn">
                          <button class="btn btn-success" type="submit">Download
                          </span>
                      </button>
                    <a href="grid_total_hutang" class="btn btn-sm btn-info">Refresh<i class="fa fa-refresh"></i></a>
                    </form>
                        </div>
                      </div>
                      <table id="datatable-keytable" class="table table-striped table-bordered jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">No </th>
                            <th class="column-title">No Inv</th>
                            <th class="column-title">Cust_id</th>
                            <th class="column-title">Nama Customer</th>
                            <th class="column-title">Group</th>
                            <th class="column-title">Tanggal Invoice</th>
                            <th class="column-title">Total Invoice</th>
                            <th class="column-title">Total Piutang</th>
                            <th class="column-title">Total Bayar</th>
                          </th>
                          </tr>
                        </thead>
                        <?php
                        while(($count<$rpp) && ($i<$tcount)) {
                        mysqli_data_seek($result,$i);
                        $data = mysqli_fetch_array($result);
                        ?>
                        <tbody>
                          <td class=" ">
                            <?php echo ++$no_urut; ?>
                          </td>
                          <td><?php echo $data['no_inv']; ?></td>
                          <td><?php echo $data['cust_id']; ?></td>
                          <td><?php echo $data['nama_customer']; ?></td>
                          <td><?php echo $data['nama_group']; ?></td>
                          <td><?php echo $data['tgl_inv']; ?></td>
                          <td><?php echo number_format($data['total_invoice'], 0, ".","."); ?></td>
                          <td><?php echo number_format($data['total_sisa_bayar'], 0, ".","."); ?></td>
                          <td><?php echo number_format($data['total_bayar'], 0, ".","."); ?></td>
                        </tr>
                          <?php  
                          $totalinvoice += $data['total_invoice'];
                          $totalsisabayar += $data['total_sisa_bayar'];
                          $totalbayar += $data['total_bayar'];
                            $i++; 
                           $count++;
                            }
                            ?>
                        <td colspan="2">Grand Total</td>
                        <td colspan="4"></td>
                        <td colspan="1">Rp. <?php echo number_format($totalinvoice,0,".","."); ?></td>
                        <td colspan="1">Rp. <?php echo number_format($totalsisabayar,0,".","."); ?></td>
                        <td colspan="1">Rp. <?php echo number_format($totalbayar,0,".","."); ?></td>
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
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script>
    $('#myDatepicker1').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#myDatepicker2').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#myDatepicker3').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#myDatepicker4').datetimepicker({
        format: 'YYYY-MM-DD'
    });
</script>
<script>
$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});
</script>
  <?php
    include "layout/js_bottom.php";
 ?>