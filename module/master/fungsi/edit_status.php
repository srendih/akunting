<?php
include "../../../fungsi/koneksi.php";
$nm_status =$_POST['nm_status'];
$wrna =$_POST['warna'];
$id = $_POST['Id'];
$typestatus = $_POST['type_status'];


//query for update data in database
 $query = "UPDATE status SET nama_status='$nm_status', warna='$wrna', type_status='$typestatus' WHERE Id_status = '$id'";
  
 $hasil = mysqli_query($connect,$query);
 //see the result

if ($hasil){
	echo "<script>alert('Berhasil!'); window.location = '../grid_status'</script>";	
} else {
	echo "<script>alert('Gagal!'); window.location = '../form_status'</script>";	
}

?>