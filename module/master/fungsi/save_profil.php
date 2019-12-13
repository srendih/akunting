<?php
include "../../../fungsi/koneksi.php";
$id_profil =$_POST['Id_profil'];
$cust_id= $_POST['cust_id'];
$nm_cust = $_POST['nama_cust'];
$group = $_POST['group'];
$tlp= $_POST['no_tlp'];
$alamat = $_POST['alamat'];
$termin = $_POST['termin'];
$username = $_POST['username'];

$q = "INSERT INTO profile (
	   
	   Id_profil,
	   cust_id,
	   nama_customer,
       group_cust,
       alamat,
	   termin,
	   username,
       no_tlp
	  ) VALUES(
	  '".$id_profil."',
	  '".$cust_id."',
      '".$nm_cust."',
	  '".$group."', 
	  '".$alamat."', 
	  '".$termin."',
	  '".$username."', 
	  '".$tlp."')";

if (mysqli_query($connect,$q)){
	echo "<script>alert('Berhasil'); window.location = '../grid_profil'</script>";	
} else {
	echo "<script>alert('Gagal'); window.location = '../form_profil'</script>";	
}

?>