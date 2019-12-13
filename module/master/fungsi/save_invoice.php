<?php
include "../../../fungsi/koneksi.php";
$id =$_POST['Id'];
$cust_id = $_POST['id_cust'];
$no= $_POST['no'];
$noinv = $_POST['no_inv'];
$idstatus = $_POST['status'];
$nominalInv =$_POST['nominal_inv'];
$transport = $_POST['transport'];
$ppn= $_POST['ppn'];
$totalInv = $_POST['total_inv'];
$tglInv= $_POST['tgl_inv'];
$idsales = $_POST['sales_id'];
$kode = $_POST['kode'];
$bayarinv = $_POST['bayar_inv'];
$ket = "Belum Dikirim";
$proyek= $_POST['proyek'];
$m_inv = date('F/Y', strtotime($tglInv));
$tanggal = date("Y-m-d");


$q = "INSERT INTO invoice (
	   
	   id,
	   cust_id,
	   no,
	   no_inv,
       id_status,
       nominal_inv,
       transport,
       nilai_ppn,
	   tgl_inv,
	   proyek,
	   bulan_inv,
	   id_sales,
	   ket,
	   tgl_input,
	   sisa_bayar,
	   total_inv,
       kode
	  ) VALUES(
	  '".$id."',
	  '".$cust_id."', 
	  '".$no."',
      '".$noinv."',
	  '".$idstatus."', 
	  '".$nominalInv."', 
      '".$transport."',
	  '".$ppn."', 
      '".$tglInv."',
	  '".$proyek."',
	  '".$m_inv."',
	  '".$idsales."',
	  '".$ket."',
	  '".$tanggal."',
	  '".$totalInv."',
	  '".$totalInv."',
	  '".$kode."')";

if (mysqli_query($connect,$q)){
	echo "<script>alert('Berhasil'); window.location = '../grid_invoice'</script>";	
} else {
	echo "<script>alert('Gagal'); window.location = '../form_invoice'</script>";	
}

?>