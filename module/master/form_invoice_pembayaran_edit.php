
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
                      <?php
                      // if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']<>""){
                      //     $keyword=$_REQUEST['keyword'];
                      //     $query=mysqli_query($connect,"SELECT * FROM profile WHERE cust_id LIKE '%$keyword%'");
                      //       $data=mysqli_fetch_array($query);
                      //       $qmgroup=mysqli_query($connect,"SELECT * FROM m_group WHERE Id='$data[group_cust]'");
                      //       $tmplgroup=mysqli_fetch_array($qmgroup);
                      //       $qinvoice=mysqli_query($connect,"SELECT * FROM invoice WHERE cust_id='$data[cust_id]'");
                      //       $tminvoice=mysqli_fetch_array($qinvoice);
                      // }
                    ?>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <?php
                  $qpembayaran=mysqli_query($connect,"SELECT * FROM pembayaran WHERE Id='$_GET[idpembayaran]'");
                    $tmpilpembyaran=mysqli_fetch_array($qpembayaran);
                    $querys=mysqli_query($connect,"SELECT * FROM invoice WHERE id='$tmpilpembyaran[id_inv]'");
                    $result=mysqli_fetch_array($querys);
                    $q=mysqli_query($connect,"SELECT * FROM user WHERE id_user='$result[id_user]'");
                    $result1=mysqli_fetch_array($q);
                    $qstatus=mysqli_query($connect,"SELECT * FROM status WHERE Id_status='$result[Id_status]'");
                    $tmpilstatus=mysqli_fetch_array($qstatus);
                    $qkode=mysqli_query($connect,"SELECT * FROM kode_pembayaran WHERE id_inv='$result[id]'");
                    $tmpilkode=mysqli_fetch_array($qkode);
                    $qprofil=mysqli_query($connect,"SELECT * FROM profile WHERE cust_id='$result[cust_id]'");
                    $resultprofil=mysqli_fetch_array($qprofil);
                    $qe=mysqli_query($connect,"SELECT * FROM m_group WHERE Id='$resultprofil[group_cust]'");
                    $datagroup=mysqli_fetch_array($qe);
                    
                  ?>
                  <div class="x_content">
                    <!-- start form for validation -->
                    <div class="row">
                    <div class="col-md-6">
                    <form action="fungsi/edit_invoicepembayaran" method="post" data-parsley-validate>
                    <label for="">Cust Id *</label>
                    <input type="text" name="id_cust" class="form-control" value="<?php echo $result['cust_id']; ?>" required readonly>
                    <label for="">Nama Customer</label>
                    <input type="text" name="nm_cust" id="nm_cust" value="<?php echo $resultprofil['nama_customer']; ?>" class="form-control" placeholder="Nama Customer"  readonly>
                    <label for="">Nama Group</label>
                    <input type="text" name="nm_group" id="nm_group" value="<?php echo $datagroup['nama_group']; ?>" class="form-control" placeholder="Nama Customer"  readonly>
                    <label for="">Proyek </label>
                    <input type="text" name="proyek" value="<?php echo $result['proyek']; ?>" class="form-control" readonly placeholder="Nama Proyek">
                    <input type="hidden" name="Id_inv" value="<?php echo $result['id']; ?>">
                    <input type="hidden" name="nama_status" value="Sudah Dibayar">
                    <div class="row">
                    <div class="col-md-6">
                    <label for="">Kode</label>
                    <input type="text" name="kode" id="kode" value="<?php echo $result['kode']; ?>" class="form-control" readonly placeholder="Nama Proyek" required>
                    <label for="">Bayar</label>
                      <input type="number" name="bayar_inv" id="bayar_inv" value="<?php echo $tmpilpembyaran['bayar']; ?>" class="form-control" placeholder="Bayar" onkeyup="sum();">
                      <input type="hidden" name="bayar_inv1" id="bayar_inv1" value="<?php echo $result['bayar_inv']; ?>" class="form-control">
                      <label for="">Diskon</label>
                      <input type="number" name="diskon_pph" id="diskon_pph" value="<?php echo $tmpilpembyaran['diskon_pph'] ?>"  class="form-control" placeholder="Diskon PPH" onkeyup="sum();"> 
                      <label for="">PPH</label>
                      <input type="number" name="pph" id="pph" value="<?php echo $tmpilpembyaran['pph']; ?>"  class="form-control" placeholder="PPH" onkeyup="sum();">                
                     </div>
                    <div id="ppnK" class="col-md-6" >
                    <label for="">PPN *</label>
                    <input type="text" name="ppn" id="ppn" value="<?php echo number_format($result['nilai_ppn'],0,".","."); ?>" readonly class="form-control" placeholder="PPN" onkeyup="sum();">
                    <label for="">Sisa Bayar</label>
                    <input type="text" name="sisa_bayar1" id="sisa_bayar1" value="<?php echo number_format($result['sisa_bayar'],0,".","."); ?>" class="form-control" placeholder="Sisa Bayar" readonly required> 
                    <input type="hidden" name="sisa_bayar" id="sisa_bayar" value="<?php echo $result['sisa_bayar']; ?>" class="form-control" readonly required>             
                    <label for="">tgl Pembayaran</label>
                    <div class='input-group date' id='myDatepicker2'>
                    <input type='text' name="tgl_bayar" class="form-control" value="<?php echo $tmpilpembyaran['tgl_bayar']; ?>" required />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-6">
                        <label for="">No *</label>
                        <input type="text" name="no" value="<?php echo $result['no']; ?>" readonly class="form-control" placeholder="Cust Id" required>
                        <label for="">Status *</label>
                    <input type="text" class="form-control" name="status" value="<?php echo $tmpilstatus['nama_status']; ?>" readonly>
                    <label for="">Nominal Invoice *</label>
                    <input type="text" name="nominal_inv" readonly id="nominal_inv" value="<?php echo number_format($result['nominal_inv'],0,".","."); ?>" class="form-control" placeholder="Nominal Invoice" onkeyup="sum();">
                    <label for="">Total Invoice</label>
                    <input type="hidden" name="total_inv" id="total_inv" value="<?php echo number_format($result['total_inv'],0,".","."); ?>" class="form-control" readonly>
                    <input type="text" name="tt_inv" value="<?php echo number_format($result['total_inv'],0,".","."); ?>" class="form-control" readonly>
                        </div>
                        <div class="col-md-6">
                        <label for="">No Invoice *</label>
                       <input type="text" name="no_inv" value="<?php echo $result['no_inv']; ?>" readonly class="form-control" placeholder="No Invoice" require>
                       <label for="">Termin</label>
                        <input type="text" name="termin" id="termin" value="<?php echo $resultprofil['termin']; ?>" class="form-control" placeholder="Termin"  readonly>
                        <label for="">Transport *</label>
                    <input type="number" name="transport" readonly id="transport" value="<?php echo number_format($result['transport'],0,".","."); ?>" class="form-control" placeholder="Transport" onkeyup="sum();">
                    <label for="">Total Pembayaran</label>
                    <input type="number" name="total_bayar" id="total_bayar" value="<?php echo $tmpilpembyaran['total_bayar']; ?>"  class="form-control" placeholder="Total Bayar" onkeyup="sum();" readonly>  
                    <input type="hidden" name="total_bayar1" value="<?php echo $tmpilpembyaran['total_bayar']; ?>"  class="form-control" readonly>  
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                      <label for="">tgl Inv</label>
                    <input type='text' name="tgl_inv" value="<?php echo $result['tgl_inv']; ?>" class="form-control" readonly />
                <label for="">tgl Tempo</label>
                <input type='text' name="tgl_tempo" value="<?php echo $result['tgl_tempo']; ?>" class="form-control" readonly/>
                <label for="">Pph Wapu</label>
                <input type="number" name="pph_wapu" id="pph_wapu" value="<?php echo $tmpilpembyaran['pph_wapu']; ?>" class="form-control" placeholder="PPH Wapu" onkeyup="sum();">
                <input type="hidden" name="idpembayaran" value="<?php echo $tmpilpembyaran['Id']; ?>" class="form-control">
              </div>
              <div class="col-md-6">
                <label for="">tgl Tanda Terima</label>
                <input type='text' name="tgl_terima" value="<?php echo $result['tgl_terima']; ?>" class="form-control" readonly />
                <input type="hidden" name="id_bayar" value="<?php echo $hasil_2; ?>">
                <label for="">Kode Bayar</label>
                <input type='text' name="kode_pembayaran" value="<?php echo $tmpilkode['kode_bayar']; ?>" class="form-control" readonly/>
                <label for="">Cara Bayar</label>
                <input type='text' name="cara_bayar" value="<?php echo $tmpilpembyaran['cara_bayar']; ?>" class="form-control" required />
                
                </div>
              </div>
                     </div>
                     </div>
                          <br/>
                         <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-8">
                          <a href="grid_edit_invoice_pembayaran"><span class="btn btn-primary">Kembali</span></a>
                        <button class="btn btn-primary" type="reset">Batal</button>
                          <button type="submit" class="btn btn-success">SIMPAN</button>
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
 
