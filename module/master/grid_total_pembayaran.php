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
          $qgrandtotal = mysqli_query($connect, "SELECT SUM(total_bayar) AS total FROM pembayaran ORDER BY Id");
          $tgrandtotal = mysqli_fetch_array($qgrandtotal);
          
            if(isset($_POST['cari'])){

              if(empty($_POST['id_cust'])) {
                $idinv = $_POST['idinv'];
                $reload = "grid_total_pembayaran?pagination=true&keyword=$keyword";
                $sql =  "SELECT invoice.no_inv, invoice.cust_id, pembayaran.bayar, pembayaran.diskon_pph, pembayaran.pph_wapu, pembayaran.total_bayar, pembayaran.tgl_bayar, m_group.nama_group, profile.cust_id, profile.nama_customer
                FROM pembayaran JOIN invoice ON pembayaran.id_inv=invoice.id
                JOIN profile ON invoice.cust_id=profile.cust_id
                JOIN m_group ON profile.group_cust=m_group.Id
                WHERE profile.nama_customer='$idinv'
                 ORDER BY pembayaran.Id";

                $result = mysqli_query($connect,$sql);

              }
              if(empty($_POST['idinv'])) {
                $idcust = $_POST['id_cust'];
                $reload = "grid_total_pembayaran?pagination=true&keyword=$idcust";
                $sql =  "SELECT invoice.no_inv, invoice.cust_id, pembayaran.bayar, pembayaran.diskon_pph, pembayaran.pph_wapu, pembayaran.total_bayar, pembayaran.tgl_bayar, m_group.nama_group, profile.cust_id, profile.nama_customer
                FROM pembayaran JOIN invoice ON pembayaran.id_inv=invoice.id
                JOIN profile ON invoice.cust_id=profile.cust_id
                JOIN m_group ON profile.group_cust=m_group.Id
                WHERE invoice.cust_id ='$idcust'
                 ORDER BY pembayaran.Id";
                $result = mysqli_query($connect,$sql);

              }
              if(!empty($_POST['idinv'] && $_POST['id_cust'])) {
                $idcust = $_POST['id_cust'];
                $idinv = $_POST['idinv'];
                  $reload = "grid_total_pembayaran?pagination=true&keyword=$idcust";
                $sql =  "SELECT invoice.no_inv, invoice.cust_id, pembayaran.bayar, pembayaran.diskon_pph, pembayaran.pph_wapu, pembayaran.total_bayar, pembayaran.tgl_bayar, m_group.nama_group, profile.cust_id, profile.nama_customer
                FROM pembayaran JOIN invoice ON pembayaran.id_inv=invoice.id
                JOIN profile ON invoice.cust_id=profile.cust_id
                JOIN m_group ON profile.group_cust=m_group.Id
                WHERE invoice.cust_id ='$idcust' AND
                profile.nama_customer='$idinv'
                 ORDER BY pembayaran.Id";
                $result = mysqli_query($connect,$sql);
            }

          }
            else
            {
              $reload = "grid_total_pembayaran?pagination=$keyword";
                $sql =  "SELECT invoice.no_inv, invoice.cust_id, pembayaran.bayar, pembayaran.diskon_pph, pembayaran.pph_wapu, pembayaran.total_bayar, pembayaran.tgl_bayar, m_group.nama_group, profile.cust_id, profile.nama_customer
                FROM pembayaran JOIN invoice ON pembayaran.id_inv=invoice.id
                JOIN profile ON invoice.cust_id=profile.cust_id
                JOIN m_group ON profile.group_cust=m_group.Id
                 ORDER BY pembayaran.Id";
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
                <h2><b>LAPORAN TOTAL PEMBAYARAN</b></h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card-box table-responsive">
                      <div class="row">
                      <form method="post" action="">
                      <div class="col-md-3">
                      <div class='input-group'>
                      <select name="id_cust" class="selectpicker form-control" data-live-search="true" title="cari cust id">
                    <?php
                    $queri = mysqli_query($connect, "SELECT * FROM profile ORDER BY Id_profil");
                    while($row=mysqli_fetch_array($queri)){
                      echo '<option value="' . $row['cust_id'] . '">' . $row['cust_id'] . '</option>';
                    }
                    ?>
                    </select>
                          <span class="input-group-btn">
                          <button class="btn btn-primary" name="cari" type="submit">Cari
                      </button>
                    </span>
                      </div>
                        </div>
                        </form>
                      </div>
                      <table id="datatable-keytable" class="table table-striped table-bordered jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">No </th>
                            <th class="column-title">Nama Customer </th>
                            <th class="column-title">Cust Id </th>
                            <th class="column-title">Tanggal Bayar </th>
                            <th class="column-title">Bayar</th>
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
                          <td><?php echo $data['nama_customer']; ?></td>
                          <td><?php echo $data['cust_id']; ?></td>
                          <td><?php echo $data['tgl_bayar']; ?></td>
                          <td>Rp. <?php echo number_format($data['bayar'], 0, ".","."); ?></td>
                          </tr>
                          
                          <?php  
                          $totalbayar += $data['bayar'];
                          $totalpembayaran += $data['total_bayar'];
                          $totalpph += $data['diskon_pph'];
                          $totalwapu += $data['pph_wapu'];

                            $i++; 
                           $count++;
                            }
                            ?>
                        <td colspan="4">Grand Total</td>
                        <td colspan="1">Rp. <?php echo number_format($totalbayar,0,".","."); ?></td>
                        </tbody>
                        </table>
                        <div class='input-group'>
                        <form action="laporan/exel_total_pembayaran" method="post">
                        <input type="hidden" name="sql" value="<?php echo $sql ?>" >
                          <span class="input-group-btn">
                          <button class="btn btn-success" type="submit">Download
                          </span>
                      </button>
                    <a href="grid_total_pembayaran" class="btn btn-sm btn-info">Refresh<i class="fa fa-refresh"></i></a>
                    </form>
                    </div>
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