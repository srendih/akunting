<?php
include "../../../fungsi/koneksi.php";
$id = $_GET['id'];

$query = mysqli_query($connect,"DELETE FROM limit_group WHERE Id_limit_group = '$id'");
if ($query){
	echo "<script>alert('Berhasil di Hapus!'); window.location = '../grid_limit_group'</script>";	
} else {
	echo "<script>alert('Gagal di Hapus!'); window.location = '../grid_limit_group'</script>";	
}
?>