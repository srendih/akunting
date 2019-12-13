
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
                    <h2>INPUT GROUP</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <?php
                  if($_GET['id']){
                    $query=mysqli_query($connect,"SELECT * FROM m_group WHERE Id ='$_GET[id]'");
                    $data=mysqli_fetch_array($query);
                  ?>
                  <div class="x_content">
                    <!-- start form for validation -->
                    <form action="fungsi/edit_group" method="post" data-parsley-validate>
                     <div class="row">
                       <div class="col-md-12">
                         <label for="">Nama Group *</label>
                         <input type="text" name="nm_group" value="<?php echo $data['nama_group']; ?>" class="form-control" placeholder="Nama Group" required>
                         <input type="hidden" name="Id" value="<?php echo $data['Id']; ?>">
                         </div>
                     </div>
                          <br/>
                         <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-8">
                          <a href="grid_group"><span class="btn btn-primary">Kembali</span></a>
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
                    <form action="fungsi/save_group" method="post" data-parsley-validate>
                     <div class="row">
                       <div class="col-md-12">
                         <label for="">Nama Group *</label>
                         <input type="text" name="group" class="form-control" placeholder="Nama Group" required>
                         <input type="hidden" name="Id" value="<?php echo($hasil_2); ?>">
                       </div>
                     </div>
                          <br/>
                         <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-8">
                          <a href="grid_group"><span class="btn btn-primary">Kembali</span></a>
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
 
