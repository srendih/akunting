<?php
include "../../../fungsi/koneksi.php";
$user =$_POST['username'];
$password = $_POST['password'];
$id = $_POST['Id'];

//query for update data in database
 $query = "UPDATE user SET username='$user', password='$password'
  WHERE Id = '$id'";
  
 $hasil = mysqli_query($connect,$query);
 //see the result

if ($hasil){
	echo "<script>alert('Silahkan Login Kembali!'); window.location = '../../../fungsi/authout'</script>";	
} else {
	echo "<script>alert('Gagal!'); window.location = '../dashboard'</script>";	
}

?>