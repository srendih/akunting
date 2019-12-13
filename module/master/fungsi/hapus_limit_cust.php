<?php
include "../../../fungsi/koneksi.php";
$id = $_GET['id'];

$query = mysqli_query($connect,"DELETE FROM limit_cust WHERE Id_limit_cust = '$id'");
if ($query){
	echo "<script>alert('Berhasil di Hapus!'); window.location = '../grid_limit_cust'</script>";	
} else {
	echo "<script>alert('Gagal di Hapus!'); window.location = '../grid_limit_cust'</script>";	
}
?>