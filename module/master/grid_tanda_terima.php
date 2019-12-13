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
                $reload = "grid_tanda_terima?pagination=true&keyword=$keyword";
                $sql =  "SELECT * FROM invoice WHERE cust_id LIKE '%$keyword%' OR no_inv LIKE '%$keyword%' 
                OR ket LIKE '%$keyword%' ORDER BY Id";
                $result = mysqli_query($connect,$sql);
            }else{
    //            jika tidak ada pencarian pakai ini
                $reload = "grid_tanda_terima?pagination=true";
                $sql =  "SELECT * FROM invoice ORDER BY id";
                $result = mysqli_query($connect,$sql);
            }
            
            //pagination config start
            $rpp = 25; // jumlah record per halaman
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
                <h2><b>TABEL TANDA TERIMA INVOICE</b></h2>

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
                              <input type="text" name="keyword" class="form-control" placeholder="Cari.." value="">
                              <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">Cari
                                </button>
                              </span>
                            </div>
                          </form>
                        </div>
                        <div class="col-md-3">
                          <form method="post" action="">
                            <div class="form-group input-group">
                              <select name="keyword" class="form-control">
                              <option value="">--pilih--</option>
                              <option value="Sudah Dikirim">Sudah Dikirim</option>
                              <option value="Belum Dikirim">Belum Dikirim</option>
                              </select>
                              <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">Cari
                                </button>
                              </span>
                            </div>
                          </form>
                        </div>
                      </div>
                      <table id="datatable-keytable" class="table table-striped table-bordered jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Nomer </th>
                            <th class="column-title">Cust Id</th>
                            <th class="column-title">No Inv</th>
                            <th class="column-title">Status</th>
                            <th class="column-title">Customer </th>
                            <th class="column-title">Proyek </th>
                            <th class="column-title">Tgl Inv </th>
                            <th class="column-title">Group </th>
                            <th class="column-title">Status</th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                          </tr>
                        </thead>
                        <?php
                        while(($count<$rpp) && ($i<$tcount)) {
                        mysqli_data_seek($result,$i);
                        $data = mysqli_fetch_array($result);
                        $qstts = mysqli_query($connect, "SELECT * FROM status WHERE Id_status='$data[Id_status]'");
                        $tstts = mysqli_fetch_array($qstts);
                        $qsttsket = mysqli_query($connect, "SELECT * FROM status WHERE nama_status='$data[ket]'");
                        $tmpilket = mysqli_fetch_array($qsttsket);
                        $qprofil = mysqli_query($connect,"SELECT * FROM profile WHERE cust_id ='$data[cust_id]'");
                        $tprofil = mysqli_fetch_array($qprofil);
                        $qlimit = mysqli_query($connect,"SELECT * FROM limit_cust WHERE cust_id ='$data[cust_id]'");
                        $tlimit = mysqli_fetch_array($qlimit);
                        $qgroup = mysqli_query($connect,"SELECT * FROM m_group WHERE Id ='$tprofil[group_cust]'");
                        $tgroup = mysqli_fetch_array($qgroup);
                        $qsales = mysqli_query($connect,"SELECT * FROM user_sales WHERE id ='$data[id_sales]'");
                        $tsales = mysqli_fetch_array($qsales);
                        $querylimit = mysqli_query($connect, "SELECT SUM(total_inv) AS TOTAL FROM invoice WHERE cust_id ='$data[cust_id]'");
                        $tmpillimit = mysqli_fetch_array($querylimit);
                        $limitcust = $tlimit['batas_limit'];
                        $totalinvoice = $tmpillimit['TOTAL'];
                        ?>
                        <tbody>
                          <td class=" ">
                            <?php echo ++$no_urut; ?>
                          </td>
                          <td><?php echo $data['cust_id']; ?></td>
                          <td><?php echo $data['no_inv']; ?></td>
                          <td><a href="#" class="btn btn-sm" style="background:<?php echo $tstts['warna']; ?>; font-weight: bold;"><strong><?php echo $tstts['nama_status']; ?></strong></a></td>
                          <td><?php echo $tprofil['nama_customer']; ?></td>
                          <td><?php echo $data['proyek']; ?></td>
                          <td><?php echo $data['tgl_inv']; ?></td>
                          <td><?php echo $tgroup['nama_group']; ?></td>
                          <td><a href="#" class="btn btn-sm" style="background:<?php echo $tmpilket['warna']; ?>; font-weight: bold;"><?php echo $tmpilket['nama_status']; ?></a></td>
                          <td class="text-center">
                            <a class="btn btn-info btn-xs" data-placement="bottom" data-toggle="tooltip" title="Lihat"
                              href="form_tanda_terima?id=<?php echo $data['id'];?>"><span class="fa fa-eye"></span> Lihat</a>
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