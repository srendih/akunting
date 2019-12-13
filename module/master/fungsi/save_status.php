<?php
include "../../../fungsi/koneksi.php";
$nm_status =$_POST['nm_status'];
$warna = $_POST['warna'];
$id = $_POST['Id'];
$kursp = '#';
$typestatus = $_POST['type_status'];
$q = "INSERT INTO status (
	   
	   Id_status,
	   nama_status,
	   type_status,
	   warna
	  ) VALUES(
	  '".$id."',
	  '".$nm_status."', 
	  '".$typestatus."',
	  '".$warna."')";

if (mysqli_query($connect,$q)){
	echo "<script>alert('Berhasil'); window.location = '../grid_status'</script>";	
} else {
	echo "<script>alert('Gagal'); window.location = '../form_status'</script>";	
}

?>