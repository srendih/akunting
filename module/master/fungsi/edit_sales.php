<?php
include "../../../fungsi/koneksi.php";
$sales =$_POST['nm_sales'];
$idsales= $_POST['id_sales'];
$id = $_POST['Id'];


//query for update data in database
 $query = "UPDATE user_sales SET nm_sales='$sales', id_sales='$idsales'
  WHERE id = '$id'";
  
 $hasil = mysqli_query($connect,$query);
 //see the result

if ($hasil){
	echo "<script>alert('Berhasil!'); window.location = '../grid_sales'</script>";	
} else {
	echo "<script>alert('Gagal!'); window.location = '../form_sales'</script>";	
}

?>