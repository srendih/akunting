<?php
include "../../../fungsi/koneksi.php";
$id_profil =$_POST['Id_profil'];
// $id_user = $_POST['Id'];
$cust_id= $_POST['cust_id'];
$nm_cust = $_POST['nama_cust'];
$group = $_POST['group'];
$tlp= $_POST['no_tlp'];
$alamat = $_POST['alamat'];
$termin = $_POST['termin'];
$username = $_POST['username'];

//query for update data in database
 $query = "UPDATE profile SET cust_id='$cust_id', nama_customer='$nm_cust',
 group_cust='$group', alamat='$alamat', no_tlp='$tlp', username='$username', termin='$termin'
  WHERE Id_profil = '$id_profil'";
  
 $hasil = mysqli_query($connect,$query);
 //see the result

if ($hasil){
	echo "<script>alert('Berhasil!'); window.location = '../grid_profil'</script>";	
} else {
	echo "<script>alert('Gagal!'); window.location = '../form_profil'</script>";	
}

?>