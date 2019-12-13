
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
                    <h2>INPUT STATUS</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <?php
                  if($_GET['id']){
                    $query=mysqli_query($connect,"SELECT * FROM status WHERE Id_status='$_GET[id]'");
                    $data=mysqli_fetch_array($query);
                    $typestatus = $data['type_status'];
                    if($typestatus == 1){
                      $tmpilstatus = "Status System";
                      
                    }else{
                      $tmpilstatus = "Status Transaksi";
                    }
                  ?>
                  <div class="x_content">
                    <!-- start form for validation -->
                    <form action="fungsi/edit_status" method="post" data-parsley-validate>
                     <div class="row">
                       <div class="col-md-6">
                         <label for="">Nama Status *</label>
                         <input type="text" value="<?php echo $data['nama_status']; ?>" name="nm_status" class="form-control" placeholder="Nama Status" require>
                         <input type="hidden" name="Id" value="<?php echo $data['Id_status']; ?>">
                       </div>
                       <div class="col-md-6">
                       <div class="row">
                       <div class="col-md-6">
                       <label>Warna</label>
                       <div id="cp2" class="input-group colorpicker-component">
                        <input type="text" name="warna" value="#00AABB" class="form-control" />
                        <span class="input-group-addon"><i></i></span>
                    </div>
                       </div>
                       <div class="col-md-6">
                       <label>Type Status</label>
                        <select name="type_status" class="form-control" required>
                        <option value="<?php echo $data['type_status']; ?>"><?php echo $tmpilstatus; ?></option>
                        <option value="1">Status System</option>
                        <option value="2">Status Transaksi</option>
                        </select>
                       </div>
                       </div>
                       </div>
                     </div>
                          <br/>
                         <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-8">
                          <a href="grid_status"><span class="btn btn-primary">Kembali</span></a>
                        <button class="btn btn-primary" type="reset">Batal</button>
                          <button type="submit" class="btn btn-success">SIMPAN</button>
                        </div>
                      </div>

                    </form>
                    <!-- end form for validations -->
                  </div>

                  <?php }else{
                   ?>
                  <div class="x_content">
                    <!-- start form for validation -->
                    <form action="fungsi/save_status" method="post" data-parsley-validate>
                     <div class="row">
                       <div class="col-md-6">
                         <label for="">Nama Status *</label>
                         <input type="text" name="nm_status" class="form-control" placeholder="Nama Status" require>
                         <input type="hidden" name="Id" value="<?php echo($hasil_2); ?>">
                       </div>
                       <div class="col-md-6">
                       <div class="row">
                       <div class="col-md-6">
                       <label>Warna</label>
                        <div id="cp2" class="input-group colorpicker-component">
                            <input type="text" name="warna" value="#00AABB" class="form-control" />
                            <span class="input-group-addon"><i></i></span>
                        </div>
                       </div>
                       <div class="col-md-6">
                          <label>Type Status</label>
                        <select name="type_status" class="form-control" required>
                        <option value="">--pilih--</option>
                        <option value="1">Status System</option>
                        <option value="2">Status Transaksi</option>
                        </select>
                          </div>
                       </div>
                      </div>
                     </div>
                          <br/>
                         <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-8">
                          <a href="grid_status"><span class="btn btn-primary">Kembali</span></a>
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
    <script>
        $(function() {
            $('#cp1').colorpicker();
        });

        $(function() {
            $('#cp2').colorpicker();
        });
    </script>   
<?php
    include "layout/js_bottom.php";
 ?>
 
