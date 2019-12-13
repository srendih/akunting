<?php 
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan invoice.xls");
//memanggil fungsi
include "../../../fungsi/koneksi.php";
include "page.php";


//ambil query dari sql yang dikirim oleh form
$sql = isset($_POST['sql'])?$_POST['sql']:'';

// masukkan sql ke dalam query
$result = mysqli_query($connect, $sql);
!$result?die(mysqli_error()):'';
$no_urut=1;

?>
    <table id="datatable-keytable" class="table table-striped table-bordered jambo_table bulk_action">
    <thead>
      <tr class="headings">
        <th class="column-title">Nomer </th>
        <th class="column-title">Cust Id</th>
        <th class="column-title">No Inv</th>
        <th class="column-title">Status</th>
        <th class="column-title">Customer </th>
        <th class="column-title">Proyek </th>
        <th class="column-title">Nilai Inv</th>
        <th class="column-title">Transport</th>
        <th class="column-title">Nilai Ppn </th>
        <th class="column-title">Total Inv</th>
        <th class="column-title">Sisa Hutang</th>
        <th class="column-title">Tgl Input </th>
        <th class="column-title">Tgl Inv </th>
        <th class="column-title">Termin</th>
        <th class="column-title">Group </th>
        <th class="column-title">Kode </th>
        <th class="column-title">M Inv</th>
        <th class="column-title">Sales</th>
        <th class="column-title">Batas Limit</th>
        <th class="column-title">Status Limit</th>
        </th>
      </tr>
    </thead>
    <?php
    while($data = mysqli_fetch_array($result)) {
    // $qstts = mysqli_query($connect, "SELECT * FROM status WHERE Id_status='$data[Id_status]'");
    // $tstts = mysqli_fetch_array($qstts);
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
        <?php echo $no_urut++; ?>
        </td>
        <td><?php echo $data['cust_id']; ?></td>
          <td><?php echo $data['no_inv']; ?></td>
          <td><?php echo $data['nama_status']; ?></td>
          <td><?php echo $data['nama_customer']; ?></td>
          <td><?php echo $data['proyek']; ?></td>
          <td><?php echo $data['nominal_inv']; ?></td>
          <td><?php echo $data['transport']; ?></td>
          <td><?php echo $data['nilai_ppn']; ?></td>
          <td><?php echo $data['total_inv']; ?></td>
          <td><?php echo $data['sisa_bayar']; ?></td>
          <td><?php echo $data['tgl_input']; ?></td>
          <td><?php echo $data['tgl_inv']; ?></td>
          <td><?php echo $data['termin']; ?></td>
          <td><?php echo $data['nama_group']; ?></td>
          <td><?php echo $data['kode']; ?></td>
          <td><?php echo $data['bulan_inv']; ?></td>
          <td><?php echo $data['nm_sales']; ?></td>
          <td><?php echo $data['batas_limit']; ?></td>
          <?php
          if ($limitcust < $totalinvoice ){
            $qlimitstatus = mysqli_query($connect, "SELECT * FROM status WHERE nama_status='No limit'");
            $tmplstatuslimit = mysqli_fetch_array($qlimitstatus);
          ?>
          <td><?php echo $tmplstatuslimit['nama_status']; ?></td>
          <?php } else {
            $qlimitstatus = mysqli_query($connect, "SELECT * FROM status WHERE nama_status='Limit'");
            $tmplstatuslimit = mysqli_fetch_array($qlimitstatus);
            ?>
          <td><?php echo $tmplstatuslimit['nama_status']; ?></td>

          <?php } ?>
    </tr>
        <?php  
        }
        ?>
        
    </tbody>
    </table>