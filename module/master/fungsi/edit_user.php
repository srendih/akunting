<?php
include "../../../fungsi/koneksi.php";
$user =$_POST['username'];
$password = $_POST['password'];
$level= $_POST['hak_level'];
$id = $_POST['Id'];
$iduser = $_POST['id_user'];

//query for update data in database
 $query = "UPDATE user SET username='$user', password='$password', hak_level='$level'
  WHERE Id = '$id'";
  
 $hasil = mysqli_query($connect,$query);
 //see the result

if ($hasil){
	echo "<script>alert('Berhasil!'); window.location = '../grid_user'</script>";	
} else {
	echo "<script>alert('Gagal!'); window.location = '../form_user'</script>";	
}

?>