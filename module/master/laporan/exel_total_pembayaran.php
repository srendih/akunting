<?php 
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Total Pembayaran.xls");
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
        <th class="column-title">No </th>
        <th class="column-title">Nama Customer </th>
        <th class="column-title">Cust Id</th>
        <th class="column-title">Tanggal Bayar </th>
        <th class="column-title">Pembayaran</th>
        </th>
        </tr>
    </thead>
    <?php
    while($data = mysqli_fetch_array($result)) {
    ?>
    <tbody>
        <td class=" ">
        <?php echo $no_urut++; ?>
        </td>
        <td><?php echo $data['nama_customer']; ?></td>
        <td><?php echo $data['cust_id']; ?></td>
        <td><?php echo $data['tgl_bayar']; ?></td>
        <td><?php echo $data['bayar']; ?></td>
        </tr>
        <?php  
        }
        ?>
    </tbody>
    </table>
    