<?php
include "../../../fungsi/koneksi.php";
$cust_id =$_POST['cust_id'];
$limit = $_POST['limit'];
$id = $_POST['Id'];

$q = "INSERT INTO limit_cust (
	   
	   Id_limit_cust,
	   cust_id,
	   batas_limit
	  ) VALUES(
	  '".$id."',
	  '".$cust_id."', 
	  '".$limit."')";

if (mysqli_query($connect,$q)){
	echo "<script>alert('Berhasil'); window.location = '../grid_limit_cust'</script>";	
} else {
	echo "<script>alert('Gagal'); window.location = '../form_limit_cust'</script>";	
}

?>