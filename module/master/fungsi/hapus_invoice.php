<?php
include "../../../fungsi/koneksi.php";
$id = $_GET['id'];

$query = "DELETE FROM invoice WHERE id = '$id'";
$querykode = "DELETE FROM kode_pembayaran WHERE id_inv='$id'";
$querypembayaran = "DELETE FROM pembayaran WHERE id_inv='$id'";

$hasil = mysqli_query($connect, $query);
$hasil = mysqli_query($connect, $querykode);
$hasil = mysqli_query($connect, $querypembayaran);
if ($hasil){
	echo "<script>alert('Berhasil di Hapus!'); window.location = '../grid_invoice'</script>";	
} else {
	echo "<script>alert('Gagal di Hapus!'); window.location = '../grid_invoice'</script>";	
}
?>