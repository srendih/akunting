
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
                      if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']<>""){
                          $keyword=$_REQUEST['keyword'];
                          $query=mysqli_query($connect,"SELECT * FROM profile WHERE cust_id LIKE '%$keyword%'");
                            $data=mysqli_fetch_array($query);
                            $qmgroup=mysqli_query($connect,"SELECT * FROM m_group WHERE Id='$data[group_cust]'");
                            $tmplgroup=mysqli_fetch_array($qmgroup);
                            $qinvoice=mysqli_query($connect,"SELECT * FROM invoice WHERE cust_id='$data[cust_id]'");
                            $tminvoice=mysqli_fetch_array($qinvoice);
                      }
                    ?>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <?php
                  if($_GET['id']){
                    $querys=mysqli_query($connect,"SELECT * FROM invoice WHERE id='$_GET[id]'");
                    $result=mysqli_fetch_array($querys);
                    $q=mysqli_query($connect,"SELECT * FROM user WHERE id_user='$result[id_user]'");
                    $result1=mysqli_fetch_array($q);
                    $qstatus=mysqli_query($connect,"SELECT * FROM status WHERE Id_status='$result[Id_status]'");
                    $tmpilstatus=mysqli_fetch_array($qstatus);
                    $qprofil=mysqli_query($connect,"SELECT * FROM profile WHERE cust_id='$result[cust_id]'");
                    $resultprofil=mysqli_fetch_array($qprofil);
                    $qe=mysqli_query($connect,"SELECT * FROM m_group WHERE Id='$resultprofil[group_cust]'");
                    $datagroup=mysqli_fetch_array($qe);
                    $querisales = mysqli_query($connect, "SELECT * FROM user_sales WHERE id ='$result[id_sales]'");
                    $tmpilsales = mysqli_fetch_array($querisales);
                  ?>
                  <div class="x_content">
                    <!-- start form for validation -->
                    <div class="row">
                    <div class="col-md-6">
                    <form action="fungsi/edit_invoice" method="post" data-parsley-validate>
                    <label for="">Cust Id *</label>
                    <select name="id_cust" id="id_cust" class="selectpicker form-control" data-live-search="true" onchange="changeValue(this.value)" required>
                    <option value="<?php echo $result['cust_id']; ?>"><?php echo $result['cust_id']; ?></option>
                    <?php
                    $queri = mysqli_query($connect, "SELECT * FROM profile ORDER BY Id_profil");
                    $jsArray="var dtCust = new Array();\n";
                    while($row=mysqli_fetch_array($queri)){
                      $querigroup = mysqli_query($connect,"SELECT * FROM m_group WHERE Id='$row[group_cust]'");
                      $tmpil = mysqli_fetch_array($querigroup);
                      echo '<option value="' . $row['cust_id'] . '">' . $row['cust_id'] . '</option>';
                    $jsArray .= "dtCust['" . $row['cust_id'] . "'] = {nama_cust:'".addslashes($row['nama_customer'])."'
                      ,nama_group:'".addslashes($tmpil['nama_group'])."',termin:'".addslashes($row['termin'])."'};\n";  
                    }
                    ?>
                    </select>
                    <label for="">Nama Customer</label>
                    <input type="text" name="nm_cust" id="nm_cust" value="<?php echo $resultprofil['nama_customer']; ?>" class="form-control" placeholder="Nama Customer" readonly>
                    <label for="">Nama Group</label>
                    <input type="text" name="nm_group" id="nm_group" value="<?php echo $datagroup['nama_group']; ?>" class="form-control" placeholder="Nama Customer"  readonly>
                    <input type="hidden" name="ket" value="<?php echo $result['ket']; ?>">
                    <label for="">Proyek </label>
                    <input type="text" name="proyek" value="<?php echo $result['proyek']; ?>" class="form-control" placeholder="Nama Proyek" required>
                    <input type="text" name="Id" value="<?php echo $result['id']; ?>">
                    <div class="row">
                    <div class="col-md-6">
                    <label for="">Kode</label>
                    <select name="kode" id="kode" class="form-control" onchange="changeValuePPN(this.value)" required>
                    <option value="<?php echo $result['kode']; ?>"><?php echo $result['kode']; ?></option>
                    <option value="PPN">PPN</option>
                    <option value="NON PPN">NON PPN</option>
                    <?php 
                    $jsValue="var dtPPN = new Array();\n";
                    $jsValue .= "dtPPN['" . 'NON PPN' . "'] = {valueppn:'".addslashes('0')."'};\n";  
                     ?>
                    </select>
                    </div>
                    <div id="ppnK" class="col-md-6" >
                    <label for="">PPN *</label>
                    <input type="number" name="ppn" id="ppn" value="<?php echo $result['nilai_ppn']; ?>" class="form-control" placeholder="PPN" onkeyup="sum();" required>
                    </div>
                    <div class="col-md-6">
                <label for="">tgl Tanda Terima</label>
                <div class='input-group date' id='myDatepicker2'>
                <input type='text' name="tgl_terima" value="<?php echo $result['tgl_terima']; ?>" class="form-control" />
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
                        <input type="text" name="no" id="no" value="<?php echo $result['no']; ?>" class="form-control" placeholder="No" onkeyup="gabungan();" required>
                        </div>
                        <div class="col-md-6">
                        <label for="">No Invoice *</label>
                       <input type="text" name="no_inv" id="no_inv" value="<?php echo $result['no_inv']; ?>" class="form-control" placeholder="No Invoice" required readonly>
                        </div>
                      </div>
                    <label for="">Status *</label>
                    <select name="status" class="form-control" required>
                    <option value="<?php echo $result['Id_status']; ?>"><?php echo $tmpilstatus['nama_status']; ?></option>
                    <?php
                    $queri = mysqli_query($connect,"SELECT * FROM status WHERE type_status = 2 ORDER BY Id_status");
                    while($row=mysqli_fetch_array($queri)){
                    echo '<option value="' . $row['Id_status'] . '">' . $row['nama_status'] . '</option>';
                    }
                    ?>
                    </select>
                    <div class="row">
                      <div class="col-md-6">
                      <label for="">Nominal Invoice *</label>
                    <input type="number" name="nominal_inv" id="nominal_inv" value="<?php echo $result['nominal_inv']; ?>" class="form-control" placeholder="Nominal Invoice" onkeyup="sum();" required>
                    <label for="">Sales</label>
                    <select name="sales_id" class="form-control" required>
                      <option value="<?php echo $result['id_sales']; ?>"><?php echo $tmpilsales['nm_sales']; ?></option>
                      <?php
                      $queri = mysqli_query($connect,"SELECT * FROM user_sales ORDER BY id");
                      while($row=mysqli_fetch_array($queri)){
                      echo '<option value="' . $row['id'] . '">' . $row['nm_sales'] . '</option>';
                      }
                      
                      ?>
                      </select>
                      </div>
                      <div class="col-md-6">
                      <label for="">Transport *</label>
                    <input type="number" name="transport" id="transport" value="<?php echo $result['transport']; ?>" class="form-control" placeholder="Transport" onkeyup="sum();" required>
                    <label for="">Total Invoice</label>
                    <input type="number" name="total_inv" id="total_inv" value="<?php echo $result['total_inv']; ?>" class="form-control" placeholder="Total Invoice" readonly onkeyup="sum();">
                    <input type="hidden" name="bayar_inv" id="bayar_inv" value="0" class="form-control" placeholder="Bayar" onkeyup="sum();">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                      <label for="">tgl Inv</label>
                    <div class='input-group date' id='myDatepicker3'>
                    <input type='text' name="tgl_inv" value="<?php echo $result['tgl_inv']; ?>" class="form-control"required />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
              </div>
              <div class="col-md-6">
              <label for="">Termin</label>
              <input type="text" name="termin" id="termin" value="<?php echo $resultprofil['termin']; ?>" class="form-control" placeholder="Termin" readonly>
              </div>
                   
                    </div>
                     </div>
                     </div>
                          <br/>
                         <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-8">
                          <a href="grid_invoice"><span class="btn btn-primary">Kembali</span></a>
                        <button class="btn btn-primary" type="reset">Batal</button>
                          <button type="submit" class="btn btn-success">SIMPAN</button>
                        </div>
                      </div>

                    </form>
                  </div>

                  <?php }else{
                   ?>
                  <div class="x_content">
                    <!-- start form for validation -->
                    <div class="row">
                    <div class="col-md-6">
                    <form action="fungsi/save_invoice" method="post" data-parsley-validate>
                    <label for="">Cust Id *</label>
                    <select name="id_cust" id="id_cust" multiple class="selectpicker form-control"  data-live-search="true" title="Pilih ID CUST" onchange="changeValue(this.value)" required>
                    
                    <?php
                    $queri = mysqli_query($connect, "SELECT * FROM profile ORDER BY Id_profil");
                    $jsArray="var dtCust = new Array();\n";
                    while($row=mysqli_fetch_array($queri)){
                      $querigroup = mysqli_query($connect,"SELECT * FROM m_group WHERE Id='$row[group_cust]'");
                      $tmpil = mysqli_fetch_array($querigroup);
                      echo '<option value="' . $row['cust_id'] . '">' . $row['cust_id'] . '</option>';
                    $jsArray .= "dtCust['" . $row['cust_id'] . "'] = {nama_cust:'".addslashes($row['nama_customer'])."'
                      ,nama_group:'".addslashes($tmpil['nama_group'])."',termin:'".addslashes($row['termin'])."'};\n";  
                    }
                    ?>
                    </select>
                    <label for="">Nama Customer</label>
                    <input type="text" name="nm_cust" id="nm_cust" value="<?php echo $resultprofil['nama_customer']; ?>" class="form-control" placeholder="Nama Customer"  readonly>
                    <label for="">Nama Group</label>
                    <input type="text" name="nm_group" id="nm_group" value="<?php echo $datagroup['nama_group']; ?>" class="form-control" placeholder="Nama Customer"  readonly>
                    <label for="">Proyek </label>
                    <input type="text" name="proyek" value="<?php echo $data['proyek']; ?>" class="form-control" placeholder="Nama Proyek" required>
                    <input type="hidden" name="Id" value="<?php echo($hasil_2); ?>">
                   
                    <div class="row">
                    <div class="col-md-6">
                    <label for="">Kode</label>
                    <select name="kode" id="kode" class="form-control" required>
                    <option value="">--pilih Kode--</option>
                    <option value="PPN">PPN</option>
                    <option value="NON PPN">NON PPN</option>
                    </select>
                    </div>
                    <div id="ppnK" class="col-md-6" >
                    <label for="">PPN *</label>
                    <input type="number" name="ppn" id="ppn" value="0" class="form-control" placeholder="PPN" onkeyup="sum();" required>
                    </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-6">
                        <label for="">No *</label>
                        <input type="text" name="no" id="no" class="form-control" placeholder="No" onkeyup="gabungan();" required>
                        </div>
                        <div class="col-md-6">
                        <label for="">No Invoice *</label>
                       <input type="text" name="no_inv" id="no_inv" class="form-control" placeholder="No Invoice" readonly required>
                        </div>
                      </div>
                    <label for="">Status *</label>
                    <select name="status" class="form-control" required>
                    <option value="">--pilih status--</option>
                    <?php
                    $queri = mysqli_query($connect,"SELECT * FROM status WHERE type_status = 2 ORDER BY Id_status");
                    while($row=mysqli_fetch_array($queri)){
                    echo '<option value="' . $row['Id_status'] . '">' . $row['nama_status'] . '</option>';
                    }
                    ?>
                    </select>
                    <div class="row">
                      <div class="col-md-6">
                      <label for="">Nominal Invoice *</label>
                    <input type="number" name="nominal_inv" id="nominal_inv" value="0" class="form-control" placeholder="Nominal Invoice" onkeyup="sum();" required>
                    <label for="">Sales</label>
                    <select name="sales_id" class="form-control" required>
                      <option value="">--pilih Sales--</option>
                      <?php
                      $queri = mysqli_query($connect,"SELECT * FROM user_sales ORDER BY id");
                      while($row=mysqli_fetch_array($queri)){
                      echo '<option value="' . $row['id'] . '">' . $row['nm_sales'] . '</option>';
                      }
                      
                      ?>
                      </select>
                      </div>
                      <div class="col-md-6">
                      <label for="">Transport *</label>
                    <input type="number" name="transport" id="transport" value="0" class="form-control" placeholder="Transport" onkeyup="sum();" required>
                    <label for="">Total Invoice</label>
                    <input type="number" name="total_inv" id="total_inv" value="0" class="form-control" placeholder="Total Invoice" readonly onkeyup="sum();">

                      </div>
                    </div>
                    <input type="hidden" name="bayar_inv" id="bayar_inv" value="0" class="form-control" placeholder="Bayar" onkeyup="sum();">
                    <!-- <label for="">Sisa Bayar</label>
                    <input type="text" name="sisa_bayar"  id="sisa_bayar" value="0" class="form-control" placeholder="Sisa Bayar" readonly onkeyup="sum();">    -->
                    <div class="row">
                      <div class="col-md-6">
                      <label for="">tgl Inv</label>
                    <div class='input-group date' id='myDatepicker3'>
                    <input type='text' name="tgl_inv" class="form-control" required />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
              </div>
              <div class="col-md-6">
              <label for="">Termin</label>
              <input type="text" name="termin" id="termin" class="form-control" placeholder="Termin"  readonly>
              </div>
                    </div>
                
                     </div>
                     </div>
                          <br/>
                         <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-8">
                          <a href="grid_invoice"><span class="btn btn-primary">Kembali</span></a>
                        <button class="btn btn-primary" type="reset">Batal</button>
                          <button type="submit" class="btn btn-success">SIMPAN</button>
                        </div>
                      </div>

                    </form>
                    <!-- end form for validations -->

                  </div>
                  <?php }?>

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
        // $("#ppnK").hide();
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
  <!-- <script type="text/javascript">
    <?php echo $jsArrayAwal; ?>  
  function changeValue(cust_id){  
  document.getElementById('nama_custp').values = dtCustAwl[cust_id].nama_custp;  
  document.getElementById('nm_group1').values = dtCustAwl[cust_id].nama_groupp;  
  };  
  </script> -->
<?php
    include "layout/js_bottom.php";
 ?>
 
