
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
                    <h2>INPUT USER</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                <?php
                $carikode = mysqli_query($connect, "SELECT id_user from user") or die (mysqli_error());
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
                $kode_otomatis = "id".str_pad($kode, 10, "0", STR_PAD_LEFT);
              } else {
                $kode_otomatis = "id0000000001";
              }
                ?>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <?php
                  if($_GET['id']){
                    $query=mysqli_query($connect,"SELECT * FROM user WHERE Id='$_GET[id]'");
                    $data=mysqli_fetch_array($query);
                  ?>
                  <div class="x_content">
                    <!-- start form for validation -->
                    <form action="fungsi/edit_user" method="post" data-parsley-validate>
                     <div class="row">
                       <div class="col-md-6">
                         <label for="">Username *</label>
                         <input type="text" name="username" value="<?php echo $data['username']; ?>" class="form-control" placeholder="Username" require>
                         <input type="hidden" name="Id" value="<?php echo $data['Id']; ?>">
                         <label for="">Password *</label>
                         <input type="password" name="password" value="<?php echo $data['password']; ?>" class="form-control" placeholder="Password" require>
                       </div>
                       <div class="col-md-6">
                      <label for="">Hak Level</label>
                       <select class="select2_single form-control" name="hak_level" tabindex="-1">
                            <option value="<?php echo $data['hak_level']; ?>"><?php echo $data['hak_level']; ?></option>
                            <option value="admin">Admin</option>
                            <option value="admin4">admin4</option>
                            <option value="admin2">Admin2</option>
                            <option value="admin3">Admin3</option>
                            <option value="user">User</option>
                          </select>
                          <label for="">Id User *</label>
                      <input type="text" name="id_user" class="form-control" value="<?php echo $data['id_user']; ?>" placeholder="Id User" readonly require>
                       </div>
                     </div>
                          <br/>
                         <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-8">
                          <a href="grid_user"><span class="btn btn-primary">Kembali</span></a>
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
                    <form action="fungsi/save_user" method="post" data-parsley-validate>
                     <div class="row">
                       <div class="col-md-6">
                         <label for="">Username *</label>
                         <input type="text" name="username" class="form-control" placeholder="Username" require>
                         <input type="hidden" name="Id" value="<?php echo($hasil_2); ?>">
                         <label for="">Password *</label>
                         <input type="password" name="password" class="form-control" placeholder="Password" require>
                       </div>
                       <div class="col-md-6">
                      <label for="">Hak Level</label>
                       <select class="select2_single form-control" name="hak_level" tabindex="-1">
                            <option value="">--pilih--</option>
                            <option value="admin">Admin</option>
                            <option value="admin4">Admin4</option>
                            <option value="admin2">Admin2</option>
                            <option value="admin3">Admin3</option>
                            <option value="user">User</option>
                          </select>
                          <label for="">Id User *</label>
                      <input type="text" name="id_user" class="form-control" value="<?php echo $kode_otomatis; ?>" placeholder="Id User" readonly require>
                       </div>
                     </div>
                          <br/>
                         <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-8">
                          <a href="grid_user"><span class="btn btn-primary">Kembali</span></a>
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
<?php
    include "layout/js_bottom.php";
 ?>
 
