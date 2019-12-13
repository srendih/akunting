<?php
include "../../../fungsi/koneksi.php";
$nm_group =$_POST['group'];
$id = $_POST['Id'];

$q = "INSERT INTO m_group (
	   
	   Id,
	   nama_group
	  ) VALUES(
	  '".$id."',
	  '".$nm_group."')";

if (mysqli_query($connect,$q)){
	echo "<script>alert('Berhasil'); window.location = '../grid_group'</script>";	
} else {
	echo "<script>alert('Gagal'); window.location = '../form_group'</script>";	
}

?>