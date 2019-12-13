<?php 
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Pembayaran.xls");
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
    <th class="column-title">Kode Pembayaran</th>
    <th class="column-title">No Inv</th>
    <th class="column-title">Customer</th>
    <th class="column-title">Proyek </th>
    <th class="column-title">Group </th>
    <th class="column-title">Tagihan Inv</th>
    <th class="column-title">Status</th>
    </th>
    </tr>
</thead>
<?php
while($data = mysqli_fetch_array($result)) {
$qstatus = mysqli_query($connect, "SELECT * FROM status WHERE nama_status='$data[nama_status]'");
$tmpilstatus = mysqli_fetch_array($qstatus);
?>
<tbody>
    <td class=" ">
    <?php echo $no_urut++; ?>
    </td>
    <td><?php echo $data['kode_bayar']; ?></td>
    <td><?php echo $data['no_inv']; ?></td>
    <td><?php echo $data['nama_customer']; ?></td>
    <td><?php echo $data['proyek']; ?></td>
    <td><?php echo $data['nama_group']; ?></td>
    <td><?php echo $data['total_inv']; ?></td>
    <td><?php echo $data['nama_status']; ?></td>
    </tr>
    <?php  
    }
    ?>
</tbody>
</table>
    