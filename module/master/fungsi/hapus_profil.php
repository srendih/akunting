<?php
include "../../../fungsi/koneksi.php";
$id = $_GET['id'];

$query = mysqli_query($connect,"DELETE FROM profile WHERE Id_profil = '$id'");
if ($query){
	echo "<script>alert('Berhasil di Hapus!'); window.location = '../grid_profil'</script>";	
} else {
	echo "<script>alert('Gagal di Hapus!'); window.location = '../grid_profil'</script>";	
}
?>