<?php
include "../../../fungsi/koneksi.php";
$sales =$_POST['nm_sales'];
$idsales= $_POST['id_sales'];
$id = $_POST['Id'];

$q = "INSERT INTO user_sales (
	   
	   id,
	   nm_sales,
	   id_sales
	  ) VALUES(
	  '".$id."',
	  '".$sales."', 
	  '".$idsales."')";

if (mysqli_query($connect,$q)){
	echo "<script>alert('Berhasil'); window.location = '../grid_sales'</script>";	
} else {
	echo "<script>alert('Gagal'); window.location = '../form_sales'</script>";	
}

?>