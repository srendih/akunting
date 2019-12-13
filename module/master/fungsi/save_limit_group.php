<?php
include "../../../fungsi/koneksi.php";
$group_id =$_POST['Id_group'];
$limit = $_POST['limit'];
$id = $_POST['Id'];

$q = "INSERT INTO limit_group(
	   
	   Id_limit_group,
	   Id_group,
	   batas_limit
	  ) VALUES(
	  '".$id."',
	  '".$group_id."', 
	  '".$limit."')";

if (mysqli_query($connect,$q)){
	echo "<script>alert('Berhasil'); window.location = '../grid_limit_group'</script>";	
} else {
	echo "<script>alert('Gagal'); window.location = '../form_limit_group'</script>";	
}

?>