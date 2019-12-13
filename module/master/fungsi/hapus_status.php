<?php
include "../../../fungsi/koneksi.php";
$id = $_GET['id'];

$query = mysqli_query($connect,"DELETE FROM status WHERE Id_status = '$id'");
if ($query){
	echo "<script>alert('Berhasil di Hapus!'); window.location = '../grid_status'</script>";	
} else {
	echo "<script>alert('Gagal di Hapus!'); window.location = '../grid_status'</script>";	
}
?>