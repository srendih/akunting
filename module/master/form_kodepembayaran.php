
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
        <?php
        $carikode = mysqli_query($connect, "SELECT id from kode_pembayaran") or die (mysqli_error());
        // menjadikannya array
        $datakode = mysqli_fetch_array($carikode);
        $jumlah_data = mysqli_num_rows($carikode);
        // jika $datakode
        if ($datakode) {
        // membuat variabel baru untuk mengambil kode barang mulai dari 1
        $nilaikode = substr($jumlah_data[0], 1);
        // menjadikan $nilaikode ( int )
        $kode = (int) $nilaikode;
        // setiap $kode di tambah 1
        $kode = $jumlah_data + 1;
        // hasil untuk menambahkan kode 
        // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
        // atau angka sebelum $kode
        $kode_otomatis = "kd".str_pad($kode, 10, "0", STR_PAD_LEFT);
        } else {
        $kode_otomatis = "kd0000000001";
        }
        ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <!-- form enntry -->
          <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="x_panel">
                  <div class="x_title">
                    <h2>FORM INVOICE</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <?php
                    $querys=mysqli_query($connect,"SELECT * FROM kode_pembayaran WHERE id='$_GET[id]'");
                    $result=mysqli_fetch_array($querys);
                    $q=mysqli_query($connect,"SELECT * FROM invoice WHERE id='$result[id_inv]'");
                    $tampil_inv=mysqli_fetch_array($q);
                    $qprofile=mysqli_query($connect,"SELECT * FROM profile WHERE cust_id='$tampil_inv[cust_id]'");
                    $tampil_profil=mysqli_fetch_array($qprofile);
                    $qgroup=mysqli_query($connect,"SELECT * FROM m_group WHERE Id='$tampil_profil[group_cust]'");
                    $tampil_group=mysqli_fetch_array($qgroup);
                  ?>
                  <div class="x_content">
                    <!-- start form for validation -->
                    <div class="row">
                    <div class="col-md-6">
                    <form data-parsley-validate>
                    <label for="">Kode Pembayaran *</label>
                    <input type="text" name="kode_bayar" class="form-control" value="<?php echo $result['kode_bayar']; ?>" required readonly>
                    <label for="">No Invoice</label>
                    <input type="text" name="no_inv" value="<?php echo $tampil_inv['no_inv']; ?>" class="form-control" placeholder="Nomer Invoice"  readonly>
                    <label for="">Nama Customer</label>
                    <input type="text" name="nm_cust" value="<?php echo $tampil_profil['nama_customer']; ?>" class="form-control" placeholder="Nama Customer"  readonly>
                    <label for="">Proyek </label>
                    <input type="text" name="proyek" value="<?php echo $tampil_inv['proyek']; ?>" class="form-control" readonly placeholder="Nama Proyek">
                    <input type="hidden" name="Id" value="<?php echo $result['id']; ?>">
    </div>
                    <div class="col-md-6">
                    <label for="">Cust Id</label>
                    <input type="text" name="cust_id" value="<?php echo $tampil_inv['cust_id']; ?>" class="form-control" readonly placeholder="Cust Id" required>
                    <label for="">Nama Group</label>
                    <input type="text" name="nm_group" value="<?php echo $tampil_group['nama_group']; ?>" class="form-control" readonly placeholder="Nama Group" required>
                    <label for="">Tagihan Invoice *</label>
                    <input type="text" name="tgh_inv" value="<?php echo number_format($tampil_inv['total_inv'],0, ".","."); ?>" readonly class="form-control" placeholder="Tagihan Invoice">
                    <label for="">Status *</label>
                    <input type="text" name="status" value="<?php echo $result['nama_status']; ?>" readonly class="form-control" placeholder="Status">
                </div>
                   
                    </div>
                     </div>
                          <br/>
                         <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-10 col-md-offset-10">
                          <a href="grid_kode_pembayaran"><span class="btn btn-primary">Kembali</span></a>
                        </div>
                      </div>

                    </form>
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
    
    <script type="text/javascript">
     $(function () {
        $("#kode").change(function () {
            if ($(this).val() == "PPN") {
                $("#ppnK").show();
            }
            if ($(this).val() == "NON PPN") {
                $("#ppnK").hide();
            }
            if ($(this).val() == "") {
                $("#ppnK").hide();
            }
        });
    });

    </script>
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
<script type="text/javascript">    
  <?php echo $jsArray; ?>  
  function changeValue(id_cust){  
  document.getElementById('nm_cust').value = dtCust[id_cust].nama_cust;  
  document.getElementById('nm_group').value = dtCust[id_cust].nama_group;  
  document.getElementById('termin').value = dtCust[id_cust].termin;  
  };  
  </script>
  <script type="text/javascript">  
  <?php echo $jsValue; ?>  
  function changeValuePPN(kode){  
  document.getElementById('ppn').value = dtPPN[kode].valueppn;  
  };  
  </script>
<?php
    include "layout/js_bottom.php";
 ?>
 
