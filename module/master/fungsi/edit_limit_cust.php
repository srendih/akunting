<?php
include "../../../fungsi/koneksi.php";
$limit =$_POST['limit'];
$cust =$_POST['id_cust'];
$id = $_POST['Id'];

//query for update data in database
 $query = "UPDATE limit_cust SET batas_limit='$limit', cust_id='$cust' WHERE Id_limit_cust = '$id'";
  
 $hasil = mysqli_query($connect,$query);
 //see the result

if ($hasil){
	echo "<script>alert('Berhasil!'); window.location = '../grid_limit_cust'</script>";	
} else {
	echo "<script>alert('Gagal!'); window.location = '../form_limit_cust'</script>";	
}

?>