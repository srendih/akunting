<?php
include "../../../fungsi/koneksi.php";
$limit =$_POST['limit'];
$id_group =$_POST['group_id'];
$id = $_POST['Id'];

//query for update data in database
 $query = "UPDATE limit_group SET batas_limit='$limit', Id_group='$id_group' WHERE Id_limit_group = '$id'";
  
 $hasil = mysqli_query($connect,$query);
 //see the result

if ($hasil){
	echo "<script>alert('Berhasil!'); window.location = '../grid_limit_group'</script>";	
} else {
	echo "<script>alert('Gagal!'); window.location = '../form_limit_group'</script>";	
}

?>