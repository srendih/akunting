
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
                    <h2>INPUT PROFILE</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <?php
                      if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']<>""){
                          $keyword=$_REQUEST['keyword'];
                          $query=mysqli_query($connect,"SELECT * FROM user WHERE username LIKE '%$keyword%' OR id_user LIKE '%$keyword%'");
                            $data=mysqli_fetch_array($query);
                      }
                    ?>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <?php
                  $sessionusername = $_SESSION['username'];
                  if($_GET['id']){
                    $querys=mysqli_query($connect,"SELECT * FROM profile WHERE Id_profil='$_GET[id]'");
                    $result=mysqli_fetch_array($querys);
                    $q=mysqli_query($connect,"SELECT * FROM user WHERE id_user='$result[id_user]'");
                    $result1=mysqli_fetch_array($q);
                    $qe=mysqli_query($connect,"SELECT * FROM m_group WHERE Id='$result[group_cust]'");
                    $datagroup=mysqli_fetch_array($qe);
                    
                  ?>
                  <div class="x_content">
                    <!-- start form for validation -->
                    <div class="row">
                    <div class="col-md-6">
                    <form action="fungsi/edit_profil" method="post" data-parsley-validate>
                  <!--   <label for="">Username *</label>
                    <select name="username" class="form-control" onchange="changeValue(this.value)" >
                    <option value="<?php echo $result1['id_user']; ?>"><?php echo $result1['username']; ?></option>
                    <?php
                    $queri = mysqli_query($connect,"SELECT * FROM user ORDER BY Id");
                    while($row=mysqli_fetch_array($queri)){
                    echo '<option value="' . $row['id_user'] . '">' . $row['username'] . '</option>';
                }
                ?> </select>
                    <input type="hidden" name="Id" value="<?php echo $result1['id_user']; ?>" class="form-control"  required>
                  -->
                    <input type="hidden" name="Id_profil" value="<?php echo $result['Id_profil']; ?>">
                   <input type="hidden" name="username" value="<?php echo($sessionusername); ?>">
                   <label for="">Cust Id *</label>
                    <input type="text" name="cust_id"  value="<?php echo $result['cust_id']; ?>" class="form-control" placeholder="Cust Id" required>
                    <label for="">Nama Customer *</label>
                    <input type="text" name="nama_cust" class="form-control" value="<?php echo $result['nama_customer']; ?>" placeholder="Nama Customer" required>
                    <label for="">Alamat</label>
                      <textarea name="alamat" placeholder="Alamat" class="form-control" required><?php echo $result['alamat']; ?></textarea>
                       </div>
                       <div class="col-md-6">
                      <label for="">Group</label>
                      <select class="form-control" name="group" required>
                      <option value="<?php echo $datagroup['Id']; ?>"><?php echo $datagroup['nama_group']; ?></option>
                      <?php
                      $queri = mysqli_query($connect,"SELECT * FROM m_group ORDER BY Id");
                      while($row=mysqli_fetch_array($queri)){
                      echo '<option value="' . $row['Id'] . '">' . $row['nama_group'] . '</option>';
                      }
                      ?>
                    </select>
                      <div class="row">
                        <div class="col-md-6">
                        <label for="">No Telepon</label>
                      <input type="text" name="no_tlp" value="<?php echo $result['no_tlp'] ?>" class="form-control" placeholder="Nomer Telepon" required> 
                        </div>
                        <div class="col-md-6">
                        <label for="">Termin</label>
                      <input type="text" name="termin" class="form-control" value="<?php echo $result['termin'] ?>" placeholder="Termin" required> 
                        </div>
                      </div>
                       </div>
                     </div>
                          <br/>
                         <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-8">
                          <a href="grid_profil"><span class="btn btn-primary">Kembali</span></a>
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
                    <div class="row">
                    <div class="col-md-6">
                    <form action="fungsi/save_profil" method="post" data-parsley-validate>
                   <!--  <label for="">Username *</label>
                      <select name="username" class="form-control">
                    <option value="">--pilih--</option>
                    <?php
                    $queri = mysqli_query($connect,"SELECT * FROM user ORDER BY Id");
                    while($row=mysqli_fetch_array($queri)){
                    echo '<option value="' . $row['id_user'] . '">' . $row['username'] . '</option>';
                }
                ?> </select> -->
                         <input type="hidden" name="Id_profil" value="<?php echo($hasil_2); ?>">
                         <input type="hidden" name="username" value="<?php echo($sessionusername); ?>">
                         <label for="">Cust Id *</label>
                         <input type="text" name="cust_id" class="form-control" placeholder="Cust Id" required>
                         <label for="">Nama Customer *</label>
                         <input type="text" name="nama_cust" class="form-control" placeholder="Nama Customer" required>
                          <label for="">Alamat</label>
                      <textarea name="alamat" placeholder="Alamat" class="form-control" required></textarea>
                       </div>
                       <div class="col-md-6">
                      <div class="row">
                      <div class="col-md-6">
                      <label for="">Pilihan Group</label>
                      <select class="form-control" id="action_group" name="action_group" required>
                      <option>--pilih--</option>
                      <option value="YA">Ada</option>
                      <option value="TIDAK">Tidak Ada</option>
                    </select>
                      </div>
                      <div id="group" class="col-md-6">
                      <label for="">Group</label>
                      <select class="form-control" name="group" required>
                      <option value="auInysy5lEtjhHc7FjW1">--pilih--</option>
                      <?php
                      $queri = mysqli_query($connect,"SELECT * FROM m_group ORDER BY Id");
                      while($row=mysqli_fetch_array($queri)){
                      echo '<option value="' . $row['Id'] . '">' . $row['nama_group'] . '</option>';
                      }
                      ?>
                    </select>
                      </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                        <label for="">No Telepon</label>
                      <input type="text" name="no_tlp" class="form-control" placeholder="Nomer Telepon" required> 
                        </div>
                        <div class="col-md-6">
                        <label for="">Termin</label>
                      <input type="text" name="termin" class="form-control" placeholder="Termin" required> 
                        </div>
                      </div>
                    </div>
                     </div>
                          <br/>
                         <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-8">
                          <a href="grid_profil"><span class="btn btn-primary">Kembali</span></a>
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
		$( document ).ready(function() {		  
			$('.selectpicker').selectpicker();
		});
	</script>
    <script type="text/javascript">
     $(function () {
        $("#action_group").change(function () {
            if ($(this).val() == "YA") {
                $("#group").show();
            }
            if ($(this).val() == "TIDAK") {
                $("#group").hide();
            }
        });
    });

    </script>
<?php
    include "layout/js_bottom.php";
 ?>
 
