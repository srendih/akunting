<?php
include "../../../fungsi/koneksi.php";
$id =$_POST['daterange'];

$tglawal =$_POST['tgl_awal'];
$tglakhir =$_POST['tgl_akhir'];
echo $tglakhir,'-', $tglawal;
?>