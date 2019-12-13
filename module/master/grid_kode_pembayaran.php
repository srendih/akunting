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
                $reload = "grid_kode_pembayaran?pagination=true&keyword=$keyword";
                $sql =  "SELECT * FROM kode_pembayaran WHERE kode_bayar LIKE '%$keyword%' ORDER BY id";
                $result = mysqli_query($connect,$sql);
            }else{
    //            jika tidak ada pencarian pakai ini
                $reload = "grid_kode_pembayaran?pagination=true";
                $sql =  "SELECT * FROM kode_pembayaran ORDER BY id";
                $result = mysqli_query($connect,$sql);
            }
            
            //pagination config start
            $rpp = 5; // jumlah record per halaman
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
                <h2><b>KODE PEMBAYARAN</b></h2>

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
                      </div>
                      <table id="datatable-keytable" class="table table-striped table-bordered jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Nomer </th>
                            <th class="column-title">Kode Pembayaran</th>
                            <th class="column-title">No Inv</th>
                            <th class="column-title">Customer</th>
                            <th class="column-title">Proyek </th>
                            <th class="column-title">Group </th>
                            <th class="column-title">Tagihan Inv</th>
                            <th class="column-title">Status</th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                          </tr>
                        </thead>
                        <?php
                        while(($count<$rpp) && ($i<$tcount)) {
                        mysqli_data_seek($result,$i);
                        $data = mysqli_fetch_array($result);
                        $qinvoice = mysqli_query($connect, "SELECT * FROM invoice WHERE id='$data[id_inv]'");
                        $tmpilinvoice = mysqli_fetch_array($qinvoice);
                        $qprofile = mysqli_query($connect, "SELECT * FROM profile WHERE cust_id='$tmpilinvoice[cust_id]'");
                        $tmpilprofil = mysqli_fetch_array($qprofile);
                        $qstatus = mysqli_query($connect, "SELECT * FROM status WHERE nama_status='$data[nama_status]'");
                        $tmpilstatus = mysqli_fetch_array($qstatus);
                        $qgroup = mysqli_query($connect, "SELECT * FROM m_group WHERE Id='$tmpilprofil[group_cust]'");
                        $tmpilgroup = mysqli_fetch_array($qgroup);
                        ?>
                        <tbody>
                          <td class=" ">
                            <?php echo ++$no_urut; ?>
                          </td>
                          <td><?php echo $data['kode_bayar']; ?></td>
                          <td><?php echo $tmpilinvoice['no_inv']; ?></td>
                          <td><?php echo $tmpilprofil['nama_customer']; ?></td>
                          <td><?php echo $tmpilinvoice['proyek']; ?></td>
                          <td><?php echo $tmpilgroup['nama_group']; ?></td>
                          <td><?php echo number_format($tmpilinvoice['total_inv'], 0, ".","."); ?></td>
                          <td><a href="#" class="btn btn-sm" style="background:<?php echo $tmpilstatus['warna']; ?>"></span><?php echo $tmpilstatus['nama_status']; ?></a></td>
                          <td class="text-center">
                            <a class="btn btn-info btn-xs" data-placement="bottom" data-toggle="tooltip" title="Lihat"
                              href="form_kodepembayaran?id=<?php echo $data['id'];?>"><span class="fa fa-eye"></span> Lihat</a>
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