<?php 
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Piutang.xls");
//memanggil fungsi
include "../../../fungsi/koneksi.php";


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
        <th class="column-title">No Inv</th>
        <th class="column-title">Cust_id</th>
        <th class="column-title">Nama Customer</th>
        <th class="column-title">Group</th>
        <th class="column-title">Tanggal Invoice</th>
        <th class="column-title">Total Invoice</th>
        <th class="column-title">Total Piutang</th>
        <th class="column-title">Total Bayar</th>
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
        <td><?php echo $data['no_inv']; ?></td>
        <td><?php echo $data['cust_id']; ?></td>
        <td><?php echo $data['nama_customer']; ?></td>
        <td><?php echo $data['nama_group']; ?></td>
        <td><?php echo $data['tgl_inv']; ?></td>
        <td><?php echo $data['total_invoice']; ?></td>
        <td><?php echo $data['total_sisa_bayar']; ?></td>
        <td><?php echo $data['total_bayar']; ?></td>
    </tr>
        <?php  
        }
        ?>
        
    </tbody>
    </table>
    