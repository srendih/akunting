<?php
include "../../../fungsi/koneksi.php";
$id =$_POST['Id'];
$sisabayar = $_POST['sisa_bayar'];
$sisabayar1 = $_POST['sisa_bayar1'];
$bayar = $_POST['bayar_inv'];
$id_bayar = $_POST['id_bayar'];
$diskonpph = $_POST['diskon_pph'];
$totalbayar = $_POST['total_bayar'];
$totalbayar1 = $_POST['total_bayar1'];
$tglbayar = $_POST['tgl_bayar'];
$status = $_POST['nama_status'];
$carabayar = $_POST['cara_bayar'];
$bayar1 = $_POST['bayar_inv1'];
$pphwapu = $_POST['pph_wapu'];
$session= $_POST['session'];
$pph = $_POST['pph'];
$m_inv = date('F/Y', strtotime($tglbayar));
// $totalPembayaran = round($totalbayar1+$totalbayar);

if ($sisabayar == 0){

	$q = "INSERT INTO pembayaran (
	   
	Id,
	id_inv,
	bayar,
	diskon_pph,
	total_bayar,
	tgl_bayar,
	cara_bayar,
	pph_wapu,
	pph,
	dibuat,
	m_byr
   ) VALUES(
   '".$id_bayar."',
   '".$id."', 
   '".$bayar."',
   '".$diskonpph."',
   '".$totalbayar."', 
   '".$tglbayar."', 
   '".$carabayar."', 
   '".$pphwapu."',
   '".$pph."',
   '".$session."',
   '".$m_inv."')";

//query for update data in database
$query = "UPDATE invoice SET sisa_bayar='$sisabayar'
WHERE id = '$id'";
$qkodebayar = "UPDATE kode_pembayaran SET nama_status='Lunas'
WHERE id_inv = '$id'";

$hasil = mysqli_query($connect, $q);
$hasil = mysqli_query($connect, $query);
$hasil = mysqli_query($connect, $qkodebayar);

if($hasil){
	echo "<script>alert('Berhasil!'); window.location = '../grid_invoice_pembayaran'</script>";	

	} else {
	echo "<script>alert('Gagal!'.); window.location = '../grid_invoice_pembayaran'</script>";	
}
	// echo "<script>alert('Tagihan Sudah Lunas!'); window.location = '../grid_invoice_pembayaran'</script>";	
} else {

	$q = "INSERT INTO pembayaran (
	   
	Id,
	id_inv,
	bayar,
	diskon_pph,
	total_bayar,
	tgl_bayar,
	cara_bayar,
	pph_wapu,
	pph,
	dibuat,
	m_byr
   ) VALUES(
   '".$id_bayar."',
   '".$id."', 
   '".$bayar."',
   '".$diskonpph."',
   '".$totalbayar."', 
   '".$tglbayar."', 
   '".$carabayar."', 
   '".$pphwapu."',
   '".$pph."',
   '".$session."',
   '".$m_inv."')";

//query for update data in database
$query = "UPDATE invoice SET sisa_bayar='$sisabayar'
WHERE id = '$id'";
$qkodebayar = "UPDATE kode_pembayaran SET nama_status='$status'
WHERE id_inv = '$id'";

$hasil = mysqli_query($connect, $q);
$hasil = mysqli_query($connect, $query);
$hasil = mysqli_query($connect, $qkodebayar);

if($hasil){
	echo "<script>alert('Berhasil!'); window.location = '../grid_invoice_pembayaran'</script>";	

	} else {
	echo "<script>alert('Gagal!'.); window.location = '../grid_invoice_pembayaran'</script>";	
}
}
?>