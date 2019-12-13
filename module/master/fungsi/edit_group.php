<?php
include "../../../fungsi/koneksi.php";
$nm_group =$_POST['nm_group'];
$id = $_POST['Id'];

//query for update data in database
 $query = "UPDATE m_group SET nama_group='$nm_group' WHERE Id = '$id'";
  
 $hasil = mysqli_query($connect,$query);
 //see the result

if ($hasil){
	echo "<script>alert('Berhasil!'); window.location = '../grid_group'</script>";	
} else {
	echo "<script>alert('Gagal!'); window.location = '../form_group'</script>";	
}

?>