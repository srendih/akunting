
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
                    <h2>UBAH PASSWORD</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
               
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <?php
                  $session=$_SESSION['Id'];
                    $query=mysqli_query($connect,"SELECT * FROM user WHERE Id='$session'");
                    $data=mysqli_fetch_array($query);
                  ?>
                  <div class="x_content">
                    <!-- start form for validation -->
                    <form action="fungsi/edit_password" method="post" data-parsley-validate>
                     <div class="row">
                       <div class="col-md-6">
                         <label for="">Username *</label>
                         <input type="text" name="username" value="<?php echo $data['username']; ?>" class="form-control" placeholder="Username" required>
                         <input type="hidden" name="Id" value="<?php echo $data['Id']; ?>">
                         
                       </div>
                       <div class="col-md-6">
                        <label for="">Password *</label>
                         <input type="password" name="password" value="<?php echo $data['password']; ?>" class="form-control" placeholder="Password" required>
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
 
