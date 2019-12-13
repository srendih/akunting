<?php 
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Uang Masuk.xls");
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
        <th class="column-title">No Inv</th>
        <th class="column-title">Nama Customer</th>
        <th class="column-title">Cust_id</th>
        <th class="column-title">Group</th>
        <th class="column-title">Cara Bayar</th>
        <th class="column-title">Tanggal Bayar </th>
        <th class="column-title">Bayar</th>
        <th class="column-title">Diskon PPH</th>
        <th class="column-title">PPH Wapu </th>
        <th class="column-title">Total Pembayaran</th>
        </th>
        </tr>
    </thead>
    <?php
    while($data = mysqli_fetch_array($result)) {
        // $totalbayar+= $data['bayar'];
        // $totalpembayaran+= $data['total_bayar'];
        // $totalpph+= $data['diskon_pph'];
        // $totalwapu+= $data['pph_wapu'];
    ?>
    <tbody>
        <td class=" ">
        <?php echo $no_urut++; ?>
        </td>
        <td><?php echo $data['no_inv']; ?></td>
        <td><?php echo $data['nama_customer']; ?></td>
        <td><?php echo $data['cust_id']; ?></td>
        <td><?php echo $data['nama_group']; ?></td>
        <td><?php echo $data['cara_bayar']; ?></td>
        <td><?php echo $data['tgl_bayar']; ?></td>
        <td><?php echo $data['bayar']; ?></td>
        <td><?php echo $data['diskon_pph']; ?></td>
        <td><?php echo $data['pph_wapu']; ?></td>
        <td><?php echo $data['total_bayar']; ?></td>
        </tr>
        <?php  
        }
        ?>
        <!-- <td colspan="2">Grand Total</td>
        <td colspan="3"></td>
        <td colspan="1"><?php echo $totalbayar; ?></td>
        <td colspan="1"><?php echo $totalpph; ?></td>
        <td colspan="1"><?php echo $totalwapu; ?></td>
        <td colspan="1"><?php echo $totalpembayaran; ?></td> -->
    </tbody>
    </table>
    