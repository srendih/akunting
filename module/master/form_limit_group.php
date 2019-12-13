
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
          <?php
        if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']<>""){
            $keyword=$_REQUEST['keyword'];
            $query=mysqli_query($connect,"SELECT * FROM m_group WHERE nama_group LIKE '%$keyword%'");
            $data=mysqli_fetch_array($query);
            if($data==null){
              echo "<script>alert('Data tidak ditemukan');</script>";	
            }
            }
        ?>
              <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="x_panel">
                  <div class="x_title">
                    <h2>INPUT LIMIT GROUP</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <?php
                  if($_GET['id']){
                    $query=mysqli_query($connect,"SELECT * FROM limit_group WHERE Id_limit_group='$_GET[id]'");
                    $datalimit=mysqli_fetch_array($query);
                    $q=mysqli_query($connect, "SELECT * FROM m_group WHERE Id ='$datalimit[Id_group]'");
                    $tmpilgroup = mysqli_fetch_array($q);
                  ?>
                  <div class="x_content">
                    <!-- start form for validation -->
                    <form action="fungsi/edit_limit_group" method="post" data-parsley-validate>
                    <div class="row">
                    <div class="col-md-6">
                    <label for="">Nama Group *</label>
                    <select name="group_id" class="selectpicker form-control" data-live-search="true" data-size="8">
                    <option value="<?php echo $tmpilgroup['Id']; ?>"><?php echo $tmpilgroup['nama_group']; ?></option>
                    <?php
                    $queri = mysqli_query($connect,"SELECT * FROM m_group ORDER BY Id");
                    while($row=mysqli_fetch_array($queri)){
                    echo '<option value="' . $row['Id'] . '">' . $row['nama_group'] . '</option>'; 
                }
                ?> </select>
                    <input type="hidden" name="Id" value="<?php echo $datalimit['Id_limit_group']; ?>">
                </div>
                       <div class="col-md-6">
                         <label for="">Batas Limit</label>
                        <input type="number" value="<?php echo $datalimit['batas_limit']; ?>" class="form-control" name="limit" placeholder="Harga" required />
                       </div>
                     </div>
                          <br/>
                         <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-8">
                          <a href="grid_limit_group"><span class="btn btn-primary">Kembali</span></a>
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
                    <form action="fungsi/save_limit_group" method="post" data-parsley-validate>
                    <label for="">Nama Group *</label>
                    <select name="Id_group" class="selectpicker form-control" data-live-search="true" data-size="8" title="Pilih Nama Group . . .">
                    <?php
                    $queri = mysqli_query($connect,"SELECT * FROM m_group ORDER BY Id");
                    while($row=mysqli_fetch_array($queri)){
                    echo '<option value="' . $row['Id'] . '">' . $row['nama_group'] . '</option>'; 
                }
                ?> </select>
                    <input type="hidden" name="Id" value="<?php echo($hasil_2); ?>">
                </div>
                       <div class="col-md-6">
                        <label for="">Batas Limit</label>
                        <input type="number" class="form-control" name="limit" placeholder="Harga" required />                   
                        </div>
                     </div>
                          <br/>
                         <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-8">
                          <a href="grid_limit_group"><span class="btn btn-primary">Kembali</span></a>
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
        <script type="text/javascript">
		$( document ).ready(function() {		  
			$('.selectpicker').selectpicker();
		});
	</script>
        <?php include "layout/footer.php"; ?>
        <!-- /footer content -->
      </div>
    </div>
<?php
    include "layout/js_bottom.php";
 ?>
 