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
          

            if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']<>""){
    //        jika ada kata kunci pencarian (artinya form pencarian disubmit dan tidak kosong)
    //        pakai ini
                $keyword=$_REQUEST['keyword'];
                $reload = "grid_profil?pagination=true&keyword=$keyword";
                $sql =  "SELECT * FROM profile WHERE cust_id LIKE '%$keyword%' OR nama_customer LIKE '%$keyword%'
                 OR termin LIKE '%$keyword%' ORDER BY Id_profil";
                $result = mysqli_query($connect,$sql);
            }else{
    //            jika tidak ada pencarian pakai ini
                $reload = "grid_profil?pagination=true";
                $sql =  "SELECT * FROM profile ORDER BY Id_profil";
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
                <h2><b>TABEL USER PROFIL</b></h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card-box table-responsive">
                      <div class="row">
                        <div class="col-md-3">
                          <form method="post" action="">
                            <div class="form-group input-group">
                              <input type="text" name="keyword" class="form-control" placeholder="Cari.." value="<?php echo $_REQUEST['keyword']; ?>">
                              <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">Cari
                                </button>
                              </span>
                            </div>
                          </form>
                        </div>
                        <div class="text-right">
                          <a href="grid_profil" class="btn btn-sm btn-info">Refresh<i class="fa fa-refresh"></i></a>
                          <a href="form_profil" class="btn btn-sm btn-warning">Tambah<i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <table id="datatable-keytable" class="table table-striped table-bordered jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Nomer </th>
                            <th class="column-title">Cust Id</th>
                            <th class="column-title">Dibuat</th>
                            <th class="column-title">Nama Customer</th>
                            <th class="column-title">Group</th>
                            <th class="column-title">Termin</th>
                            <th class="column-title">No Telepon</th>
                            <th class="column-title">Alamat</th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                          </tr>
                        </thead>
                        <?php
                        while(($count<$rpp) && ($i<$tcount)) {
                        mysqli_data_seek($result,$i);
                        $data = mysqli_fetch_array($result);
                        $queryGroup = mysqli_query($connect, "SELECT * FROM m_group WHERE Id='$data[group_cust]'");
                        $tmpilgroup = mysqli_fetch_array($queryGroup);
                        ?>
                        <tbody>
                          <td><?php echo ++$no_urut; ?></td>
                          <td><?php echo $data['cust_id']; ?></td>
                          <td><?php echo $data['username']; ?></td>
                          <td><?php echo $data['nama_customer']; ?></td>
                          <td><?php echo $tmpilgroup['nama_group']; ?></td>
                          <td><?php echo $data['termin']; ?></td>
                          <td><?php echo $data['no_tlp']; ?></td>
                          <td><?php echo $data['alamat']; ?></td>
                          <td class="text-center">
                            <?php if($_SESSION['hak_level']=='admin2') {} ?>
                            <?php if($_SESSION['hak_level']=='admin') { ?>
                            <a class="btn btn-info btn-xs" data-placement="bottom" data-toggle="tooltip" title="Edit"
                              href="form_profil?id=<?php echo $data['Id_profil'];?>"><span class="fa fa-pencil"></span> Ubah</a>
                            <a onclick="return confirm ('User Atas Nama <?php echo $data['nama_customer'];?> Akan Hapus.?');"
                              class="btn btn-danger btn-xs" data-placement="bottom" data-toggle="tooltip" title="Hapus"
                              href="fungsi/hapus_profil?id=<?php echo $data['Id_profil'];?>"><span class="fa fa-trash-o">
                                Hapus</a>
                              <?php } ?>
                          </td>
                          </tr>
                          <?php  
                            $i++; 
                           $count++;
                            }
                            ?>
                        </tbody>
                      </table>
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
  <?php
    include "layout/js_bottom.php";
 ?>