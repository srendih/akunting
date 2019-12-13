<?php
include "../../../fungsi/koneksi.php";
$id =$_POST['Id'];
$cust_id = $_POST['id_cust'];
$tglterima = $_POST['tgl_terima'];
$termin = $_POST['termin'];
$kodebayar = $_POST['kode_bayar'];
$id_bayar = $_POST['id_bayar'];
$ket = "Sudah Dikirim";
$status = $_POST['status'];
$tglTempo = date('Y-m-d', strtotime("+$termin days", strtotime($tglterima)));

//query for update data in database
$q = "INSERT INTO kode_pembayaran (
	   
	id,
	id_inv,
	kode_bayar,
	nama_status
   ) VALUES(
   '".$id_bayar."', 
   '".$id."', 
   '".$kodebayar."', 
   '".$status."')";
   
 $query = "UPDATE invoice SET tgl_terima='$tglterima', tgl_tempo='$tglTempo', ket='$ket'
  WHERE id = '$id'";
  
 $hasil = mysqli_query($connect, $query);
 $hasil = mysqli_query($connect, $q);
 //see the result

if ($hasil){
	echo "<script>alert('Berhasil!'); window.location = '../grid_invoice_tgl_terima'</script>";	
} else {
	echo "<script>alert('Gagal!'); window.location = '../form_invoice_tgl_terima'</script>";	
}

?>