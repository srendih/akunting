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
          

            if(isset($_GET['keyword']) && $_GET['keyword']){
                $keyword=$_GET['keyword'];
                $reload = "grid_invoice?pagination=true&keyword=$keyword";
                $sql = "SELECT invoice.cust_id, invoice.id, invoice.no_inv, invoice.nominal_inv, invoice.transport, invoice.nilai_ppn, invoice.proyek, invoice.total_inv, invoice.tgl_inv, invoice.tgl_input, profile.nama_customer, profile.termin, m_group.nama_group, invoice.kode, invoice.bulan_inv, user_sales.nm_sales, limit_cust.batas_limit, status.nama_status, status.warna
              FROM invoice JOIN profile ON invoice.cust_id=profile.cust_id JOIN m_group ON profile.group_cust=m_group.Id
              JOIN user_sales ON invoice.id_sales=user_sales.id JOIN limit_cust ON profile.cust_id=limit_cust.cust_id
              JOIN status ON invoice.Id_status=status.Id_status
                WHERE 
                 -- cust_id LIKE '%$keyword%' OR no_inv LIKE '%$keyword%'
                invoice.cust_id LIKE '%$keyword%' OR invoice.no_inv LIKE '%$keyword%' OR profile.nama_customer LIKE '%$keyword%' OR invoice.proyek LIKE '%$keyword%'
                ORDER BY invoice.id";
                $result = mysqli_query($connect,$sql);
            }else{
              $reload = "grid_invoice?pagination=$keyword";
                $sql =  "SELECT invoice.cust_id, invoice.id, invoice.no_inv, invoice.nominal_inv, invoice.transport, invoice.nilai_ppn, invoice.proyek, invoice.total_inv, invoice.tgl_inv, invoice.tgl_input, profile.nama_customer, profile.termin, m_group.nama_group, invoice.kode, invoice.bulan_inv, user_sales.nm_sales, limit_cust.batas_limit, status.nama_status, status.warna, invoice.sisa_bayar
              FROM invoice JOIN profile ON invoice.cust_id=profile.cust_id JOIN m_group ON profile.group_cust=m_group.Id
              JOIN user_sales ON invoice.id_sales=user_sales.id JOIN limit_cust ON profile.cust_id=limit_cust.cust_id
              JOIN status ON invoice.Id_status=status.Id_status
              ORDER BY invoice.id";
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
                <h2><b>TABEL INVOICE</b></h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card-box table-responsive">
                      <div class="row">
                        <div class="col-md-3">
                          <form method="get" action="">
                            <div class="form-group input-group">
                              <input type="text" name="keyword" class="form-control" placeholder="Cari.." value="<?php echo $_GET['keyword']; ?>">
                              <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">Cari
                                </button>
                              </span>
                            </div>
                          </form>
                        </div>
                        <div class="col-md-3">
                        <form action="laporan/exel_laporan_invoice" method="post">
                        <input type="hidden" name="sql" value="<?php echo $sql ?>" >
                          <span class="input-group-btn">
                          </span>
                          <button class="btn btn-success" type="submit">Download
                      </button>
                    <a href="grid_invoice" class="btn btn-sm btn-info">Refresh<i class="fa fa-refresh"></i></a>
                    </form>
                        </div>
                        <?php if($_SESSION['hak_level']=='admin3') { }
                         ?>
                         <?php if($_SESSION['hak_level']=='admin') { ?>
                        <div class="text-right">
                          <a href="form_invoice" class="btn btn-sm btn-warning">Tambah<i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                          <?php } ?>
                          <?php if($_SESSION['hak_level']=='admin2') { ?>
                        <div class="text-right">
                          <a href="form_invoice" class="btn btn-sm btn-warning">Tambah<i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                          <?php } ?>
                      </div>
                      <table id="datatable-keytable" class="table table-striped table-bordered jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">No</th>
                            <th class="column-title">Cust Id</th>
                            <th class="column-title">No Inv</th>
                            <th class="column-title">Status</th>
                            <th class="column-title">Customer </th>
                            <th class="column-title">Proyek </th>
                            <th class="column-title">Nilai Inv</th>
                            <th class="column-title">Transport</th>
                            <th class="column-title">Nilai Ppn </th>
                            <th class="column-title">Total Inv</th>
                            <th class="column-title">Sisa Hutang </th>
                            <th class="column-title">Tgl Input</th>
                            <th class="column-title">Tgl Inv </th>
                            <th class="column-title">Termin</th>
                            <th class="column-title">Group </th>
                            <th class="column-title">Kode </th>
                            <th class="column-title">M Inv</th>
                            <th class="column-title">Sales</th>
                            <th class="column-title">Batas Limit</th>
                            <th class="column-title">Status Limit</th>
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
                        // $qprofil = mysqli_query($connect,"SELECT * FROM profile WHERE cust_id ='$data[cust_id]'");
                        // $tprofil = mysqli_fetch_array($qprofil);
                        // $qlimit = mysqli_query($connect,"SELECT * FROM limit_cust WHERE cust_id ='$data[cust_id]'");
                        // $tlimit = mysqli_fetch_array($qlimit);
                        // $qgroup = mysqli_query($connect,"SELECT * FROM m_group WHERE Id ='$tprofil[group_cust]'");
                        // $tgroup = mysqli_fetch_array($qgroup);
                        // $qsales = mysqli_query($connect,"SELECT * FROM user_sales WHERE id ='$data[id_sales]'");
                        // $tsales = mysqli_fetch_array($qsales);
                        $querylimit = mysqli_query($connect, "SELECT SUM(total_bayar) AS TOTAL FROM pembayaran WHERE id_inv ='$data[id]'");
                        $tmpillimit = mysqli_fetch_array($querylimit);
                        $limitcust = $data['batas_limit'];
                        $totalinvoice = $tmpillimit['TOTAL'];
                        ?>
                        <tbody>
                          <td class=" ">
                            <?php echo ++$no_urut; ?>
                          </td>
                          <td><?php echo $data['cust_id']; ?></td>
                          <td><?php echo $data['no_inv']; ?></td>
                          <td><a href="#" class="btn btn-sm" style="background:<?php echo $data['warna']; ?>"></span><?php echo $data['nama_status']; ?></a></td>
                          <td><?php echo $data['nama_customer']; ?></td>
                          <td><?php echo $data['proyek']; ?></td>
                          <td><?php echo number_format($data['nominal_inv'], 0, ".","."); ?></td>
                          <td><?php echo number_format($data['transport'], 0, ".","."); ?></td>
                          <td><?php echo number_format($data['nilai_ppn'], 0, ".","."); ?></td>
                          <td><?php echo number_format($data['total_inv'], 0, ".","."); ?></td>
                          <td><?php echo number_format($data['sisa_bayar'], 0, ".","."); ?></td>
                          <td><?php echo $data['tgl_input']; ?></td>
                          <td><?php echo $data['tgl_inv']; ?></td>
                          <td><?php echo $data['termin']; ?></td>
                          <td><?php echo $data['nama_group']; ?></td>
                          <td><?php echo $data['kode']; ?></td>
                          <td><?php echo $data['bulan_inv']; ?></td>
                          <td><?php echo $data['nm_sales']; ?></td>
                          <td><?php echo number_format($data['batas_limit'], 0, ".","."); ?></td>
                          <?php
                          if ($limitcust < $totalinvoice ){
                            $qlimitstatus = mysqli_query($connect, "SELECT * FROM status WHERE nama_status='No limit'");
                            $tmplstatuslimit = mysqli_fetch_array($qlimitstatus);
                          ?>
                          <td><a href="#" class="btn btn-sm" style="background:<?php echo $tmplstatuslimit['warna']; ?>"></span><?php echo $tmplstatuslimit['nama_status']; ?></a></td>
                          <?php } else {
                            $qlimitstatus = mysqli_query($connect, "SELECT * FROM status WHERE nama_status='Limit'");
                            $tmplstatuslimit = mysqli_fetch_array($qlimitstatus);
                            ?>
                          <td><a href="#" class="btn btn-sm" style="background:<?php echo $tmplstatuslimit['warna']; ?>"></span><?php echo $tmplstatuslimit['nama_status']; ?></a></td>

                          <?php }?>
                          <td class="text-center">
                            <?php if($_SESSION['hak_level']=='admin3') { ?>
                              <a class="btn btn-info btn-xs" data-placement="bottom" data-toggle="tooltip" title="Edit"
                              href="form_invoice_view?id=<?php echo $data['id'];?>"><span class="fa fa-eye"></span> Lihat</a>
                            <?php } ?>
                            <?php if($_SESSION['hak_level']=='admin2') { ?>
                              <a class="btn btn-info btn-xs" data-placement="bottom" data-toggle="tooltip" title="Edit"
                              href="form_invoice_view?id=<?php echo $data['id'];?>"><span class="fa fa-eye"></span> Lihat</a>
                            <?php } ?>
                            <?php if($_SESSION['hak_level']=='admin') { ?>
                            <a class="btn btn-info btn-xs" data-placement="bottom" data-toggle="tooltip" title="Edit"
                              href="form_invoice?id=<?php echo $data['id'];?>"><span class="fa fa-pencil"></span> Ubah</a>
                            <a onclick="return confirm ('Invoice Atas Nama <?php echo $tprofil['nama_customer'];?> Akan Hapus.?');"
                              class="btn btn-danger btn-xs" data-placement="bottom" data-toggle="tooltip" title="Hapus"
                              href="fungsi/hapus_invoice?id=<?php echo $data['id'];?>"><span class="fa fa-trash-o">
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